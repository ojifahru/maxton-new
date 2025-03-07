<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\TopicsModel;

class TopicsController extends BaseController
{
    protected $topicsModel;

    public function __construct()
    {
        $this->topicsModel = new TopicsModel();
    }

    public function index()
    {
        $topicsModel = $this->topicsModel->findAll();

        $data = [
            'title' => 'Topics',
            'topics' => $topicsModel,
        ];
        return view('admin/topics/index', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        $this->topicsModel->save($data);

        return redirect()->back()->with('success', 'Topic has been added successfully');
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        $this->topicsModel->update($id, $data);

        return redirect()->back()->with('success', 'Topic has been updated successfully');
    }

    public function delete($id)
    {
        $this->topicsModel->delete($id);

        return redirect()->back()->with('success', 'Topic has been deleted successfully');
    }
}
