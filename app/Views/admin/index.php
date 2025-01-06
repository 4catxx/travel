<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <link href="<?= base_url('/assets/libs/chartist/chartist.min.css'); ?>" rel="stylesheet">
    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="page-title text-primary fw-bold" style="font-size: 2rem; display: flex; align-items: center;">
                                <i class="mdi mdi-hand-wave text-warning me-2" style="font-size: 2.5rem;"></i> Halo, <?= esc($nama) ?>!
                            </h1>
                            <p class="lead text-muted" style="font-size: 1rem; margin-top: 10px;">
                                Selamat Datang di <span class="text-primary fw-semibold">Klas-A Tour and Travel</span>. 
                                Kami siap membantu Anda merencanakan perjalanan terbaik!
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Cards -->
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/revenue.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total</h5>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Pendapatan</h5>
                                    <h4 class="fw-medium font-size-24">52,368 <i class="mdi mdi-arrow-down text-danger ms-2"></i><i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/booking.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total</h5>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Booking</h5>
                                    <h4 class="fw-medium font-size-24">52,368 <i class="mdi mdi-arrow-down text-danger ms-2"></i><i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/travel.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total</h5>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Paket Wisata</h5>
                                    <h4 class="fw-medium font-size-24">
                                        <?= $totalWisata ?>
                                        <?php if ($arrow === 'up') : ?>
                                            <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                        <?php elseif ($arrow === 'down') : ?>
                                            <i class="mdi mdi-arrow-down text-danger ms-2"></i>
                                        <?php else : ?>
                                            <i class="mdi mdi-minus-thick text-warning ms-2"></i>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>


<!-- Peity chart-->
<script src="<?= base_url('/assets/libs/peity/jquery.peity.min.js'); ?>"></script>

<!-- Plugin Js-->
<script src="<?= base_url('/assets/libs/chartist/chartist.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js'); ?>"></script>
<script src="<?= base_url('/assets/js/pages/dashboard.init.js'); ?>"></script>
<script src="<?= base_url('/assets/js/app.js'); ?>"></script>

</body>

</html>
