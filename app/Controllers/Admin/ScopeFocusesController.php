<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\ScopesModel;
use App\Models\Admin\FocusesModel;

class ScopeFocusesController extends BaseController
{
    protected $scopesModel;
    protected $focusesModel;

    public function __construct()
    {
        $this->scopesModel = new ScopesModel();
        $this->focusesModel = new FocusesModel();
    }

    public function index()
    {
        $scopes = $this->scopesModel->findAll();
        foreach ($scopes as $key => $scope) {
            $focuses = $this->focusesModel->where('scope_id', $scope['id'])->findAll();
            $scopes[$key]['focuses'] = $focuses;
        }

        $data = [
            'title' => 'Scope Focuses',
            'scopes' => $scopes,
        ];

        return view('admin/scope_focuses/index', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'scope_name' => 'required',
            'focuses' => 'required|is_array',
            'focuses.*' => 'required|string'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $scopeName = $this->request->getPost('scope_name');
        $focuses = $this->request->getPost('focuses');

        // Insert scope
        $scopeId = $this->scopesModel->insert(['name' => $scopeName]);

        // Insert focuses
        foreach ($focuses as $focus) {
            $this->focusesModel->insert(['name' => trim($focus), 'scope_id' => $scopeId]);
        }

        return redirect()->to('/admin/scope-focuses')->with('success', 'Scope & Focuses added successfully');
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'scope_name' => 'required',
            'focuses' => 'required|is_array',
            'focuses.*' => 'required|string'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $scopeName = $this->request->getPost('scope_name');
        $focuses = $this->request->getPost('focuses');

        // Update scope
        $this->scopesModel->update($id, ['name' => $scopeName]);

        // Delete existing focuses
        $this->focusesModel->where('scope_id', $id)->delete();

        // Insert new focuses
        foreach ($focuses as $focus) {
            $this->focusesModel->insert(['name' => trim($focus), 'scope_id' => $id]);
        }

        return redirect()->to('/admin/scope-focuses')->with('success', 'Scope & Focuses updated successfully');
    }

    public function delete($id)
    {
        // Delete focuses associated with the scope
        $this->focusesModel->where('scope_id', $id)->delete();

        // Delete the scope
        $this->scopesModel->delete($id);

        return redirect()->to('/admin/scope-focuses')->with('success', 'Scope & Focuses deleted successfully');
    }
}
