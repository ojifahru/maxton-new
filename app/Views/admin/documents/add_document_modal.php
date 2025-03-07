<div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= route_to('documents.store') ?>" method="post" enctype="multipart/form-data" id="addDocumentForm">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentModalLabel">Add Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="document_name" class="form-label">Document Name</label>
                        <input type="text" class="form-control" id="document_name" name="document_name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="document_file" class="form-label">Document File</label>
                        <input type="file" class="form-control" id="document_file" name="document_file" required accept=".pdf, .doc, .docx, .xls, .xlsx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Add Document</button>
                </div>
            </form>
        </div>
    </div>
</div>