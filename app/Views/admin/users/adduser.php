<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="addUserForm" action="<?= route_to('user.store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group mb-1">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control <?= session('addUserErrors.fullname') ? 'is-invalid' : '' ?>" id="fullname" name="fullname" value="<?= old('fullname') ?>" placeholder="Enter full name">
                        <div class="invalid-feedback"><?= session('addUserErrors.fullname') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= session('addUserErrors.username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>" placeholder="Enter username" autocomplete="username">
                        <div class="spinner d-none">
                            <span class="spinner-border text-primary spinner-border-sm"></span> Checking...
                        </div>
                        <div class="invalid-feedback"><?= session('addUserErrors.username') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= session('addUserErrors.email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>" placeholder="Enter email" autocomplete="email">
                        <div class="spinner d-none">
                            <span class="spinner-border text-primary spinner-border-sm"></span> Checking...
                        </div>
                        <div class="invalid-feedback"><?= session('addUserErrors.email') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control <?= session('addUserErrors.phone') ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= old('phone') ?>" placeholder="Enter phone number" autocomplete="phone">
                        <div class="invalid-feedback"><?= session('addUserErrors.phone') ?></div>
                        <div class="spinner d-none">
                            <span class="spinner-border text-primary spinner-border-sm"></span> Checking...
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= session('addUserErrors.password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Enter password" autocomplete="new-password">
                        <div class="invalid-feedback"><?= session('addUserErrors.password') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= session('addUserErrors.pass_confirm') ? 'is-invalid' : '' ?>" id="pass_confirm" name="pass_confirm" placeholder="Confirm password" autocomplete="new-password">
                        <div class="invalid-feedback"><?= session('addUserErrors.pass_confirm') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="group" class="form-label">Group</label>
                        <select class="form-select <?= session('addUserErrors.group') ? 'is-invalid' : '' ?>" id="group" name="group">
                            <option value="">Select Group</option>
                            <!-- Populate this with groups from the database -->
                            <?php if (in_groups('superadmin')) : ?>
                                <option value="superadmin" <?= old('group') == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                            <?php endif; ?>
                            <option value="admin" <?= old('group') == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="user" <?= old('group') == 'user' ? 'selected' : '' ?>>User</option>
                        </select>
                        <div class="invalid-feedback"><?= session('addUserErrors.group') ?></div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control <?= session('addUserErrors.image') ? 'is-invalid' : '' ?>" id="image" name="image" accept="image/jpg, image/jpeg, image/png, image/webp">
                        <div class="invalid-feedback"><?= session('addUserErrors.image') ?></div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" id="submit-button" disabled>
                                <i class="material-icons-outlined">person_add</i>
                                Create User
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
</div>