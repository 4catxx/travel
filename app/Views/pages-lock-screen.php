<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="/" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Locked</h5>
                                <p class="text-white-50">Hello Smith, enter your password to unlock the screen!</p>
                                <a href="/" class="logo logo-admin">
                                    <img src="assets/images/logo-sm.png" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="/">

                                    <div class="pt-3 text-center">
                                        <img src="assets/images/users/user-6.jpg" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                        <h6 class="font-size-16 mt-3">Robert Smith</h6>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Not you ? return <a href="pages-login" class="fw-medium text-primary"> Sign In </a> </p>
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                            </script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a></p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="assets/js/app.js"></script>

</body>

</html>