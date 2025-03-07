<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\SlidersModel;
use Intervention\Image\ImageManager as Image;

class SlidersController extends BaseController
{
    protected $slidersModel;

    public function __construct()
    {
        $this->slidersModel = new SlidersModel();
    }

    public function index()
    {
        $sliders = $this->slidersModel->findAll();

        $data = [
            'title' => 'Sliders',
            'sliders' => $sliders,
        ];

        return view('admin/sliders/index', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addSliderErrors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/sliders', $imageName);
        // Intervention Image
        $imagePath = 'uploads/sliders/' . $imageName;
        $image = Image::imagick()->read($imagePath)->cover(1200, 500)
            ->save($imagePath);


        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ];

        $this->slidersModel->save($data);

        return redirect()->back()->with('success', 'Slider added successfully');
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'permit_empty|max_size[image,1024]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateSliderErrors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        // Pastikan ID valid
        if (!$id || !$this->slidersModel->find($id)) {
            return redirect()->back()->with('error', 'Invalid Slider ID');
        }

        // Data yang akan diupdate
        $data = [
            'title' => $title,
            'description' => $description,
        ];

        // Proses gambar jika diunggah
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Generate nama baru untuk gambar
            $imageName = $image->getRandomName();
            $imagePath = 'uploads/sliders/' . $imageName;

            // Simpan gambar sementara
            $image->move('uploads/sliders', $imageName);

            // Resize gambar menggunakan Intervention Image
            $imagePath = 'uploads/sliders/' . $imageName;
            $image = Image::imagick()->read($imagePath)->cover(1200, 500)
                ->save($imagePath);

            // Hapus gambar lama jika ada
            $slider = $this->slidersModel->find($id);
            if (!empty($slider['image']) && file_exists('uploads/sliders/' . $slider['image'])) {
                unlink('uploads/sliders/' . $slider['image']);
            }

            // Tambahkan gambar baru ke data update
            $data['image'] = $imageName;
        }

        // Update data dengan where
        $this->slidersModel->where('id', $id)->set($data)->update();

        return redirect()->back()->with('success', 'Slider updated successfully');
    }

    public function delete($id)
    {
        $slider = $this->slidersModel->find($id);

        if (!$slider) {
            return redirect()->back()->with('error', 'Invalid Slider ID');
        }

        if (!empty($slider['image']) && file_exists('uploads/sliders/' . $slider['image'])) {
            unlink('uploads/sliders/' . $slider['image']);
        }

        $this->slidersModel->delete($id);

        return redirect()->back()->with('success', 'Slider deleted successfully');
    }
}
