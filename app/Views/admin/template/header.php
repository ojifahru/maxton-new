<header class="top-header">
    <nav class="navbar navbar-expand justify-content-between align-items-center gap-4">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>

        <ul class="navbar-nav gap-1 nav-right-links align-items-center">
            <li class="nav-item dropdown">
                <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="<?= base_url('uploads/users/' . user()->image) ?>" class="rounded-circle p-1 border" width="45" height="45" alt="">
                </a>
                <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                    <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                        <div class="text-center">
                            <img src="<?= base_url('uploads/users/' . user()->image) ?>" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                alt="">
                            <h5 class="user-name mb-0 fw-bold">Hello, <?= user()->fullname ?></h5>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="<?= route_to('admin.profile') ?>"><i
                            class="material-icons-outlined">person_outline</i>Profile</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="material-icons-outlined">power_settings_new</i>Logout
                    </a>
                </div>
            </li>
        </ul>

    </nav>
</header>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-danger">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-grd btn-grd-danger" data-bs-dismiss="modal">Cancel</button>
                <a href="<?= base_url('logout') ?>" class="btn btn-grd btn-grd-info">Logout</a>
            </div>
        </div>
    </div>
</div>