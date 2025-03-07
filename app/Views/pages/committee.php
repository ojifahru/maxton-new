<?= $this->extend('pages/template/main') ?>

<?= $this->section('content') ?>

<!-- Header -->
<?= $this->include('pages/template/header') ?>

<!-- Content -->
<div class="container-fluid my-3">
    <div class="card shadow mb-3" data-aos="fade-up" data-aos-duration="1000">
        <div class="table-responsive p-3">
            <table class="table-custom" id="myTable" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Institution</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($boardCommittee as $committee): ?>
                        <tr>
                            <td data-aos="fade-right" data-aos-duration="1000"><?= esc($committee['name']) ?></td>
                            <td data-aos="fade-left" data-aos-duration="1000"><?= esc($committee['institution']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>