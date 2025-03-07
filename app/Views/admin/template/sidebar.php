<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo">
            <img src="<?= get_logo() ?>" class="logo-img" alt="Logo" szi>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="<?= base_url('admin') ?>">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>" target="_blank">
                    <div class="parent-icon"><i class="material-icons-outlined">public</i>
                    </div>
                    <div class="menu-title">View Site</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">settings</i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul>
                    <li><a href="<?= route_to('logo.index') ?>"><i class="material-icons-outlined">arrow_right</i>Logo</a></li>
                    <li><a href="<?= route_to('informasi.index') ?>"><i class="material-icons-outlined">arrow_right</i>Informasi</a></li>
                    <li><a href="<?= route_to('sliders.index') ?>"><i class="material-icons-outlined">arrow_right</i>Sliders</a></li>
                </ul>
            </li>
            <hr>
            <li class="menu-label">Conference</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">mic</i>
                    </div>
                    <div class="menu-title">Speakers</div>
                </a>
                <ul>
                    <li><a href="<?= route_to('keynote_speakers.index') ?>"><i class="material-icons-outlined">arrow_right</i>Keynote Speaker</a></li>
                    <li><a href="<?= route_to('plenary_speakers.index') ?>"><i class="material-icons-outlined">arrow_right</i>Plenary Speaker</a></li>
                    <li><a href="<?= route_to('invited_speakers.index') ?>"><i class="material-icons-outlined">arrow_right</i>Invited Speaker</a></li>

                </ul>
            </li>
            <li><a href="<?= route_to('timelines.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">event</i>
                    </div>
                    <div class="menu-title">
                        Timeline
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= route_to('topics.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">list</i>
                    </div>
                    <div class="menu-title">
                        Topics
                    </div>
                </a>
            </li>
            <hr>
            <li class="menu-label">Conference Profile</li>
            <li>
                <a href="<?= route_to('scope-focuses.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">list</i>
                    </div>
                    <div class="menu-title">
                        Scope and Focuses
                    </div>
                </a>
            </li>
            <!-- <li>
                <a href="<?= route_to('documents.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">
                        Documents
                    </div>
                </a>
            </li> -->
            <li>
                <a href="<?= route_to('itinerary-schedule.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">
                        Itinerary Schedule
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= route_to('submission-template.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">
                        Submission Template
                    </div>
                </a>
            </li>
            <hr>
            <li class="menu-label">Board Committee</li>
            <li>
                <a href="<?= route_to('board-committee.index') ?>">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">group</i>
                    </div>
                    <div class="menu-title">
                        Board Committee
                    </div>
                </a>
            </li>
            <hr>
            <li class="menu-label">Manage Users</li>
            <li>
                <a href="<?= route_to('user.index') ?>">
                    <div class="parent-icon"><i class="material-icons-outlined">account_circle</i>
                    </div>
                    <div class="menu-title">Users</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>