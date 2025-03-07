<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><?= $title ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= route_to('informasi.update', 1) ?>" method="post" id="updateInformasiForm">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= esc($informasi['id']) ?>">
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9 form-group">
                            <textarea class="form-control <?= session('updateInformasiErrors.alamat') ? 'is-invalid' : '' ?>" name="alamat" id="alamat" rows="3" placeholder="Address"><?= esc($informasi['alamat']) ?></textarea>
                            <div class="invalid-feedback col-sm-9"><?= session('updateInformasiErrors.alamat') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9 form-group">
                            <input type="email" name="email" class="form-control <?= session('updateInformasiErrors.email') ? 'is-invalid' : '' ?>" id="email" placeholder="Enter Your Email" value="<?= esc($informasi['email']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.email') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="website" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="website" class="form-control <?= session('updateInformasiErrors.website') ? 'is-invalid' : '' ?>" id="website" placeholder="Enter Your Website Url" value="<?= base_url() ?>" readonly>
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.website') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon1" class="col-sm-3 col-form-label">Phone 1</label>
                        <div class="col-sm-9 form-group">
                            <input type="tel" name="telepon1" class="form-control <?= session('updateInformasiErrors.telepon1') ? 'is-invalid' : '' ?>" id="telepon1" placeholder="Phone No" value="<?= esc($informasi['telepon1']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.telepon1') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon2" class="col-sm-3 col-form-label">Phone 2</label>
                        <div class="col-sm-9 form-group">
                            <input type="tel" name="telepon2" class="form-control <?= session('updateInformasiErrors.telepon2') ? 'is-invalid' : '' ?>" id="telepon2" placeholder="Phone No" value="<?= esc($informasi['telepon2']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.telepon2') ?></div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-3 text-underline">Social Media</h5>
                    <div class="row mb-3">
                        <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="facebook" class="form-control <?= session('updateInformasiErrors.facebook') ? 'is-invalid' : '' ?>" id="facebook" placeholder="Facebook URL" value="<?= esc($informasi['facebook']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.facebook') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="twitter" class="form-control <?= session('updateInformasiErrors.twitter') ? 'is-invalid' : '' ?>" id="twitter" placeholder="Twitter URL" value="<?= esc($informasi['twitter']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.twitter') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="instagram" class="form-control <?= session('updateInformasiErrors.instagram') ? 'is-invalid' : '' ?>" id="instagram" placeholder="Instagram URL" value="<?= esc($informasi['instagram']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.instagram') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="youtube" class="col-sm-3 col-form-label">Youtube</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="youtube" class="form-control <?= session('updateInformasiErrors.youtube') ? 'is-invalid' : '' ?>" id="youtube" placeholder="Youtube URL" value="<?= esc($informasi['youtube']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.youtube') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                        <div class="col-sm-9 form-group">
                            <input type="url" name="linkedin" class="form-control <?= session('updateInformasiErrors.linkedin') ? 'is-invalid' : '' ?>" id="linkedin" placeholder="Linkedin URL" value="<?= esc($informasi['linkedin']) ?>">
                            <div class="invalid-feedback"><?= session('updateInformasiErrors.linkedin') ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-9 form-group offset-sm-3">
                            <button type="submit" class="btn btn-primary">
                                Update Informations
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>