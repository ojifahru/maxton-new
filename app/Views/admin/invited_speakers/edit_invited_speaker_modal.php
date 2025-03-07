<!-- Edit Invited Modal -->
<div class="modal fade" id="editInvitedSpeakerModal" tabindex="-1" aria-labelledby="editInvitedSpeakerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvitedSpeakerModalLabel">Edit Invited Speaker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editInvitedSpeakerForm" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="edit-invited-speaker-id" name="id">

                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="edit-invited-speaker-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-invited-speaker-name" name="name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-invited-speaker-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-invited-speaker-description" name="description" required></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-invited-speaker-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="edit-invited-speaker-image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-invited-speaker-preview" class="form-label">Current Image</label>
                        <img id="edit-invited-speaker-preview" src="" class="img-fluid mt-2" style="max-width: 150px;">
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