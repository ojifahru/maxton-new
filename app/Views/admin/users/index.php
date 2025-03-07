<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card col-12">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Manage Users</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <span class="material-icons-outlined">person_add</span>Create User
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="userTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th class="no-export">Status</th>
                        <th class="no-export">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= esc($user->id) ?></td>
                            <td><?= esc($user->fullname) ?></td>
                            <td><?= esc($user->username) ?></td>
                            <td><?= esc($user->email) ?></td>
                            <td class="text-center">
                                <?php if ($user->group == 'superadmin') : ?>
                                    <span class="badge bg-primary"><?= esc($user->group) ?></span>
                                <?php elseif ($user->group == 'admin') : ?>
                                    <span class="badge bg-danger"><?= esc($user->group) ?></span>
                                <?php else : ?>
                                    <span class="badge bg-success"><?= esc($user->group) ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($user->active) : ?>
                                    <i class="material-icons-outlined text-success">check_circle</i>
                                <?php else : ?>
                                    <i class="material-icons-outlined text-danger">cancel</i>
                                <?php endif; ?>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <?php if ($user->id === user_id()) : ?>
                                    <button type="button" class="btn btn-outline-info d-flex align-items-center edit-user-btn"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Profile" id="editUserButton-<?= esc($user->id) ?>"
                                        onclick="window.location.href='<?= route_to('admin.profile') ?>'">
                                        <span class="material-icons-outlined" id="icon-<?= esc($user->id) ?>">account_circle</span>
                                        <span class="spinner-border spinner-border-sm d-none" id="spinner-<?= esc($user->id) ?>" role="status" aria-hidden="true"></span>
                                    </button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-outline-success d-flex align-items-center edit-user-btn"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Edit User" id="editUserButton-<?= esc($user->id) ?>"
                                        onclick="window.location.href='<?= route_to('user.edit', esc($user->id)) ?>'">
                                        <span class="material-icons-outlined" id="icon-<?= esc($user->id) ?>">account_circle</span>
                                        <span class="spinner-border spinner-border-sm d-none" id="spinner-<?= esc($user->id) ?>" role="status" aria-hidden="true"></span>
                                    </button>
                                <?php endif; ?>

                                <button type="button" class="btn btn-outline-danger d-flex delete-user-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal"
                                    data-user-id="<?= esc($user->id) ?>"
                                    data-user-name="<?= esc($user->fullname) ?>"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Delete User">
                                    <i class="material-icons-outlined">delete</i>
                                </button>
                                <?php if ($user->active) : ?>
                                    <button type="button" class="btn btn-outline-warning d-flex deactivate-user-btn" data-bs-toggle="modal" data-bs-target="#deactivateUserModal" data-user-id="<?= esc($user->id) ?>" data-user-name="<?= esc($user->fullname) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactivate User">
                                        <i class="material-icons-outlined">block</i>
                                    </button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-outline-success d-flex activate-user-btn" data-bs-toggle="modal" data-bs-target="#activateUserModal" data-user-id="<?= esc($user->id) ?>" data-user-name="<?= esc($user->fullname) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate User">
                                        <i class="material-icons-outlined">check_circle</i>
                                    </button>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#deletedUsersModal">View Deleted Users</button>
    </div>
</div>

<!-- Add User Modal -->
<?= $this->include('admin/users/adduser') ?>

<!-- Deleted Users Modal -->
<?= $this->include('admin/users/deleteduser') ?>

<!-- Modal -->
<?= $this->include('admin/users/confirmmodal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/users.js') ?>"></script>

<?php if (session('addUserErrors')) : ?>
    <script>
        $(document).ready(function() {
            $('#addUserModal').modal('show');
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {

    });
</script>

<?= $this->endSection() ?>