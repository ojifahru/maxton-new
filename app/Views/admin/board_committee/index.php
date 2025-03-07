<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Board Committee</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addBoardCommitteeModal">
            <span class="material-icons-outlined">add</span>Add Board Committee
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="boardCommitteeTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Institution</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($boardCommittees as $key => $boardCommittee) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($boardCommittee['name']) ?></td>
                            <td><?= esc($boardCommittee['institution']) ?></td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-outline-primary d-flex align-items-center edit-board-committee-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editBoardCommitteeModal"
                                    data-id="<?= esc($boardCommittee['id']) ?>"
                                    data-name="<?= esc($boardCommittee['name']) ?>"
                                    data-institution="<?= esc($boardCommittee['institution']) ?>">
                                    <span class="material-icons-outlined">edit</span>
                                </button>

                                <button type="button" class="btn btn-outline-danger d-flex delete-board-committee-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteBoardCommitteeModal"
                                    data-id="<?= esc($boardCommittee['id']) ?>"
                                    data-name="<?= esc($boardCommittee['name']) ?>">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/board_committee/add_board_committee_modal') ?>
<?= $this->include('admin/board_committee/edit_board_committee_modal') ?>
<?= $this->include('admin/board_committee/delete_board_committee_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/js/board_committee.js') ?>"></script>
<?= $this->endSection() ?>