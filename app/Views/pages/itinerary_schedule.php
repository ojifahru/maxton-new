<?= $this->extend('pages/template/main') ?>

<?= $this->section('content') ?>

<!-- Header -->
<?= $this->include('pages/template/header') ?>
<div class="col-10 mx-auto my-3">
    <div class="card shadow mb-3 responsive-iframe" data-aos="fade-up" data-aos-duration="1000">
        <iframe class="" src="<?= base_url('uploads/documents/' . $itinerarySchedule['document']) ?>" width="100%" height="480" allow="autoplay"></iframe>
    </div>
</div>

<?= $this->endSection() ?>