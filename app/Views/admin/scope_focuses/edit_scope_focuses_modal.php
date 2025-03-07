<!-- Edit Scope & Focuses Modal -->
<div class="modal fade" id="editScopeFocusModal" tabindex="-1" aria-labelledby="editScopeFocusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editScopeFocusForm" method="post" onsubmit="return validateForm('editScopeFocusForm')">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editScopeFocusModalLabel">Edit Scope & Focuses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editScopeId" name="scope_id">
                    <div class="mb-3 form-group">
                        <label for="editScopeName" class="form-label">Scope Name</label>
                        <input type="text" class="form-control" id="editScopeName" name="scope_name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="editFocuses" class="form-label">Focuses</label>
                        <div id="editFocusesContainer">
                            <!-- Focuses will be dynamically added here -->
                        </div>
                        <button type="button" class="btn btn-outline-secondary add-edit-focus-btn">+</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>