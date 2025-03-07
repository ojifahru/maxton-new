<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\InformasiModel;

class InformasiController extends BaseController
{
    protected $informasiModel;

    public function __construct()
    {
        $this->informasiModel = new InformasiModel();
    }

    public function index()
    {
        $informasi = $this->informasiModel->first();
        $data = [
            'title' => 'Informations',
            'informasi' => $informasi,
        ];
        return view('admin/informasi/index', $data);
    }

    public function update($id)
    {
        $rules = [
            'alamat' => 'required',
            'email' => 'required|valid_email',
            'telepon1' => 'required',
            'telepon2' => 'required',
            'facebook' => 'required|valid_url',
            'twitter' => 'required|valid_url',
            'youtube' => 'required|valid_url',
            'linkedin' => 'required|valid_url',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateInformasiErrors', $this->validator->getErrors());
        }

        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'telepon1' => $this->request->getPost('telepon1'),
            'telepon2' => $this->request->getPost('telepon2'),
            'facebook' => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'twitter' => $this->request->getPost('twitter'),
            'youtube' => $this->request->getPost('youtube'),
            'linkedin' => $this->request->getPost('linkedin'),
        ];

        $this->informasiModel->update($id, $data);

        return redirect()->back()->with('success', 'Informasi updated successfully');
    }
}
