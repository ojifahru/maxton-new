<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Plenary Speakers</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addPlenarySpeakerModal">
            <span class="material-icons-outlined">person_add</span>Add Plenary Speaker
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="plenarySpeakersTable">
                <thead>
                    <tr>
                        <th class="text-center">Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plenary_speakers as $plenary_speaker) : ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= base_url('uploads/plenary_speakers/' . esc($plenary_speaker['image'])) ?>" class="rounded-circle" alt="<?= esc($plenary_speaker['name']) ?>" width="50">
                            </td>
                            <td><?= esc($plenary_speaker['name']) ?></td>
                            <td><?= esc($plenary_speaker['description']) ?></td>
                            <td class="text-center d-flex justify-content-center gap-2">
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
                                    <i class="material-icons-outlined">edit</i>
                                </button>
                                <button type="button" class="btn btn-dark raised d-flex gap-2 delete-plenary-speaker-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deletePlenarySpeakerModal"
                                    data-id="<?= esc($plenary_speaker['id']) ?>"
                                    data-name="<?= esc($plenary_speaker['name']) ?>">
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

<?= $this->include('admin/plenary_speakers/add_plenary_speaker_modal') ?>
<?= $this->include('admin/plenary_speakers/edit_plenary_speaker_modal') ?>
<?= $this->include('admin/plenary_speakers/delete_plenary_speaker_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/plenary_speakers.js') ?>"></script>
<!-- DataTable -->
<script>
    $(document).ready(function() {
        $('#plenarySpeakersTable').DataTable({})
    });
</script>
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