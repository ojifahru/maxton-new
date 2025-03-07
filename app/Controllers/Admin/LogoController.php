<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\LogoModel;
use Intervention\Image\ImageManager as Image;

class LogoController extends BaseController
{
    protected $logoModel;

    public function __construct()
    {
        $this->logoModel = new LogoModel();
    }

    public function index()
    {
        $logo = $this->logoModel->where('id', 1)->first();
        $favicon = $this->logoModel->where('id', 2)->first();

        $data = [
            'title' => 'Manage Logo & Favicon',
            'logo' => $logo,
            'favicon' => $favicon,
        ];

        return view('admin/logo/index', $data);
    }

    public function updateLogo($id)
    {
        $id = 1;
        $rules = [
            'logo' => [
                'label' => 'Logo',
                'rules' => 'uploaded[logo]|max_size[logo,1024]|mime_in[logo,image/jpg,image/jpeg,image/png,image/webp]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateLogoErrors', $this->validator->getErrors());
        }

        $logo = $this->request->getFile('logo');
        $logoName = $logo->getRandomName();
        $logoPath = 'uploads/logo/' . $logoName;

        // Menggunakan Intervention Image untuk mengelola gambar
        $image = Image::imagick()->read($logo->getRealPath());
        $image->scale(height: 150);
        $image->save($logoPath);

        // Delete old logo file except default_logo.png
        $oldLogo = $this->logoModel->find(1)['path'];
        if ($oldLogo && $oldLogo !== 'default_logo.png' && file_exists('uploads/logo/' . $oldLogo)) {
            unlink('uploads/logo/' . $oldLogo);
        }

        $this->logoModel->update(1, ['path' => $logoName]);

        return redirect()->back()->with('success', 'Logo updated successfully');
    }

    public function updateFavicon($id)
    {
        $id = 2;
        $rules = [
            'favicon' => [
                'label' => 'Favicon',
                'rules' => 'uploaded[favicon]|max_size[favicon,1024]|mime_in[favicon,image/jpg,image/jpeg,image/png,image/webp,image/ico]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateLogoErrors', $this->validator->getErrors());
        }

        $favicon = $this->request->getFile('favicon');
        $faviconName = $favicon->getRandomName();
        $faviconPath = 'uploads/favicon/' . $faviconName;

        // Menggunakan Intervention Image untuk mengelola gambar
        $image = Image::gd()->read($favicon->getRealPath());
        $image->scale(32, 32, function ($constraint) {
            $constraint->aspectRatio();
        })->save($faviconPath);

        // Delete old favicon file except default_favicon.png
        $oldFavicon = $this->logoModel->find(2)['path'];
        if ($oldFavicon && $oldFavicon !== 'default_favicon.png' && file_exists('uploads/favicon/' . $oldFavicon)) {
            unlink('uploads/favicon/' . $oldFavicon);
        }

        $this->logoModel->update(2, ['path' => $faviconName]);

        return redirect()->back()->with('success', 'Favicon updated successfully');
    }
}
