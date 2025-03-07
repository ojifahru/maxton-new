<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card rounded border-top border-4 border-primary border-gradient-1">
            <div class="card-body">
                <div class="align-items-center d-flex flex-column gap-1">
                    <div class="profile-avatar">
                        <?php if ($user->image): ?>
                            <img src="<?= base_url('uploads/users/' . $user->image) ?>" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                        <?php else: ?>
                            <img src="<?= base_url() ?>assets/images/avatars/01.png" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="profile-info text-center">
                        <h3><?= $user->fullname ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="">
                        <h5 class="mb-0 fw-bold">About</h5>
                    </div>
                </div>
                <div class="full-info">
                    <div class="info-list d-flex flex-column gap-3">
                        <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">account_circle</span>
                            <p class="mb-0">Full Name: <?= esc($user->fullname) ?></p>
                        </div>
                        <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">done</span>
                            <p class="mb-0">Status: <?= $user->active ? 'Active' : 'Inactive' ?></p>
                        </div>
                        <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">code</span>
                            <p class="mb-0">Role: <?= esc($user->group) ?></p>
                        </div>
                        <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">send</span>
                            <p class="mb-0">Email: <?= esc($user->email) ?></p>
                        </div>
                        <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">call</span>
                            <p class="mb-0">Phone: <?= esc($user->phone) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
            <div class="card-body p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0 fw-bold">Edit Profile</h5>
                    </div>
                </div>
                <form class="row g-4" id="editUserForm" action="<?= route_to('admin.profile.update') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" id="user_id" name="user_id" value="<?= $user->id; ?>">
                    <div class="mb-1 col-md-6">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control <?= session('editProfileErrors.fullname') ? 'is-invalid' : '' ?>" id="fullname" name="fullname" value="<?= esc(old('fullname', $user->fullname)) ?>" required>
                        <div class="invalid-feedback"><?= session('editProfileErrors.fullname') ?></div>
                    </div>
                    <div class="mb-1 col-md-6 form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= session('editProfileErrors.username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= esc(old('username', $user->username)) ?>" required autocomplete="username">
                        <div class="spinner d-none">
                            <span class="spinner-border text-primary spinner-border-sm"></span> Checking...
                        </div>
                        <div class="invalid-feedback"><?= session('editProfileErrors.username') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control <?= session('editProfileErrors.phone') ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= esc(old('phone', $user->phone)) ?>" required autocomplete="phone">
                        <div class="spinner d-none">
                            <span class="spinner-border spinner-border-sm"></span> Checking...
                        </div>
                        <div class="invalid-feedback"><?= session('editProfileErrors.phone') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= session('editProfileErrors.email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= esc(old('email', $user->email)) ?>" required autocomplete="email">
                        <div class="spinner d-none">
                            <span class="spinner-border text-primary spinner-border-sm"></span> Checking...
                        </div>
                        <div class="invalid-feedback"><?= session('editProfileErrors.email') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= session('editProfileErrors.password') ? 'is-invalid' : '' ?>" id="password" name="password" autocomplete="new-password">
                        <div class="invalid-feedback"><?= session('editProfileErrors.password') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-6">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= session('editProfileErrors.pass_confirm') ? 'is-invalid' : '' ?>" id="pass_confirm" name="pass_confirm" autocomplete="new-password">
                        <div class="invalid-feedback"><?= session('editProfileErrors.pass_confirm') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-12">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control <?= session('editProfileErrors.image') ? 'is-invalid' : '' ?>" id="image" name="image">
                        <div class="invalid-feedback"><?= session('editProfileErrors.image') ?></div>
                    </div>
                    <div class="mb-1 form-group col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-grd btn-grd-info px-2" disabled id="submit-edit-button">
                                Update User
                            </button>
                            <button type="reset" class="btn btn-grd btn-grd-royal px-2">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!--end row-->

<?= $this->endSection() ?>