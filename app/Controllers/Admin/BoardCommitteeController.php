<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\BoardCommitteeModel;

class BoardCommitteeController extends BaseController
{
    protected $boardCommitteeModel;

    public function __construct()
    {
        $this->boardCommitteeModel = new BoardCommitteeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Board Committee',
            'boardCommittees' => $this->boardCommitteeModel->findAll(),
        ];

        return view('admin/board_committee/index', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'instituion' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addBoardCommitteeErrors', $this->validator->getErrors());
        }

        $this->boardCommitteeModel->save([
            'name' => $this->request->getPost('name'),
            'instituion' => $this->request->getPost('instituion'),
        ]);

        return redirect()->back()->with('success', 'Board Committee has been added successfully.');
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required',
            'instituion' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateBoardCommitteeErrors', $this->validator->getErrors());
        }

        $this->boardCommitteeModel->update($id, [
            'name' => $this->request->getPost('name'),
            'instituion' => $this->request->getPost('instituion'),
        ]);

        return redirect()->back()->with('success', 'Board Committee has been updated successfully.');
    }

    public function delete($id)
    {
        $this->boardCommitteeModel->delete($id);

        return redirect()->back()->with('success', 'Board Committee has been deleted successfully.');
    }
}
