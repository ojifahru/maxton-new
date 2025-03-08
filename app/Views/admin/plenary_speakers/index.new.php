<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="header d-flex justify-content-between align-items-center my-2">
    <h4 class="card-title">Plenary Speakers</h4>
    <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addPlenarySpeakerModal">
        <span class="material-icons-outlined">person_add</span>Add Plenary Speaker
    </button>
</div>
<div class="div">
    <hr>
</div>
<?php if (empty($plenary_speakers)) : ?>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="text-center">No plenary speakers found.</p>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row row-cols-1 row-cols-xl-2">
    <?php foreach ($plenary_speakers as $plenary_speaker) : ?>
        <div class="col mb-4">
            <div class="card h-100 rounded-4 d-flex flex-column">
                <div class="col-12 d-flex g-0 align-items-center h-100">
                    <div class="col-md-4 border-end d-flex align-items-center">
                        <div class="p-3 w-100">
                            <img src="<?= base_url('uploads/plenary_speakers/' . esc($plenary_speaker['image'])) ?>" class="w-100 rounded-start" alt="<?= esc($plenary_speaker['name']) ?>">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column">
                        <div class="card-body flex-grow-1">
                            <h5 class="card-title"><?= esc($plenary_speaker['name']) ?></h5>
                            <p class="card-text"><?= esc($plenary_speaker['description']) ?></p>
                        </div>
                        <div class="mt-auto d-flex align-items-center justify-content-start gap-2 mb-0 p-3">
                            <button type="button" class="btn btn-warning raised d-flex gap-2"
                                data-bs-toggle="modal"
                                data-bs-target="#editPlenarySpeakerModal"
                                data-plenary-speaker-id="<?= esc($plenary_speaker['id']) ?>"
                                data-plenary-speaker-name="<?= esc($plenary_speaker['name']) ?>"
                                data-plenary-speaker-description="<?= esc($plenary_speaker['description']) ?>"
                                data-plenary-speaker-image="<?= esc($plenary_speaker['image']) ?>"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Edit Plenary Speaker">
                                <i class="material-icons-outlined">edit</i>Edit
                            </button>
                            <button type="button" class="btn btn-dark raised d-flex gap-2 delete-plenary-speaker-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#deletePlenarySpeakerModal"
                                data-id="<?= esc($plenary_speaker['id']) ?>"
                                data-name="<?= esc($plenary_speaker['name']) ?>">
                                <span class="material-icons-outlined">delete</span>Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->include('admin/plenary_speakers/add_plenary_speaker_modal') ?>
<?= $this->include('admin/plenary_speakers/edit_plenary_speaker_modal') ?>
<?= $this->include('admin/plenary_speakers/delete_plenary_speaker_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/plenary_speakers.js') ?>"></script>
<?php if (session('addPlenarySpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            $('#addPlenarySpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>
<?php if (session('editPlenarySpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            var plenarySpeakerId = <?= json_encode(array_keys(session('editPlenarySpeakerErrors'))) ?>;
            $('#editPlenarySpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>

<?= $this->endSection() ?>