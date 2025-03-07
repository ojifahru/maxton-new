<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\TimelinesModel;

class TimelinesController extends BaseController
{
    protected $timelinesModel;

    public function __construct()
    {
        $this->timelinesModel = new TimelinesModel();
    }
    public function index()
    {
        $timelinesModel = $this->timelinesModel->findAll();
        $data = [
            'title' => 'Timelines',
            'timelines' => $timelinesModel,
        ];

        return view('admin/timelines/index', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'date' => 'required|valid_date',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addTimelineErrors', $this->validator->getErrors());
        }

        $this->timelinesModel->save([
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->back()->with('success', 'Timeline added successfully');
    }

    public function update()
    {
        $rules = [
            'title' => 'required',
            'date' => 'required|valid_date',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editTimelineErrors', $this->validator->getErrors());
        }

        $this->timelinesModel->save([
            'id' => $this->request->getPost('id'),
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->back()->with('success', 'Timeline updated successfully');
    }

    public function delete($id)
    {
        $this->timelinesModel->delete($id);

        return redirect()->back()->with('success', 'Timeline deleted successfully');
    }
}
