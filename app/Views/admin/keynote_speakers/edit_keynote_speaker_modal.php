<!-- Edit Keynote Modal -->
<div class="modal fade" id="editKeynoteSpeakerModal" tabindex="-1" aria-labelledby="editKeynoteSpeakerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKeynoteSpeakerModalLabel">Edit Keynote Speaker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editKeynoteSpeakerForm" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="edit-keynote-speaker-id" name="id">

                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="edit-keynote-speaker-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-keynote-speaker-name" name="name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-keynote-speaker-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-keynote-speaker-description" name="description" required></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-keynote-speaker-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="edit-keynote-speaker-image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-keynote-speaker-preview" class="form-label">Current Image</label>
                        <img id="edit-keynote-speaker-preview" src="" class="img-fluid mt-2" style="max-width: 150px;">
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