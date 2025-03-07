<!-- Delete Scope & Focuses Modal -->
<div class="modal fade" id="deleteScopeFocusModal" tabindex="-1" aria-labelledby="deleteScopeFocusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteScopeFocusForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteScopeFocusModalLabel">Delete Scope & Focuses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this scope and its focuses?</p>
                    <input type="hidden" id="deleteScopeId" name="scope_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>