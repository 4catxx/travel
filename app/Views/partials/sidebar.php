<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php 
                $session = session();
                $role = $session->get('role');
                
                if($role == 1): ?>
                    <!-- Menu Admin -->
                    <li>
                        <a href="<?= base_url('beranda') ?>" class="waves-effect d-flex align-items-center">
                            <i class="mdi mdi-view-dashboard-outline me-2"></i>
                            <span><?= lang('Beranda') ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect d-flex align-items-center">
                            <i class="mdi mdi-account-circle-outline me-2"></i>
                            <span><?= lang('Informasi Akun') ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="<?= base_url('akun-aktif') ?>"><?= lang('Akun Aktif') ?></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect d-flex align-items-center">
                            <i class="mdi mdi-map-marker-multiple-outline me-2"></i>
                            <span><?= lang('Wisata') ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="<?= base_url('tambah-wisata') ?>"><?= lang('Tambah Wisata') ?></a></li>
                            <li><a href="<?= base_url('informasi-wisata') ?>"><?= lang('Informasi Wisata') ?></a></li>
                        </ul>
                    </li>

                <?php else: ?>
                    <!-- Menu User -->
                    <li>
                        <a href="<?= base_url('beranda') ?>" class="waves-effect d-flex align-items-center">
                            <i class="mdi mdi-view-dashboard-outline me-2"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('paket') ?>" class="waves-effect d-flex align-items-center">
                            <i class="mdi mdi-view-dashboard-outline me-2"></i>
                            <span>Paket Wisata</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
