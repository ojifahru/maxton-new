<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= lang('Errors.whoops') ?></title>
    <!--favicon-->
    <link rel="icon" href="<?= get_favicon() ?>" type="image/x-icon">
    <!-- loader-->
    <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/pace.min.js"></script>

    <!--Styles-->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>sass/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/blue-theme.css" rel="stylesheet">

</head>

<body class="bg-error">

    <!-- Start wrapper-->
    <div class="pt-5">

        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-lg-12">
                    <div class="text-center error-pages">
                        <h1 class="error-title text-white mb-3"><?= lang('Errors.whoops') ?>< /h1>

                                <p class="error-message text-white text-uppercase"><?= lang('Errors.weHitASnag') ?></p>

                                <div class="mt-4 d-flex align-items-center justify-content-center gap-3">
                                    <a href="<?= base_url() ?>" class="btn btn-grd-danger rounded-5 px-4"><i class="bi bi-house-fill me-2"></i>Go To Home</a>
                                    <a href="javascript:history.back();" class="btn btn-light rounded-5 px-4"><i class="bi bi-arrow-left me-2"></i>Previous Page </a>
                                </div>

                                <div class="mt-4">
                                    <p class="mb-0">&copy; <?= date('Y') ?> Contoh Website. All rights reserved.</p>
                                    <small>Designed with <i class="bi bi-heart-fill text-danger"></i> by Ojifahru</small>
                                </div>
                                <hr class="border-light border-2">
                                <?php $informasi = getInformasi(); ?>
                                <div class="list-inline contacts-social mt-4">
                                    <a href="<?= $informasi['facebook'] ?>" class="list-inline-item bg-facebook text-white border-0"><i class="bi bi-facebook"></i></a>
                                    <a href="<?= $informasi['twitter'] ?>" class="list-inline-item bg-facebook text-white border-0"><i class="bi bi-twitter"></i></a>
                                    <a href="<?= $informasi['telepon1'] ?>" class="list-inline-item bg-whatsapp text-white border-0"><i class="bi bi-whatsapp"></i></a>
                                    <a href="<?= $informasi['linkedin'] ?>"" class=" list-inline-item bg-linkedin text-white border-0"><i class="bi bi-linkedin"></i></a>
                                </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>

    </div><!--wrapper-->



</body>

</html>