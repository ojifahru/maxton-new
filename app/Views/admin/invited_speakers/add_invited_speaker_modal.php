<!-- Add Invited Speaker Modal -->
<div class="modal fade" id="addInvitedSpeakerModal" tabindex="-1" aria-labelledby="addInvitedSpeakerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="addInvitedSpeakerModalLabel">Add Invited Speaker</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <form action="<?= route_to('invited_speakers.store') ?>" method="post" enctype="multipart/form-data" id="addInvitedSpeakerForm">
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?= session('addInvitedSpeakerErrors.name') ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name') ?>" required>
                        <div class="invalid-feedback">
                            <?= session('addInvitedSpeakerErrors.name') ?>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control <?= session('addInvitedSpeakerErrors.description') ? 'is-invalid' : '' ?>" id="description" name="description" required><?= old('description') ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('addInvitedSpeakerErrors.description') ?>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control <?= session('addInvitedSpeakerErrors.image') ? 'is-invalid' : '' ?>" id="image" name="image" required accept="image/jpg,image/jpeg,image/png,image/webp">
                        <div class="invalid-feedback">
                            <?= session('addInvitedSpeakerErrors.image') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" id="submit-button">
                            <i class="material-icons-outlined">add_box</i>
                            Add Invited Speaker
                        </button>
                        <button type="reset" class="btn btn-grd btn-grd-royal px-2 d-flex gap-2">
                            <i class="material-icons-outlined">restart_alt</i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>