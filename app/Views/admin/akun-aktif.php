<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

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

                <?= $page_title ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-end mb-3">
                                    <!-- Filter Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-filter-variant"></i> Filter
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item" href="#" onclick="filterTable('')">Semua</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="filterTable('Admin')">Admin</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="filterTable('User')">User</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- DataTable -->
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jumlah Booking</th>
                                            <th>Tanggal Bergabung</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($users)) : ?>
                                            <?php foreach ($users as $index => $user) : ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= esc($user['nama']) ?></td>
                                                    <td><?= esc($user['email']) ?></td>
                                                    <td><?= esc($user['jumlah_booking']) ?></td>
                                                    <td><?= esc($user['tanggal_bergabung']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- Filter Functionality -->
<script>
    function filterTable(role) {
        const table = $('#datatable-buttons').DataTable();
        table.search(role).draw(); // Use the search function to filter based on role
    }
</script>

<script src="assets/js/app.js"></script>

</body>

</html>
