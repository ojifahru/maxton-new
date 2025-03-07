<div class="modal fade" id="addItineraryScheduleModal" tabindex="-1" aria-labelledby="addItineraryScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= route_to('itinerary-schedule.store') ?>" method="post" enctype="multipart/form-data" id="addItineraryScheduleForm">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addItineraryScheduleModalLabel">Add Itinerary Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="document" class="form-label">Document File</label>
                        <input type="file" class="form-control" id="document" name="document" required accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd btn-grd-info">Add Itinerary Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>