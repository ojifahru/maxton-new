<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Invited Speakers</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addInvitedSpeakerModal">
            <span class="material-icons-outlined">person_add</span>Add Invited Speaker
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="invitedSpeakersTable">
                <thead>
                    <tr>
                        <th class="text-center">Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invited_speakers as $invited_speaker) : ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= base_url('uploads/invited_speakers/' . esc($invited_speaker['image'])) ?>" class="rounded-circle" alt="<?= esc($invited_speaker['name']) ?>" width="50">
                            </td>
                            <td><?= esc($invited_speaker['name']) ?></td>
                            <td><?= esc($invited_speaker['description']) ?></td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-warning raised d-flex gap-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editInvitedSpeakerModal"
                                    data-invited-speaker-id="<?= esc($invited_speaker['id']) ?>"
                                    data-invited-speaker-name="<?= esc($invited_speaker['name']) ?>"
                                    data-invited-speaker-description="<?= esc($invited_speaker['description']) ?>"
                                    data-invited-speaker-image="<?= esc($invited_speaker['image']) ?>"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit Invited Speaker">
                                    <i class="material-icons-outlined">edit</i>
                                </button>
                                <button type="button" class="btn btn-dark raised d-flex gap-2 delete-invited-speaker-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteInvitedSpeakerModal"
                                    data-id="<?= esc($invited_speaker['id']) ?>"
                                    data-name="<?= esc($invited_speaker['name']) ?>">
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

<?= $this->include('admin/invited_speakers/add_invited_speaker_modal') ?>
<?= $this->include('admin/invited_speakers/edit_invited_speaker_modal') ?>
<?= $this->include('admin/invited_speakers/delete_invited_speaker_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/invited_speakers.js') ?>"></script>
<?php if (session('addInvitedSpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            $('#addInvitedSpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>
<?php if (session('editInvitedSpeakerErrors')) : ?>
    <script>
        $(document).ready(function() {
            var invitedSpeakerId = <?= json_encode(array_keys(session('editInvitedSpeakerErrors'))) ?>;
            $('#editInvitedSpeakerModal').modal('show');
        });
    </script>
<?php endif; ?>

<?= $this->endSection() ?>