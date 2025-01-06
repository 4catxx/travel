<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url('beranda') ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="17">
                    </span>
                </a>

                <a href="<?= base_url('beranda') ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-light.png') ?>" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex align-items-center justify-content-end flex-grow-1">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/user-4.jpg') ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2"><?= esc($nama) ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= base_url('#') ?>">
                        <i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> 
                        <?= lang('Files.Profile') ?>
                    </a>
                    <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                        <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> 
                        <?= lang('Files.Logout') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>