<?= $this->extend('Auth/template/main') ?>

<?= $this->section('content') ?>

<!--authentication-->

<div class="mx-3 mx-lg-0">

    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
        <div class="row g-4">
            <div class="col-lg-12 d-flex">
                <div class="card-body">
                    <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
                    <h4 class="fw-bold">Register new account</h4>
                    <?= view('App\Views\Auth\_message_block') ?>
                    <div class="form-body mt-4">
                        <form class="row g-3" action="<?= url_to('register') ?>" method="post" id="registerForm">
                            <?= csrf_field() ?>
                            <div class="col-6 form-group">
                                <label for="fullname" class="form-label">fullname</label>
                                <input type="text" id="fullname" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>"
                                    name="fullname" placeholder="Enter Fullname" value="<?= old('fullname') ?>">
                                <div class="invalid-feedback"><?= session('errors.fullname') ?></div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                                <input type="text" id="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                <div class="spinner d-none">
                                    <span class="spinner-border spinner-border-sm"></span> Checking...
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                                <input type="email" id="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <div class="spinner d-none">
                                    <span class="spinner-border spinner-border-sm"></span> Checking...
                                </div>
                                <div class="invalid-feedback"><?= session('errors.email') ?></div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>"
                                    name="phone" placeholder="Enter Phone" value="<?= old('phone') ?>">
                                <div class="spinner d-none">
                                    <span class="spinner-border spinner-border-sm"></span> Checking...
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" id="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
                                <div class="input-group" id="show_hide_pass_confirm">
                                    <input type="password" id="pass_confirm" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" id="submit-button" class="btn btn-grd-info">Register</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-start">
                                    <p class="mb-0">Already have an account? <a href="<?= url_to('login') ?>">Sign in here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>

</div>

<!--authentication-->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url() ?>assets/plugins/validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/validation/validation-script.js"></script>

<?= $this->endSection() ?>