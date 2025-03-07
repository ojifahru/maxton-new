<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>
<div class="header d-flex justify-content-between align-items-center my-2">
    <h4>Sliders Image</h4>
    <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addSliderModal">
        <span class="material-icons-outlined">add_box</span>Add Slider
    </button>
</div>
<div class="div">
    <hr>
</div>
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
    <?php foreach ($sliders as $slider) : ?>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('uploads/sliders/' . esc($slider['image'])) ?>" class="card-img-top" alt="<?= esc($slider['title']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($slider['title']) ?></h5>
                    <p class="card-text"><?= esc($slider['description']) ?></p>
                    <div class="d-flex justify-content-start gap-2">
                        <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                            data-bs-toggle="modal"
                            data-bs-target="#editSliderModal"
                            data-slider-id="<?= esc($slider['id']) ?>"
                            data-slider-title="<?= esc($slider['title']) ?>"
                            data-slider-description="<?= esc($slider['description']) ?>"
                            data-slider-image="<?= esc($slider['image']) ?>"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit Slider">
                            <i class="material-icons-outlined">edit</i>
                        </button>
                        <button type="button" class="btn btn-outline-danger d-flex delete-slider-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteSliderModal"
                            data-slider-id="<?= esc($slider['id']) ?>"
                            data-slider-title="<?= esc($slider['title']) ?>"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete Slider">
                            <i class="material-icons-outlined">delete</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Delete Confirmation Modal -->
<?= $this->include('admin/sliders/modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/sliders.js') ?>"></script>

<?php if (session('addSliderErrors')) : ?>
    <script>
        $(document).ready(function() {
            $('#addSliderModal').modal('show');
        });
    </script>
<?php endif; ?>
<?php if (session('editSliderErrors')) : ?>
    <script>
        $(document).ready(function() {
            var sliderId = <?= json_encode(array_keys(session('editSliderErrors'))) ?>;
            $('#editSliderModal-' + sliderId).modal('show');
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>