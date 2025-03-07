<!-- Delete Invited Speaker Modal -->
<div class="modal fade" id="deleteInvitedSpeakerModal" tabindex="-1" aria-labelledby="deleteInvitedSpeakerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="deleteInvitedSpeakerModalLabel">Delete Confirmation</h5>
                <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this invited speaker?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteInvitedSpeakerForm" action="" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>