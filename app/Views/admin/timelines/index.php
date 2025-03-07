<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card col-12">
    <div class="card card-primary card-outline">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Timelines</h4>
            <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addTimelineModal">
                <span class="material-icons-outlined">add_box</span>Add Timeline
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive table-striped" id="timelines-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($timelines as $key =>  $timeline) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= esc($timeline['title']) ?></td>
                                <td><?= esc($timeline['description']) ?></td>
                                <td><?= date('D, d M Y', strtotime($timeline['date'])) ?></td>
                                <td class="d-flex center gap-2">
                                    <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editTimelineModal"
                                        data-timeline-id="<?= esc($timeline['id']) ?>"
                                        data-timeline-title="<?= esc($timeline['title']) ?>"
                                        data-timeline-date="<?= esc($timeline['date']) ?>"
                                        data-timeline-description="<?= esc($timeline['description']) ?>"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Edit Timeline">
                                        <i class="material-icons-outlined">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger d-flex delete-timeline-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteTimelineModal"
                                        data-timeline-id="<?= esc($timeline['id']) ?>"
                                        data-timeline-title="<?= esc($timeline['title']) ?>"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete Timeline">
                                        <i class="material-icons-outlined">delete</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/timelines/add_timeline_modal') ?>
<?= $this->include('admin/timelines/edit_timeline_modal') ?>
<?= $this->include('admin/timelines/delete_timeline_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/js/timelines.js') ?>"></script>
<script>
    $('#timelines-table').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        order: [
            [2, 'asc']
        ], // Urutkan berdasarkan kolom tanggal (index ke-2)
        columnDefs: [{
            targets: 2, // Kolom tanggal
            render: function(data, type, row) {
                if (type === 'sort' || type === 'type') {
                    return moment(data, 'ddd, DD MMM YYYY').format('YYYYMMDD'); // Format untuk sorting
                }
                return data; // Tampilan biasa
            }
        }]
    });

    $(".datepicker").flatpickr();

    $(".time-picker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-time").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-format").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-range").flatpickr({
        mode: "range",
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-inline").flatpickr({
        inline: true,
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });
</script>
<?= $this->endSection() ?>