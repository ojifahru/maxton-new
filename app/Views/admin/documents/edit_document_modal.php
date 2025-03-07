<!-- Edit Document Modal -->
<div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDocumentForm" method="post" action="" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="editDocumentId" name="id">
                    <div class="mb-3 form-group">
                        <label for="editDocumentName" class="form-label">Document Name</label>
                        <input type="text" class="form-control" id="editDocumentName" name="document_name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="editDocumentFile" class="form-label">Document File</label>
                        <input type="file" class="form-control" id="editDocumentFile" name="document_file" accept=".pdf, .doc, .docx, .xls, .xlsx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Update Document</button>
                </div>
            </form>
        </div>
    </div>
</div>