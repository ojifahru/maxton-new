<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Manage Itinerary Schedule</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addItineraryScheduleModal">
            <span class="material-icons-outlined">add</span>Add Document
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="itineraryScheduleTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>Document</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($itinerarySchedule as $key => $itinerarySchedule) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($itinerarySchedule['title']) ?></td>
                            <td>
                                <a href="<?= base_url('uploads/documents/' . esc($itinerarySchedule['document'])) ?>" target="_blank">
                                    <?= esc($itinerarySchedule['document']) ?>
                                </a>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-outline-primary d-flex align-items-center edit-itinerary-schedule-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editItineraryScheduleModal"
                                    data-id="<?= esc($itinerarySchedule['id']) ?>"
                                    data-title="<?= esc($itinerarySchedule['title']) ?>"
                                    data-file="<?= esc($itinerarySchedule['document']) ?>">
                                    <span class="material-icons-outlined">edit</span>
                                </button>

                                <button type="button" class="btn btn-outline-danger d-flex delete-itinerary-schedule-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteItineraryScheduleModal"
                                    data-id="<?= esc($itinerarySchedule['id']) ?>"
                                    data-title="<?= esc($itinerarySchedule['title']) ?>">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/itinerary_schedule/add_itinerary_schedule_modal') ?>
<?= $this->include('admin/itinerary_schedule/edit_itinerary_schedule_modal') ?>
<?= $this->include('admin/itinerary_schedule/delete_itinerary_schedule_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/itinerary_schedule.js') ?>"></script>

<?= $this->endSection() ?>