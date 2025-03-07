<!-- Delete Timeline Modal -->
<div class="modal fade" id="deleteTimelineModal" tabindex="-1" aria-labelledby="deleteTimelineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deleteTimelineModalLabel">Delete Timeline</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p id="deleteTimelineMessage">Are you sure you want to delete this Timeline?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteTimelineForm" action="" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="deleteTimelineId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>