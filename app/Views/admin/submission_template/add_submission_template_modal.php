<div class="modal fade" id="addSubmissionTemplateModal" tabindex="-1" aria-labelledby="addSubmissionTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= route_to('submission-template.store') ?>" method="post" enctype="multipart/form-data" id="addSubmissionTemplateForm">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubmissionTemplateModalLabel">Add Submission Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="document" class="form-label">Document File</label>
                        <input type="file" class="form-control" id="document" name="document" required accept=".pdf, .doc, .docx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Add Submission Template</button>
                </div>
            </form>
        </div>
    </div>
</div>