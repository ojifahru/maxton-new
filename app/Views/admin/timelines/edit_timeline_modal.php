<!-- Edit Timeline Modal -->
<div class="modal fade" id="editTimelineModal" tabindex="-1" aria-labelledby="editTimelineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTimelineModalLabel">Edit Timeline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editTimelineForm" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="edit-timeline-id" name="id">

                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="edit-timeline-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-timeline-title" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-timeline-date">Date</label>
                        <input type="date" class="form-control" id="edit-timeline-date" name="date" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-timeline-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-timeline-description" name="description" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" id="submit-button">
                            <i class="material-icons-outlined">save</i>
                            Update Timeline
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