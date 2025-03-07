<!-- Activate User Modal -->
<div class="modal fade" id="activateUserModal" tabindex="-1" aria-labelledby="activateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-success">
                <h5 class="modal-title" id="activateUserModalLabel">Activate User</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="activateUserMessage">Are you sure you want to activate this user?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="activateUserForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" id="activateUserId">
                    <button type="submit" class="btn btn-success">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="deleteUserMessage">Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteUserForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="deleteUserId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Deactivate User Modal -->
<div class="modal fade" id="deactivateUserModal" tabindex="-1" aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-warning">
                <h5 class="modal-title" id="deactivateUserModalLabel">Deactivate User</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="deactivateUserMessage">Are you sure you want to deactivate this user?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deactivateUserForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" id="deactivateUserId">
                    <button type="submit" class="btn btn-warning">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Restore User Modal -->
<div class="modal fade" id="restoreUserModal" tabindex="-1" aria-labelledby="restoreUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-success">
                <h5 class="modal-title" id="restoreUserModalLabel">Restore User</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="restoreUserMessage">Are you sure you want to restore this user?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="restoreUserForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" id="restoreUserId">
                    <button type="submit" class="btn btn-success">Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Permanent User Modal -->
<div class="modal fade" id="deletePermanentUserModal" tabindex="-1" aria-labelledby="deletePermanentUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deletePermanentUserModalLabel">Delete User Permanently</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="deletePermanentUserMessage">Are you sure you want to delete this user permanently?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deletePermanentUserForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="deletePermanentUserId">
                    <button type="submit" class="btn btn-danger">Delete permanent</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete All User Permanently -->
<div class="modal fade" id="deleteAllPermanentUsersModal" tabindex="-1" aria-labelledby="deleteAllPermanentUsersLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deleteAllPermanentUsersLabel">Confirm Permanent Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to permanently delete all users that have been deleted? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteAllPermanentUsersForm" action="" method="POST">
                    <button type="submit" class="btn btn-danger">Yes, Delete All</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>