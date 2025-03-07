<!-- Add Board Committee Modal -->
<div class="modal fade" id="addBoardCommitteeModal" tabindex="-1" aria-labelledby="addBoardCommitteeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= route_to('board-committee.store') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBoardCommitteeModalLabel">Add Board Committee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?= session('addBoardCommitteeErrors.name') ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name') ?>">
                        <div class="invalid-feedback">
                            <?= session('addBoardCommitteeErrors.name') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="instituion" class="form-label">Institution</label>
                        <input type="text" class="form-control <?= session('addBoardCommitteeErrors.instituion') ? 'is-invalid' : '' ?>" id="instituion" name="instituion" value="<?= old('instituion') ?>">
                        <div class="invalid-feedback">
                            <?= session('addBoardCommitteeErrors.instituion') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Add Board Committee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Add Board Committee Modal -->