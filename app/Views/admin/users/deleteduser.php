<div class="modal fade" id="deletedUsersModal" tabindex="-1" aria-labelledby="deletedUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-secondary">
                <h5 class="modal-title" id="deletedUsersModalLabel">Deleted Users</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="deletedUsersTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Deleted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php foreach ($delUsers as $user) : ?>
                                <tr>
                                    <td><?= esc($user->id) ?></td>
                                    <td><?= esc($user->fullname) ?></td>
                                    <td><?= esc($user->username) ?></td>
                                    <td><?= esc($user->email) ?></td>
                                    <td><?= esc($user->deleted_at) ?></td>
                                    <td class="text-center d-flex justify-content-center gap-2">
                                        <!-- Tombol Restore -->
                                        <button type="button" class="btn btn-success raised d-flex gap-2 restore-user-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#restoreUserModal"
                                            data-user-id="<?= $user->id ?>"
                                            data-user-name="<?= $user->fullname ?>"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Restore User">
                                            <i class="material-icons-outlined">restore</i>
                                        </button>

                                        <!-- Tombol Delete Permanen -->
                                        <button type="button" class="btn btn-danger raised d-flex gap-2 delete-permanent-user-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deletePermanentUserModal"
                                            data-user-id="<?= $user->id ?>"
                                            data-user-name="<?= $user->fullname ?>"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Delete Permanently">
                                            <i class="material-icons-outlined">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAllPermanentUsersModal"
                    data-url="<?= base_url('admin/users/delete-all-permanent') ?>">
                    Delete All Permanently
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>