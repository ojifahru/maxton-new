<!-- Add Scope & Focuses Modal -->
<div class="modal fade" id="addScopeFocusModal" tabindex="-1" aria-labelledby="addScopeFocusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addScopeFocusForm" action="<?= base_url('admin/scope-focuses/add') ?>" method="post" onsubmit="return validateForm('addScopeFocusForm')">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addScopeFocusModalLabel">Add Scope & Focuses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="scopeName" class="form-label">Scope Name</label>
                        <input type="text" class="form-control" id="scopeName" name="scope_name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="focuses" class="form-label">Focuses</label>
                        <div id="focuses-container">
                            <div class="input-group mb-2 form-group">
                                <input type="text" class="form-control" name="focuses[]" placeholder="Enter focus" required>
                                <button type="button" class="btn btn-outline-secondary add-focus-btn">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>