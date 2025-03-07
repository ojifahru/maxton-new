<footer class="custom-footer text-white pt-5 pb-4" data-aos="fade-up">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Informasi Kontak -->
            <div class="col">
                <h5 class="text-uppercase fw-bold">Informasi Kontak</h5>
                <ul class="list-unstyled">
                    <?php $informasi = getInformasi(); ?>
                    <li><i class="fas fa-map-marker-alt me-2"></i><strong>Alamat:</strong> <?= $informasi['alamat'] ?></li>
                    <li><i class="fas fa-envelope me-2"></i><strong>Email:</strong> <?= $informasi['email'] ?></li>
                    <li><i class="fas fa-globe me-2"></i><strong>Website:</strong>
                        <a href="<?= base_url() ?>" class="text-white text-decoration-none"><?= base_url() ?></a>
                    </li>
                    <li><i class="fas fa-phone me-2"></i><strong>Telepon:</strong> <?= $informasi['telepon1'] ?> | <?= $informasi['telepon2'] ?></li>
                </ul>
            </div>

            <!-- Navigasi Cepat -->
            <div class="col">
                <h5 class="text-uppercase fw-bold">Navigasi Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Layanan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            <!-- Media Sosial -->
            <div class="col">
                <h5 class="text-uppercase fw-bold">Ikuti Kami</h5>
                <p>Terhubung dengan kami melalui platform media sosial:</p>
                <div>
                    <a href="<?= $informasi['facebook'] ?>" class="social-link"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="<?= $informasi['twitter'] ?>" class="social-link"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="<?= $informasi['instagram'] ?>" class="social-link"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="<?= $informasi['linkedin'] ?>" class="social-link"><i class="fab fa-linkedin fa-2x"></i></a>
                </div>
            </div>
        </div>

        <hr class="text-light mt-4">

        <div class="row">
            <div class="col text-center" data-aos="zoom-in">
                <p class="mb-0">&copy; <?= date('Y') ?> Contoh Website. All rights reserved.</p>
                <small>Designed with <i class="fas fa-heart text-danger"></i> by Ojifahru</small>
            </div>
        </div>
    </div>
</footer>