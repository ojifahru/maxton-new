<!-- Add Slider Modal -->
<div class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="addSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="addSliderModalLabel">Add Slider</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <form action="<?= route_to('sliders.store') ?>" method="post" enctype="multipart/form-data" id="addSliderForm">
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control <?= session('addSliderErrors.title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= old('title') ?>" required>
                        <div class="invalid-feedback">
                            <?= session('addSliderErrors.title') ?>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control <?= session('addSliderErrors.description') ? 'is-invalid' : '' ?>" id="description" name="description" required><?= old('description') ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('addSliderErrors.description') ?>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control <?= session('addSliderErrors.image') ? 'is-invalid' : '' ?>" id="image" name="image" required accept="image/*">
                        <div class="invalid-feedback">
                            <?= session('addSliderErrors.image') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" id="submit-button">
                            <i class="material-icons-outlined">add_box</i>
                            Add Slider
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

<!-- Delete Slider Modal -->
<div class="modal fade" id="deleteSliderModal" tabindex="-1" aria-labelledby="deleteSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deleteSliderModalLabel">Delete Slider</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="deleteSliderMessage">Are you sure you want to delete this slider?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteSliderForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="deleteSliderId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Slider Modal -->
<div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="editSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSliderModalLabel">Edit Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSliderForm" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="edit-slider-id" name="id">

                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="edit-slider-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-slider-title" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-slider-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-slider-description" name="description" required></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="edit-slider-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="edit-slider-image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="edit-slider-preview" class="form-label">Current Image</label>
                        <img id="edit-slider-preview" src="" class="img-fluid mt-2" style="max-width: 250px;">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--end main content-->