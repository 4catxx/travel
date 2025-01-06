<?= $this->include('partials/main') ?>  

<head>  
    <?= $title_meta ?>  
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">  
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">  
    <?= $this->include('partials/head-css') ?>  
</head>  

<?= $this->include('partials/body') ?>  

<div id="layout-wrapper">  

    <?= $this->include('partials/menu') ?>  

    <div class="main-content">  

        <div class="page-content">  
            <div class="container-fluid">  

                <?= $page_title ?>  

                <div class="row">  
                    <div class="col-12">  
                        <div class="d-flex justify-content-end mb-3">  
                            <!-- Filter Dropdown -->  
                            <div class="dropdown">  
                                <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">  
                                    <i class="mdi mdi-filter-variant"></i> Filter  
                                </button>  
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#" onclick="filterCards('')">Semua</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterCards('Aktif')">Wisata Aktif</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterCards('Tidak Aktif')">Wisata Non Aktif</a></li>
                                </ul>
                            </div>  
                        </div>  

                        <!-- Cards -->  
                        <div class="row" id="card-container">  
                            <?php if (!empty($wisata)) : ?>  
                                <?php foreach ($wisata as $item) : ?>  
                                    <div class="col-md-4 mb-4" data-status="<?= esc($item['status']) ?>">  
                                        <div class="card shadow-sm border-0">  
                                            <img src="<?= base_url('uploads/wisata/' . esc($item['gambar'])) ?>" class="card-img-top rounded-top" alt="<?= esc($item['nama_wisata']) ?>">  
                                            <div class="card-body">  
                                                <h5 class="card-title text-primary"><?= esc($item['nama_wisata']) ?></h5>  
                                                <p class="card-price mb-2"><strong>Rp <?= number_format($item['harga'], 0, ',', '.') ?></strong></p>  
                                                <div class="card-location text-muted small">  
                                                    <?= htmlspecialchars_decode($item['deskripsi']) ?>  
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">  
                                                    <span class="badge <?= $item['status'] === 'Aktif' ? 'bg-success' : 'bg-danger' ?>">  
                                                        <?= esc($item['status']) ?>  
                                                    </span>  
                                                    <a href="<?= site_url('detail-paket/' . $item['id_wisata']) ?>" class="btn btn-sm btn-outline-primary">View Details</a>  
                                                </div>  
                                            </div>  
                                        </div>  
                                    </div>  
                                <?php endforeach; ?>  
                            <?php else : ?>  
                                <div class="col-12">  
                                    <p class="text-muted text-center">Tidak ada data wisata.</p>  
                                </div>  
                            <?php endif; ?>  
                        </div>  
                    </div>  
                </div>  

            </div>  
        </div>  

        <?= $this->include('partials/footer') ?>  

    </div>  

</div>  

<script>  
    function filterCards(status) {  
        const cards = document.querySelectorAll('#card-container .col-md-4');  
        cards.forEach(card => {  
            if (status === '' || card.getAttribute('data-status') === status) {  
                card.style.display = 'block';  
            } else {  
                card.style.display = 'none';  
            }  
        });  
    }  
</script>  

<?= $this->include('partials/vendor-scripts') ?>  

</body>  
</html>