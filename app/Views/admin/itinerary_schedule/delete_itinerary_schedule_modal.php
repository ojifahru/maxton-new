<!-- Delete Document Modal -->
<div class="modal fade" id="deleteItineraryScheduleModal" tabindex="-1" aria-labelledby="deleteItineraryScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteItineraryScheduleForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteItineraryScheduleModalLabel">Delete Itinerary Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" id="deleteItineraryScheduleId" name="id">
                    <p>Are you sure you want to delete this document?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Delete Document</button>
                </div>
            </form>
        </div>
    </div>
</div>