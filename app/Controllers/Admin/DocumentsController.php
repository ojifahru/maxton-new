<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\DocumentsModel;

class DocumentsController extends BaseController
{
    protected $documentsModel;

    public function __construct()
    {
        $this->documentsModel = new DocumentsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Documents',
            'documents' => $this->documentsModel->findAll(),
        ];

        return view('admin/documents/index', $data);
    }

    public function store()
    {
        $rules = [
            'document_name' => 'required',
            'document_file' => 'uploaded[document_file]|max_size[document_file,10240]|mime_in[document_file,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('addDocumentErrors', $this->validator->getErrors());
        }

        $documentFile = $this->request->getFile('document_file');
        $documentFileName = $documentFile->getRandomName();

        $documentFile->move('uploads/documents', $documentFileName);

        $this->documentsModel->save([
            'document_name' => $this->request->getPost('document_name'),
            'document_file' => $documentFileName,
        ]);

        return redirect()->back()->with('success', 'Document has been added successfully.');
    }

    public function update($id)
    {
        $rules = [
            'document_name' => 'required',
            'document_file' => 'max_size[document_file,10240]|mime_in[document_file,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('updateDocumentErrors', $this->validator->getErrors());
        }

        $document = $this->documentsModel->find($id);

        if ($this->request->getFile('document_file')->isValid()) {
            $documentFile = $this->request->getFile('document_file');
            $documentFileName = $documentFile->getRandomName();

            $documentFile->move('uploads/documents', $documentFileName);

            unlink('uploads/documents/' . $document['document_file']);
        } else {
            $documentFileName = $document['document_file'];
        }

        $this->documentsModel->update($id, [
            'document_name' => $this->request->getPost('document_name'),
            'document_file' => $documentFileName,
        ]);

        return redirect()->back()->with('success', 'Document has been updated successfully.');
    }

    public function delete($id)
    {
        $document = $this->documentsModel->find($id);

        unlink('uploads/documents/' . $document['document_file']);

        $this->documentsModel->delete($id);

        return redirect()->back()->with('success', 'Document has been deleted successfully.');
    }
}
