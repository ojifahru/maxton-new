<?= $this->extend('pages/template/main') ?>

<?= $this->section('content') ?>

<!-- Header -->
<?= $this->include('pages/template/header') ?>

<!-- Content -->
    <div class="section my-3 shadow-lg" id="scopeFocustable">
        <div class="container-fluid">
            <div class="card shadow mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="table-responsive p-3">
                    <table class="table-custom" id="myTable" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="150">
                        <thead>
                            <tr>
                                <th class="col-6 col-md-5 col-lg-4">Scope</th>
                                <th class="col-6 col-md-7 col-lg-8 ">Focus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($scopes as $scope) : ?>
                                <tr>
                                    <td data-aos="fade-right" data-aos-duration="1000"><?= esc($scope['name']) ?></td>
                                    <td data-aos="fade-left" data-aos-duration="1000">
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($scope['focuses'] as $focus) : ?>
                                                <li class="list-group-item"><?= esc($focus['name']) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>