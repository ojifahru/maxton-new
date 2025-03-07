<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>
<div class="header d-flex justify-content-between align-items-center my-2">
    <h4 class="card-title">Keynote Speakers</h4>
    <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addKeynoteSpeakerModal">
        <span class="material-icons-outlined">person_add</span>Add Keynote Speaker
    </button>
</div>
<div class="div">
    <hr>
</div>
<?php if (empty($keynote_speakers)) : ?>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="text-center">No keynote speakers found.</p>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row row-cols-1 row-cols-xl-2">
    <?php foreach ($keynote_speakers as $keynote_speaker) : ?>
        <div class="col mb-4">
            <div class="card h-100 rounded-4 d-flex flex-column">
                <div class="col-12 d-flex g-0 align-items-around h-100">
                    <div class="col-md-4 border-end d-flex align-items-center">
                        <div class="p-3 w-100">
                            <img src="<?= base_url('uploads/keynote_speakers/' . esc($keynote_speaker['image'])) ?>" class="w-100 rounded-start" alt="<?= esc($keynote_speaker['name']) ?>">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column">
                        <div class="card-body flex-grow-1">
                            <h5 class="card-title"><?= esc($keynote_speaker['name']) ?></h5>
                            <p class="card-text"><?= esc($keynote_speaker['description']) ?></p>
                        </div>
                        <div class="mt-auto d-flex align-items-center justify-content-start gap-2 mb-0 p-3">
                            <button type="button" class="btn btn-warning raised d-flex gap-2"
                                data-bs-toggle="modal"
                                data-bs-target="#editKeynoteSpeakerModal"
                                data-keynote-speaker-id="<?= esc($keynote_speaker['id']) ?>"
                                data-keynote-speaker-name="<?= esc($keynote_speaker['name']) ?>"
                                data-keynote-speaker-description="<?= esc($keynote_speaker['description']) ?>"
                                data-keynote-speaker-image="<?= esc($keynote_speaker['image']) ?>"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Edit Keynote Speaker">
                                <i class="material-icons-outlined">edit</i>Edit
                            </button>
                            <button type="button" class="btn btn-dark raised d-flex gap-2 delete-keynote-speaker-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteKeynoteSpeakerModal"
                                data-id="<?= esc($keynote_speaker['id']) ?>"
                                data-name="<?= esc($keynote_speaker['name']) ?>">
                                <span class="material-icons-outlined">delete</span>Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->include('admin/keynote_speakers/add_keynote_speaker_modal') ?>
<?= $this->include('admin/keynote_speakers/edit_keynote_speaker_modal') ?>
<?= $this->include('admin/keynote_speakers/delete_keynote_speaker_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/keynote_speakers.js') ?>"></script>
<?php if (session('addKeynoteSpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            $('#addKeynoteSpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>
<?php if (session('editKeynoteSpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            var keynoteSpeakerId = <?= json_encode(array_keys(session('editKeynoteSpeakerErrors'))) ?>;
            $('#editKeynoteSpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>

<?= $this->endSection() ?>