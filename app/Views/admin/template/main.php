<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="base_url" content="<?= base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!--favicon-->
    <link rel="icon" href="<?= get_favicon() ?>" type="image/*" sizes="16x16">
    <!-- loader-->
    <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/metismenu/mm-vertical.css">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css">
    <!--bootstrap css-->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/plugins/datatable/css/datatables.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="<?= base_url() ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/dark-theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/blue-theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/semi-dark.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/bordered-theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>sass/responsive.css" rel="stylesheet">

</head>

<body>

    <!--start header-->
    <?= $this->include('admin/template/header') ?>
    <!--end top header-->


    <!--start sidebar-->
    <?= $this->include('admin/template/sidebar') ?>
    <!--end sidebar-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <?= $this->include('admin/template/breadcrumb') ?>
            <!--end breadcrumb-->

            <?= $this->renderSection('content') ?>

        </div>
    </main>
    <!--end main wrapper-->





    <!--start footer-->
    <footer class="page-footer mb-0">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer>
    <!--top footer-->



    <!--start switcher-->
    <?= $this->include('admin/template/switcher') ?>
    <!--start switcher-->

    <!--bootstrap js-->
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatable/js/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!--notification js -->
    <script src="<?= base_url() ?>assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/notifications/js/notifications.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/notifications/js/notification-custom-script.js"></script>
    <!-- Validation -->
    <script src="<?= base_url() ?>assets/plugins/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/validation/additional-methods.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/validation/validation-script.js"></script>
    <!--app js-->
    <?= $this->renderSection('script') ?>
    <script>
        <?php if (session()->getFlashdata('success')) : ?>
            success_notif('<?= session()->getFlashdata('success') ?>');
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            error_notif('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
    </script>
    <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>