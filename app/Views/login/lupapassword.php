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

                            <h4 class="font-size-18 mt-5 text-center">Reset Password</h4>

                            <form class="mt-4" action="#">

                                <div class="alert alert-success mt-4" role="alert">
                                    Masukkan email akun anda, akan kami kirimkan instruksi lewat email anda!
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Masukkan Email">
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                            <div class="mt-5 pt-4 text-center">
                                <p>Sudah ingat? <a href="login" class="fw-medium text-primary">Login</a></p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Klas-A Tour and Travel <i class="fas fa-plane text-primary" style="transform: rotate(-45deg);"></i></p>
                            </div>
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