<?= $this->include('partials/main') ?>
<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
</head>
<style>
   input[disabled] {
    background-color: #f0f0f0;
    color: #888888;
    border: 1px solid #ccc;
}
textarea[disabled],
input[disabled]:focus {
    background-color: #f8f9fa;
    color: #6c757d;
    border: 100px solid #ced4da;
    box-shadow: none;
}

</style>

<?= $this->include('partials/body') ?>

<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>

                <div class="row">
                    <div class="col-xl-8">
                        <!-- Billing Info -->
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-body">
                                <h4 class="fw-bold text-primary mb-4"><i class="fas fa-file-invoice me-2"></i> Data Diri</h4>
                                <form>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="billing-name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="billing-name" placeholder="Masukkan Nama Lengkap" 
                                        value="<?= esc($nama) ?>" <?= isset($nama) ? 'disabled' : '' ?>>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="billing-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="billing-email" placeholder="Masukkan Email" 
                                            value="<?= esc($email) ?>" <?= isset($email) ? 'disabled' : '' ?>>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="billing-phone" class="form-label">No Telephone</label>
                                            <input type="text" class="form-control" id="billing-phone" placeholder="Masukkan No Telephone">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="billing-address" class="form-label">Alamat Lengkap</label>
                                            <textarea class="form-control" id="billing-address" rows="2" placeholder="Masukkan Alamat Lengkap"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h4 class="fw-bold text-primary mb-4"><i class="fas fa-money-check-alt me-2"></i> Pembayaran</h4>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-check-label w-100">
                                            <input type="radio" name="payment-method" class="form-check-input" checked>
                                            <div class="card border shadow-sm p-3 text-center">
                                                <i class="fas fa-credit-card fa-2x text-primary"></i>
                                                <h6 class="mt-2">Credit/Debit Card</h6>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-check-label w-100">
                                            <input type="radio" name="payment-method" class="form-check-input">
                                            <div class="card border shadow-sm p-3 text-center">
                                                <i class="fab fa-paypal fa-2x text-primary"></i>
                                                <h6 class="mt-2">PayPal</h6>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-check-label w-100">
                                            <input type="radio" name="payment-method" class="form-check-input">
                                            <div class="card border shadow-sm p-3 text-center">
                                                <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                                                <h6 class="mt-2">Cash on Delivery</h6>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Summary -->
                    <div class="col-xl-4">
                        <div class="card checkout-order-summary shadow-sm border-0">
                            <div class="card-body">
                                <h4 class="fw-bold text-primary mb-4"><i class="fas fa-receipt me-2"></i> Rincian Pembayaran</h4>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><?= esc($wisata['nama_wisata']) ?></td>
                                            <td class="text-end">Rp <?= number_format($wisata['harga'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Subtotal</td>
                                            <td class="text-end fw-bold">Rp <?= number_format($wisata['harga'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="text-end">Rp <?= number_format($shipping, 0, ',', '.') ?></td>
                                        </tr>
                                        <tr class="border-top">
                                            <td class="fw-bold">Total</td>
                                            <td class="text-end fw-bold">
                                                Rp <?= number_format($wisata['harga'] + $shipping, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary w-100 mt-4">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('partials/footer') ?>
    </div>
</div>
<?= $this->include('partials/right-sidebar') ?>
<?= $this->include('partials/vendor-scripts') ?>
<script src="/assets/js/app.js"></script>
</body>
</html>
