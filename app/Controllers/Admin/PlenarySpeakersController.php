<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PlenarySpeakersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManager as Image;

class PlenarySpeakersController extends BaseController
{
    protected $plenarySpeakersModel;

    public function __construct()
    {
        $this->plenarySpeakersModel = new PlenarySpeakersModel();
    }

    public function index()
    {
        $plenary_speakers = $this->plenarySpeakersModel->findAll();

        $data = [
            'title' => 'Plenary Speakers',
            'plenary_speakers' => $plenary_speakers,
        ];

        return view('admin/plenary_speakers/index', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addPlenarySpeakerErrors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/plenary_speakers', $imageName);
        // Intervention image
        $imagePath = 'uploads/plenary_speakers/' . $imageName;
        $image = Image::imagick()->read($imagePath)->cover(500, 500);
        $image->save($imagePath);

        $this->plenarySpeakersModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('plenary_speakers.index')->with('success', 'Plenary speaker added successfully.');
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editPlenarySpeakerErrors', $this->validator->getErrors());
        }

        $plenarySpeaker = $this->plenarySpeakersModel->find($id);

        if (!$plenarySpeaker) {
            return redirect()->route('plenary_speakers.index')->with('error', 'Plenary speaker not found.');
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/plenary_speakers', $imageName);
            // intervention image
            $imagePath = 'uploads/plenary_speakers/' . $imageName;
            $image = Image::imagick()->read($imagePath)->cover(500, 500);
            $image->save($imagePath);

            // Delete old image
            if ($plenarySpeaker['image'] && file_exists('uploads/plenary_speakers/' . $plenarySpeaker['image'])) {
                unlink('uploads/plenary_speakers/' . $plenarySpeaker['image']);
            }
        } else {
            $imageName = $plenarySpeaker['image'];
        }

        $this->plenarySpeakersModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('plenary_speakers.index')->with('success', 'Plenary speaker updated successfully.');
    }

    public function delete($id)
    {
        $plenarySpeaker = $this->plenarySpeakersModel->find($id);

        if (!$plenarySpeaker) {
            return redirect()->route('plenary_speakers.index')->with('error', 'Plenary speaker not found.');
        }

        // Delete image
        if ($plenarySpeaker['image'] && file_exists('uploads/plenary_speakers/' . $plenarySpeaker['image'])) {
            unlink('uploads/plenary_speakers/' . $plenarySpeaker['image']);
        }

        $this->plenarySpeakersModel->delete($id);

        return redirect()->route('plenary_speakers.index')->with('success', 'Plenary speaker deleted successfully.');
    }
}
