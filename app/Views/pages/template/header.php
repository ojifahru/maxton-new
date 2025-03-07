<!-- Page Header -->
<header class="masthead position-relative" data-aos="fade-in">
    <div class="overlay"></div>
    <div class="container position-relative text-center text-white">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading" data-aos="fade-down">
                    <h1 class="display-4 fw-bold"><?= $title ?></h1>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav position-absolute bottom-0 start-0 p-3" data-aos="fade-up">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() ?>" class="text-light">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active text-light" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
</header>