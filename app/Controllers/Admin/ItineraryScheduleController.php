<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\ItineraryScheduleModel;

class ItineraryScheduleController extends BaseController
{
    protected $itineraryScheduleModel;

    public function __construct()
    {
        $this->itineraryScheduleModel = new ItineraryScheduleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Itinerary Schedule',
            'itinerarySchedule' => $this->itineraryScheduleModel->findAll(),
        ];

        return view('admin/itinerary_schedule/index', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'document' => 'uploaded[document]|max_size[document,10240]|ext_in[document,pdf]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/itinerary-schedule')->withInput()->with('validation', $this->validator);
        }

        $document = $this->request->getFile('document');
        if ($document->isValid() && !$document->hasMoved()) {
            $document->move('uploads/documents');
            $this->itineraryScheduleModel->save([
                'title' => $this->request->getPost('title'),
                'document' => $document->getName(),
            ]);

            return redirect()->to('/admin/itinerary-schedule')->with('success', 'Document uploaded successfully.');
        } else {
            return redirect()->to('/admin/itinerary-schedule')->withInput()->with('error', 'Failed to upload document.');
        }
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'document' => 'max_size[document,10240]|ext_in[document,pdf]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/itinerary-schedule')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'title' => $this->request->getPost('title'),
        ];

        $document = $this->request->getFile('document');
        if ($document && $document->isValid() && !$document->hasMoved()) {
            // Get the old document name
            $oldDocument = $this->itineraryScheduleModel->find($id)['document'];
            // Move the new document
            $document->move('uploads/documents');
            $data['document'] = $document->getName();
            // Delete the old document
            if (file_exists('uploads/documents/' . $oldDocument)) {
                unlink('uploads/documents/' . $oldDocument);
            }
        }

        $this->itineraryScheduleModel->update($id, $data);

        return redirect()->to('/admin/itinerary-schedule')->with('success', 'Itinerary schedule updated successfully.');
    }

    public function delete($id)
    {
        $document = $this->itineraryScheduleModel->find($id);
        if ($document) {
            if (file_exists('uploads/documents/' . $document['document'])) {
                unlink('uploads/documents/' . $document['document']);
            }
            $this->itineraryScheduleModel->delete($id);
            return redirect()->to('/admin/itinerary-schedule')->with('success', 'Itinerary schedule deleted successfully.');
        } else {
            return redirect()->to('/admin/itinerary-schedule')->with('error', 'Itinerary schedule not found.');
        }
    }
}
