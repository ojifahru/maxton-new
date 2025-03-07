<!-- Add Topic Modal -->

<div class="modal fade" id="addTopicModal" tabindex="-1" aria-labelledby="addTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= route_to('topics.store') ?>" method="post" enctype="multipart/form-data" id="addTopicForm">
                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                    <h5 class="modal-title" id="addTopicModalLabel">Add Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" id="submit-button">
                            <i class="material-icons-outlined">add_box</i>
                            Add Topic
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