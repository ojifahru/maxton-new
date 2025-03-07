<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Scope and Focuses</h4>
                <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addScopeFocusModal">
                    <span class="material-icons-outlined">add_box</span>Add Scope & Focuses
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="scope-focus-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Scope</th>
                                <th>Focuses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($scopes as $key => $scope) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($scope['name']) ?></td>
                                    <td>
                                        <ul>
                                            <?php foreach ($scope['focuses'] as $focus) : ?>
                                                <li><?= esc($focus['name']) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editScopeFocusModal"
                                            data-scope-id="<?= esc($scope['id']) ?>"
                                            data-scope-name="<?= esc($scope['name']) ?>"
                                            data-focuses='<?= htmlspecialchars(json_encode($scope['focuses']), ENT_QUOTES, 'UTF-8') ?>'
                                            data-bs-placement="top"
                                            title="Edit Scope Focus"
                                            aria-label="Edit Scope Focus">
                                            <i class="material-icons-outlined">edit</i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger delete-scope-focus-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteScopeFocusModal"
                                            data-scope-id="<?= esc($scope['id']) ?>"
                                            data-scope-name="<?= esc($scope['name']) ?>"
                                            data-bs-placement="top"
                                            title="Delete Scope Focus"
                                            aria-label="Delete Scope Focus">
                                            <i class="material-icons-outlined">delete</i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/scope_focuses/add_scope_focuses_modal') ?>
<?= $this->include('admin/scope_focuses/edit_scope_focuses_modal') ?>
<?= $this->include('admin/scope_focuses/delete_scope_focuses_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/js/scope_focuses.js') ?>"></script>
<?= $this->endSection() ?>