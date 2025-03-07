<?= $this->extend('Auth/template/main') ?>

<?= $this->section('content') ?>
<div class="mx-3 mx-lg-0">

    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden p-4">
        <div class="row g-4">
            <div class="col-lg-6 d-flex">
                <div class="card-body">
                    <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
                    <h4 class="fw-bold">Login to your account</h4>
                    <?= view('App\Views\Auth\_message_block') ?>

                    <div class="form-body mt-4">
                        <form class="g-3" action="<?= url_to('login') ?>" method="post" id="loginForm">
                            <?= csrf_field() ?>
                            <?php if ($config->validFields === ['email']): ?>
                                <div class="col-12">
                                    <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                        name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                        name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                            class="bi bi-eye-slash-fill"></i></a>
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <?php if ($config->allowRemembering): ?>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                <?php endif; ?>
                                <?php if ($config->activeResetter): ?>
                                    <div class="text-end"> <a href="<?= route_to('forgot') ?>">Forgot Password ?</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-grd-primary">Login</button>
                                </div>
                            </div>
                            <?php if ($config->allowRegistration) : ?>
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Don't have an account yet? <a href="<?= route_to('register') ?>">Sign up here</a>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex d-none">
                <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-primary">
                    <img src="assets/images/auth/login1.png" class="img-fluid" alt="">
                </div>
            </div>

        </div><!--end row-->
    </div>

</div>

<?= $this->endSection() ?>