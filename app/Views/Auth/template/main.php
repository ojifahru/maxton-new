<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    <!-- loader-->
    <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/metismenu/mm-vertical.css">
    <link href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <!--bootstrap css-->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
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


    <?= $this->renderSection('content') ?>




    <!--plugins-->
    <!--bootstrap js-->
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
        $(document).ready(function() {
            $("#show_hide_pass_confirm a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_pass_confirm input').attr("type") == "text") {
                    $('#show_hide_pass_confirm input').attr('type', 'password');
                    $('#show_hide_pass_confirm i').addClass("bi-eye-slash-fill");
                    $('#show_hide_pass_confirm i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_pass_confirm input').attr("type") == "password") {
                    $('#show_hide_pass_confirm input').attr('type', 'text');
                    $('#show_hide_pass_confirm i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_pass_confirm i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

    <?= $this->renderSection('scripts') ?>

</body>

</html>