<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-opacity-50 navbar-floating d-none d-lg-block" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= get_logo() ?>" alt="Logo" height="60">
        </a>
        <button class="navbar-toggler navbar-toggler-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="conferenceProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Conference Profile
                    </a>
                    <ul class="dropdown-menu bg-dark bg-opacity-50" aria-labelledby="conferenceProfileDropdown">
                        <li><a class="dropdown-item nav-link" href="<?= base_url('conference-scope') ?>">Conference Scope</a></li>
                        <li><a class="dropdown-item nav-link" href="<?= base_url('itinerary-schedule') ?>">Conference Itinerary Schedule</a></li>
                        <li><a class="dropdown-item nav-link" href="<?= base_url('submission-template') ?>">Manuscript Submission Template</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('scientific-board-committee') ?>">Scientific Board Committee</a>
                </li>
                <?php if (in_groups('admin') || in_groups('superadmin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin') ?>" target="_blank">Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none" id="navbarMobile">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= get_logo() ?>" alt="Logo" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavMobile">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="conferenceProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Conference Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="conferenceProfileDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('conference-scope') ?>">Conference Scope</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('itinerary-schedule') ?>">Conference Itinerary Schedule</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('submission-template') ?>">Manuscript Submission Template</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('scientific-board-committee') ?>">Scientific Board Committee</a>
                </li>
                <?php if (in_groups('admin') || in_groups('superadmin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin') ?>" target="_blank">Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>