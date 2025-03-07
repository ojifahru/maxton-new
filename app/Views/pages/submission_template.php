<?= $this->extend('pages/template/main') ?>

<?= $this->section('content') ?>

<!-- Header -->
<?= $this->include('pages/template/header') ?>
<div class="col-10 col-md-6 col-lg-4 m-3">
    <div class="card shadow mb-3" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-header bg-secondary text-white">
            <h5 class="card-title">Submission Template</h5>
        </div>
        <div class="card-body">
            <a href="<?= base_url('uploads/documents/' . $submissionTemplate['document']) ?>" class="btn btn-primary" download>
                <i class="fas fa-download"></i> Download Manuscript Submission Template
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>