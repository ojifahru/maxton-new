<?php

use CodeIgniter\Router\RouteCollection;
use Config\Auth as AuthConfig;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('conference-scope', 'Home::conferenceScope');
$routes->get('scientific-board-committee', 'Home::scientificBoardCommittee');
$routes->get('itinerary-schedule', 'Home::itinerarySchedule');
$routes->get('submission-template', 'Home::submissionTemplate');

// Auth
$routes->post('check_username', 'AuthController::check_username');
$routes->post('check_email', 'AuthController::check_email');
$routes->post('check_phone', 'AuthController::check_phone');

$routes->group('admin', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index', ['as' => 'admin.dashboard']);
    $routes->get('profile', 'ProfileController::index', ['as' => 'admin.profile']);
    $routes->post('profile/update', 'ProfileController::update', ['as' => 'admin.profile.update']);

    // Users
    $routes->get('users', 'Admin\UserController::index', ['as' => 'user.index']);
    $routes->post('users/store', 'Admin\UserController::store', ['as' => 'user.store']);
    $routes->get('users/edit/(:num)', 'Admin\UserController::edit/$1', ['as' => 'user.edit']);
    $routes->post('users/update/(:num)', 'Admin\UserController::update/$1', ['as' => 'user.update']);
    $routes->delete('users/delete/(:num)', 'Admin\UserController::delete/$1', ['as' => 'user.delete']);

    // Activation
    $routes->patch('users/activate/(:num)', 'Admin\UserController::activate/$1', ['as' => 'user.activate']);
    $routes->patch('users/deactivate/(:num)', 'Admin\UserController::deactivate/$1', ['as' => 'user.deactivate']);

    // Deleted Users
    $routes->patch('users/restore/(:num)', 'Admin\UserController::restore/$1', ['as' => 'user.restore']);
    $routes->delete('users/delete-permanent/(:num)', 'Admin\UserController::deletePermanent/$1');
    $routes->post('users/delete-all-permanent', 'Admin\UserController::deleteAllPermanent');

    // Logo
    $routes->get('logo', 'Admin\LogoController::index', ['as' => 'logo.index']);
    $routes->post('logo/update/(:num)', 'Admin\LogoController::updateLogo/$1', ['as' => 'logo.update']);
    $routes->post('favicon/update/(:num)', 'Admin\LogoController::updateFavicon/$1', ['as' => 'favicon.update']);
    $routes->delete('logo/delete/(:any)', 'Admin\LogoController::delete/$1', ['as' => 'logo.delete']);

    // Informasi
    $routes->get('informasi', 'Admin\InformasiController::index', ['as' => 'informasi.index']);
    $routes->post('informasi/update/(:num)', 'Admin\InformasiController::update/$1', ['as' => 'informasi.update']);

    // Sliders
    $routes->get('sliders', 'Admin\SlidersController::index', ['as' => 'sliders.index']);
    $routes->post('sliders/store', 'Admin\SlidersController::store', ['as' => 'sliders.store']);
    $routes->put('sliders/update/(:num)', 'Admin\SlidersController::update/$1', ['as' => 'sliders.update']);
    $routes->delete('sliders/delete/(:num)', 'Admin\SlidersController::delete/$1', ['as' => 'sliders.delete']);

    // Keynote Speakers
    $routes->get('keynote_speakers', 'Admin\KeynoteSpeakersController::index', ['as' => 'keynote_speakers.index']);
    $routes->post('keynote_speakers/store', 'Admin\KeynoteSpeakersController::store', ['as' => 'keynote_speakers.store']);
    $routes->put('keynote_speakers/update/(:num)', 'Admin\KeynoteSpeakersController::update/$1', ['as' => 'keynote_speakers.update']);
    $routes->delete('keynote_speakers/delete/(:num)', 'Admin\KeynoteSpeakersController::delete/$1', ['as' => 'keynote_speakers.delete']);

    // Plenary Speakers
    $routes->get('plenary_speakers', 'Admin\PlenarySpeakersController::index', ['as' => 'plenary_speakers.index']);
    $routes->post('plenary_speakers/store', 'Admin\PlenarySpeakersController::store', ['as' => 'plenary_speakers.store']);
    $routes->put('plenary_speakers/update/(:num)', 'Admin\PlenarySpeakersController::update/$1', ['as' => 'plenary_speakers.update']);
    $routes->delete('plenary_speakers/delete/(:num)', 'Admin\PlenarySpeakersController::delete/$1', ['as' => 'plenary_speakers.delete']);

    // Invited Speakers
    $routes->get('invited_speakers', 'Admin\InvitedSpeakersController::index', ['as' => 'invited_speakers.index']);
    $routes->post('invited_speakers/store', 'Admin\InvitedSpeakersController::store', ['as' => 'invited_speakers.store']);
    $routes->put('invited_speakers/update/(:num)', 'Admin\InvitedSpeakersController::update/$1', ['as' => 'invited_speakers.update']);
    $routes->delete('invited_speakers/delete/(:num)', 'Admin\InvitedSpeakersController::delete/$1', ['as' => 'invited_speakers.delete']);

    // Timelines
    $routes->get('timelines', 'Admin\TimelinesController::index', ['as' => 'timelines.index']);
    $routes->post('timelines/store', 'Admin\TimelinesController::store', ['as' => 'timelines.store']);
    $routes->put('timelines/update/(:num)', 'Admin\TimelinesController::update/$1', ['as' => 'timelines.update']);
    $routes->delete('timelines/delete/(:num)', 'Admin\TimelinesController::delete/$1', ['as' => 'timelines.delete']);

    // Topics
    $routes->get('topics', 'Admin\TopicsController::index', ['as' => 'topics.index']);
    $routes->post('topics/store', 'Admin\TopicsController::store', ['as' => 'topics.store']);
    $routes->put('topics/update/(:num)', 'Admin\TopicsController::update/$1', ['as' => 'topics.update']);
    $routes->delete('topics/delete/(:num)', 'Admin\TopicsController::delete/$1', ['as' => 'topics.delete']);

    // Scope and focuses
    $routes->get('scope-focuses', 'Admin\ScopeFocusesController::index', ['as' => 'scope-focuses.index']);
    $routes->post('scope-focuses/add', 'Admin\ScopeFocusesController::store', ['as' => 'scope-focuses.store']);
    $routes->post('scope-focuses/update/(:num)', 'Admin\ScopeFocusesController::update/$1', ['as' => 'scope-focuses.update']);
    $routes->post('scope-focuses/delete/(:num)', 'Admin\ScopeFocusesController::delete/$1', ['as' => 'scope-focuses.delete']);

    // Documents
    $routes->get('documents', 'Admin\DocumentsController::index', ['as' => 'documents.index']);
    $routes->post('documents/store', 'Admin\DocumentsController::store', ['as' => 'documents.store']);
    $routes->put('documents/update/(:num)', 'Admin\DocumentsController::update/$1', ['as' => 'documents.update']);
    $routes->delete('documents/delete/(:num)', 'Admin\DocumentsController::delete/$1', ['as' => 'documents.delete']);

    // Itinerary Schedule
    $routes->get('itinerary-schedule', 'Admin\ItineraryScheduleController::index', ['as' => 'itinerary-schedule.index']);
    $routes->post('itinerary-schedule/store', 'Admin\ItineraryScheduleController::store', ['as' => 'itinerary-schedule.store']);
    $routes->put('itinerary-schedule/update/(:num)', 'Admin\ItineraryScheduleController::update/$1', ['as' => 'itinerary-schedule.update']);
    $routes->delete('itinerary-schedule/delete/(:num)', 'Admin\ItineraryScheduleController::delete/$1', ['as' => 'itinerary-schedule.delete']);

    // Submission Template
    $routes->get('submission-template', 'Admin\SubmissionTemplateController::index', ['as' => 'submission-template.index']);
    $routes->post('submission-template/store', 'Admin\SubmissionTemplateController::store', ['as' => 'submission-template.store']);
    $routes->put('submission-template/update/(:num)', 'Admin\SubmissionTemplateController::update/$1', ['as' => 'submission-template.update']);
    $routes->delete('submission-template/delete/(:num)', 'Admin\SubmissionTemplateController::delete/$1', ['as' => 'submission-template.delete']);

    // Board Committee
    $routes->get('board-committee', 'Admin\BoardCommitteeController::index', ['as' => 'board-committee.index']);
    $routes->post('board-committee/store', 'Admin\BoardCommitteeController::store', ['as' => 'board-committee.store']);
    $routes->put('board-committee/update/(:num)', 'Admin\BoardCommitteeController::update/$1', ['as' => 'board-committee.update']);
    $routes->delete('board-committee/delete/(:num)', 'Admin\BoardCommitteeController::delete/$1', ['as' => 'board-committee.delete']);
});


// Myth:Auth routes file.
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(AuthConfig::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});
