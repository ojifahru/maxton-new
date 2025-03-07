<!-- delet Board committee Modal -->
<div class="modal fade" id="deleteBoardCommitteeModal" tabindex="-1" aria-labelledby="deleteBoardCommitteeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" id="deleteBoardCommitteeForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBoardCommitteeModalLabel">Delete Board Committee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="deleteBoardCommitteeId">
                    <p>Are you sure you want to delete this board committee?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Delete Board Committee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of delete Board committee Modal -->