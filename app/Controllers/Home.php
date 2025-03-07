<?php

namespace App\Controllers;

use App\Models\Admin\SlidersModel;
use App\Models\Admin\KeynoteSpeakersModel;
use App\Models\Admin\PlenarySpeakersModel;
use App\Models\Admin\InvitedSpeakersModel;
use App\Models\Admin\TimelinesModel;
use App\Models\Admin\TopicsModel;
use App\Models\Admin\ScopesModel;
use App\Models\Admin\FocusesModel;
use App\Models\Admin\BoardCommitteeModel;
use App\Models\Admin\ItineraryScheduleModel;
use App\Models\Admin\SubmissionTemplateModel;

class Home extends BaseController
{
    protected $slidersModel;
    protected $keynoteSpeakersModel;
    protected $plenarySpeakersModel;
    protected $invitedSpeakersModel;
    protected $timelinesModel;
    protected $topicsModel;
    protected $scopesModel;
    protected $focusesModel;
    protected $boardCommitteeModel;
    protected $itineraryScheduleModel;
    protected $submissionTemplateModel;

    public function __construct()
    {
        $this->keynoteSpeakersModel = new KeynoteSpeakersModel();
        $this->plenarySpeakersModel = new PlenarySpeakersModel();
        $this->invitedSpeakersModel = new InvitedSpeakersModel();
        $this->timelinesModel = new TimelinesModel();
        $this->topicsModel = new TopicsModel();
        $this->slidersModel = new SlidersModel();
        $this->scopesModel = new ScopesModel();
        $this->focusesModel = new FocusesModel();
        $this->itineraryScheduleModel = new ItineraryScheduleModel();
        $this->boardCommitteeModel = new BoardCommitteeModel();
        $this->submissionTemplateModel = new SubmissionTemplateModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home',
            'sliders' => $this->slidersModel->findAll(),
            'keynoteSpeakers' => $this->keynoteSpeakersModel->first(),
            'plenarySpeakers' => $this->plenarySpeakersModel->findAll(),
            'invitedSpeakers' => $this->invitedSpeakersModel->findAll(),
            'timelines' => $this->timelinesModel->findAll(),
            'topics' => $this->topicsModel->findAll(),
        ];

        return view('pages/home', $data);
    }

    public function conferenceScope(): string
    {
        $scopes = $this->scopesModel->findAll();
        foreach ($scopes as $key => $scope) {
            $focuses = $this->focusesModel->where('scope_id', $scope['id'])->findAll();
            $scopes[$key]['focuses'] = $focuses;
        }
        $data = [
            'title' => 'Conference Scope',
            'scopes' => $scopes,
        ];

        return view('pages/scope', $data);
    }

    public function scientificBoardCommittee(): string
    {
        $data = [
            'title' => 'Scientific Board Committee',
            'boardCommittee' => $this->boardCommitteeModel->findAll(),
        ];

        return view('pages/committee', $data);
    }

    public function itinerarySchedule(): string
    {
        $data = [
            'title' => 'Itinerary Schedule',
            'itinerarySchedule' => $this->itineraryScheduleModel->first(),
        ];

        return view('pages/itinerary_schedule', $data);
    }

    public function submissionTemplate(): string
    {
        $data = [
            'title' => 'Submission Template',
            'submissionTemplate' => $this->submissionTemplateModel->first(),
        ];

        return view('pages/submission_template', $data);
    }
}
