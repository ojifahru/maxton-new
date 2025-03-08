<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Keynote Speakers</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addKeynoteSpeakerModal">
            <span class="material-icons-outlined">person_add</span>Add Keynote Speaker
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="keynoteSpeakersTable">
                <thead>
                    <tr>
                        <th class="text-center">Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keynote_speakers as $keynote_speaker) : ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= base_url('uploads/keynote_speakers/' . esc($keynote_speaker['image'])) ?>" class="rounded-circle" alt="<?= esc($keynote_speaker['name']) ?>" width="50">
                            </td>
                            <td><?= esc($keynote_speaker['name']) ?></td>
                            <td><?= esc($keynote_speaker['description']) ?></td>
                            <td class="text-center d-flex justify-content-center gap-2">
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
                                    <i class="material-icons-outlined">edit</i>
                                </button>
                                <button type="button" class="btn btn-dark raised d-flex gap-2 delete-keynote-speaker-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteKeynoteSpeakerModal"
                                    data-id="<?= esc($keynote_speaker['id']) ?>"
                                    data-name="<?= esc($keynote_speaker['name']) ?>">
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

<?= $this->include('admin/keynote_speakers/add_keynote_speaker_modal') ?>
<?= $this->include('admin/keynote_speakers/edit_keynote_speaker_modal') ?>
<?= $this->include('admin/keynote_speakers/delete_keynote_speaker_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/keynote_speakers.js') ?>"></script>
<!-- Datatable -->
<script>
    $(document).ready(function() {
        $('#keynoteSpeakersTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
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