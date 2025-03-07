<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>
<div class="row row-cols-1 row-cols-xl-2 ">
    <div class="col">
        <div class="card rounded-4">
            <div class="row g-0 align-items-center">
                <div class="px-4 pb-1">
                    <form id="logo-form" action="<?= route_to('logo.update', $logo['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group mt-3 mb-4">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control <?= session('updateLogoErrors.logo') ? 'is-invalid' : ''  ?>" type="file" id="logo" name="logo" accept="image/jpg, image/jpeg, image/png, image/webp">
                            <div class="invalid-feedback"><?= session('updateLogoErrors.logo') ?></div>
                        </div>
                        <div class="form-group mt-3 mb-4">
                            <label for="current-logo" class="form-label">Current Logo</label>
                            <div class="d-flex align-items-center">
                                <img src="<?= get_logo() ?>" alt="Logo" class="img-thumbnail" id="current-logo" width="200">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Update Logo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
            <div class="row g-0 align-items-center">
                <div class="px-4 pb-1">
                    <form id="favicon-form" action="<?= route_to('favicon.update', $favicon['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group mt-3 mb-4">
                            <label for="favicon" class="form-label">Favicon</label>
                            <input class="form-control <?= session('updateLogoErrors.favicon') ? 'is-invalid' : ''  ?>" type="file" id="favicon" name="favicon" accept="image/jpg, image/jpeg, image/png, image/webp">
                            <div class="invalid-feedback"><?= session('updateLogoErrors.favicon') ?></div>
                        </div>
                        <div class="form-group mt-3 mb-4">
                            <label for="current-favicon" class="form-label">Current Favicon</label>
                            <div class="d-flex align-items-center">
                                <img src="<?= get_favicon() ?>" alt="favicon" class="img-thumbnail" id="current-favicon" width="32">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Update Favicon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>