<!-- Edit Document Modal -->
<div class="modal fade" id="editSubmissionTemplateModal" tabindex="-1" aria-labelledby="editSubmissionTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editSubmissionTemplateForm" method="post" action="" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubmissionTemplateModalLabel">Edit Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="editSubmissionTemplateId" name="id">
                    <div class="mb-3 form-group">
                        <label for="editSubmissionTemplateTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editSubmissionTemplateTitle" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="editSubmissionTemplateFile" class="form-label">Document</label>
                        <input type="file" class="form-control" id="editSubmissionTemplateFile" name="document" accept=".pdf, .doc, .docx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Update Itinerary Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>