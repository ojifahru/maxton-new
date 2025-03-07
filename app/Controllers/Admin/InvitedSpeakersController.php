<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\InvitedSpeakersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManager as Image;

class InvitedSpeakersController extends BaseController
{
    protected $invitedSpeakersModel;

    public function __construct()
    {
        $this->invitedSpeakersModel = new InvitedSpeakersModel();
    }

    public function index()
    {
        $invited_speakers = $this->invitedSpeakersModel->findAll();

        $data = [
            'title' => 'Invited Speakers',
            'invited_speakers' => $invited_speakers,
        ];

        return view('admin/invited_speakers/index', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addInvitedSpeakerErrors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/invited_speakers', $imageName);
        // Intervention image
        $imagePath = 'uploads/invited_speakers/' . $imageName;
        $image = Image::imagick()->read($imagePath)->cover(500, 500);
        $image->save($imagePath);

        $this->invitedSpeakersModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('invited_speakers.index')->with('success', 'Invited speaker added successfully.');
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'image' => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editInvitedSpeakerErrors', $this->validator->getErrors());
        }

        $invitedSpeaker = $this->invitedSpeakersModel->find($id);

        if (!$invitedSpeaker) {
            return redirect()->route('invited_speakers.index')->with('error', 'Invited speaker not found.');
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/invited_speakers', $imageName);
            // intervention image
            $imagePath = 'uploads/invited_speakers/' . $imageName;
            $image = Image::imagick()->read($imagePath)->cover(500, 500);
            $image->save($imagePath);

            // Delete old image
            if ($invitedSpeaker['image'] && file_exists('uploads/invited_speakers/' . $invitedSpeaker['image'])) {
                unlink('uploads/invited_speakers/' . $invitedSpeaker['image']);
            }
        } else {
            $imageName = $invitedSpeaker['image'];
        }

        $this->invitedSpeakersModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ]);

        return redirect()->route('invited_speakers.index')->with('success', 'Invited speaker updated successfully.');
    }

    public function delete($id)
    {
        $invitedSpeaker = $this->invitedSpeakersModel->find($id);

        if (!$invitedSpeaker) {
            return redirect()->route('invited_speakers.index')->with('error', 'Invited speaker not found.');
        }

        // Delete image
        if ($invitedSpeaker['image'] && file_exists('uploads/invited_speakers/' . $invitedSpeaker['image'])) {
            unlink('uploads/invited_speakers/' . $invitedSpeaker['image']);
        }

        $this->invitedSpeakersModel->delete($id);

        return redirect()->route('invited_speakers.index')->with('success', 'Invited speaker deleted successfully.');
    }
}
