<!-- Edit Plenary Speaker Modal -->
<div class="modal fade" id="editPlenarySpeakerModal" tabindex="-1" aria-labelledby="editPlenarySpeakerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlenarySpeakerModalLabel">Edit Plenary Speaker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editPlenarySpeakerForm" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="edit-plenary-speaker-id" name="id">

                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="edit-plenary-speaker-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-plenary-speaker-name" name="name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-plenary-speaker-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-plenary-speaker-description" name="description" required></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-plenary-speaker-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="edit-plenary-speaker-image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="current-plenary-speaker-image" class="form-label">Current Image</label>
                        <img id="edit-plenary-speaker-preview" src="" class="img-fluid mt-2" style="max-width: 150px;">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>