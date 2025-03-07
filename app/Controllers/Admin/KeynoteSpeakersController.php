<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KeynoteSpeakersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManager as Image;

class KeynoteSpeakersController extends BaseController
{
    protected $keynoteSpeakersModel;

    public function __construct()
    {
        $this->keynoteSpeakersModel = new KeynoteSpeakersModel();
    }

    public function index()
    {
        $keynote_speakers = $this->keynoteSpeakersModel->findAll();

        $data = [
            'title' => 'Keynote Speakers',
            'keynote_speakers' => $keynote_speakers,
        ];

        return view('admin/keynote_speakers/index', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addKeynoteSpeakerErrors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/keynote_speakers', $imageName);
        // Intervention image
        $imagePath = 'uploads/keynote_speakers/' . $imageName;
        $image = Image::imagick()->read($imagePath)->cover(500, 500);
        $image->save($imagePath);

        $this->keynoteSpeakersModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('keynote_speakers.index')->with('success', 'Keynote speaker added successfully.');
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editKeynoteSpeakerErrors', $this->validator->getErrors());
        }

        $keynoteSpeaker = $this->keynoteSpeakersModel->find($id);

        if (!$keynoteSpeaker) {
            return redirect()->route('keynote_speakers.index')->with('error', 'Keynote speaker not found.');
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/keynote_speakers', $imageName);
            // intervention image
            $imagePath = 'uploads/keynote_speakers/' . $imageName;
            $image = Image::imagick()->read($imagePath)->cover(500, 500);
            $image->save($imagePath);

            // Delete old image
            if ($keynoteSpeaker['image'] && file_exists('uploads/keynote_speakers/' . $keynoteSpeaker['image'])) {
                unlink('uploads/keynote_speakers/' . $keynoteSpeaker['image']);
            }
        } else {
            $imageName = $keynoteSpeaker['image'];
        }

        $this->keynoteSpeakersModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('keynote_speakers.index')->with('success', 'Keynote speaker updated successfully.');
    }

    public function delete($id)
    {
        $keynoteSpeaker = $this->keynoteSpeakersModel->find($id);

        if (!$keynoteSpeaker) {
            return redirect()->route('keynote_speakers.index')->with('error', 'Keynote speaker not found.');
        }

        // Delete image
        if ($keynoteSpeaker['image'] && file_exists('uploads/keynote_speakers/' . $keynoteSpeaker['image'])) {
            unlink('uploads/keynote_speakers/' . $keynoteSpeaker['image']);
        }

        $this->keynoteSpeakersModel->delete($id);

        return redirect()->route('keynote_speakers.index')->with('success', 'Keynote speaker deleted successfully.');
    }
}
