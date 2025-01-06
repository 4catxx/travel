<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body class="account-pages">
    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card shadow-none">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                            <a href="/" class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-dark.png" alt="" height="17">
                                        </span>
                                    </a>
                    
                                    <a href="/" class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-light.png" alt="" height="18">
                                        </span>
                                    </a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Selamat Datang !</h4>
                            <p class="text-muted text-center">Silahkan login untuk melanjutkan</p>

                            <form class="mt-4" action="<?= base_url('login') ?>" method="POST">
                            <?= csrf_field() ?>
                            
                            <?php if(session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?= old('username') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Enter password">
                            </div>

                            <div class="mb-3">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2"><i class="mdi mdi-lock"></i> Lupa Password</a>
                                    </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customControlInline" name="remember">
                                        <label class="form-check-label" for="customControlInline">Ingat Saya!</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Tidak punya akun ? <a href="register" class="fw-medium text-primary"> Daftar Sekarang </a> </p>
                                <p>© <script>
                                        document.write(new Date().getFullYear())
                                <p>© <script>document.write(new Date().getFullYear())</script> Klas-A Tour and Travel <i class="fas fa-plane text-primary" style="transform: rotate(-45deg);"></i></p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <?= $this->include('partials/vendor-scripts') ?>


    <script src="assets/js/app.js"></script>

</body>

</html>