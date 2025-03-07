<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\SubmissionTemplateModel;

class SubmissionTemplateController extends BaseController
{
    protected $SubmissionTemplateModel;

    public function __construct()
    {
        $this->SubmissionTemplateModel = new SubmissionTemplateModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Submission Template',
            'templates' => $this->SubmissionTemplateModel->findAll(),
        ];

        return view('admin/submission_template/index', $data);
    }

        public function store()
    {
        $rules = [
            'title' => 'required',
            'document' => 'uploaded[document]|max_size[document,10240]|ext_in[document,pdf,doc,docx]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/submission-template')->withInput()->with('validation', $this->validator);
        }

        $document = $this->request->getFile('document');
        if ($document->isValid() && !$document->hasMoved()) {
            $document->move('uploads/documents');
            $this->SubmissionTemplateModel->save([
                'title' => $this->request->getPost('title'),
                'document' => $document->getName(),
            ]);

            return redirect()->to('/admin/submission-template')->with('success', 'Document uploaded successfully.');
        } else {
            return redirect()->to('/admin/submission-template')->withInput()->with('error', 'Failed to upload document.');
        }
    }

        public function update($id)
    {
        $rules = [
            'title' => 'required',
            'document' => 'max_size[document,10240]|ext_in[document,pdf,doc,docx]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/submission-template')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'title' => $this->request->getPost('title'),
        ];

        $document = $this->request->getFile('document');
        if ($document && $document->isValid() && !$document->hasMoved()) {
            // Get the old document name
            $oldDocument = $this->SubmissionTemplateModel->find($id)['document'];
            // Move the new document
            $document->move('uploads/documents');
            $data['document'] = $document->getName();
            // Delete the old document
            if (file_exists('uploads/documents/' . $oldDocument)) {
                unlink('uploads/documents/' . $oldDocument);
            }
        }

        $this->SubmissionTemplateModel->update($id, $data);

        return redirect()->to('/admin/submission-template')->with('success', 'Submission template updated successfully.');
    }

    public function delete($id)
    {
        $document = $this->SubmissionTemplateModel->find($id)['document'];
        if (file_exists('uploads/documents/' . $document)) {
            unlink('uploads/documents/' . $document);
        }

        $this->SubmissionTemplateModel->delete($id);

        return redirect()->to('/admin/submission-template')->with('success', 'Submission template deleted successfully.');
    }
}
