<!-- Edit Board Committee Modal -->
<div class="modal fade" id="editBoardCommitteeModal" tabindex="-1" aria-labelledby="editBoardCommitteeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= route_to('board-committee.update', 1) ?>" method="post" id="editBoardCommitteeForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBoardCommitteeModalLabel">Edit Board Committee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="editBoardCommitteeId" name="id">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control <?= session('updateBoardCommitteeErrors.name') ? 'is-invalid' : '' ?>" id="editName" name="name" value="<?= old('name') ?>">
                        <div class="invalid-feedback">
                            <?= session('updateBoardCommitteeErrors.name') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editInstitution" class="form-label">Institution</label>
                        <input type="text" class="form-control <?= session('updateBoardCommitteeErrors.institution') ? 'is-invalid' : '' ?>" id="editInstitution" name="instituion" value="<?= old('instituion') ?>">
                        <div class="invalid-feedback">
                            <?= session('updateBoardCommitteeErrors.institution') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Update Board Committee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Edit Board Committee Modal -->