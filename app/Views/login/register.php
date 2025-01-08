<!-- File: app/Views/login/register.php -->

<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
    
    <style>
    .password-requirements li {
        margin-bottom: 0.25rem;
    }

    .password-requirements i {
        margin-right: 0.5rem;
    }

    button[type="submit"]:disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }

    .input-group-text {
        cursor: pointer;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #6366f1;
    }
    </style>
</head>

<body class="account-pages">
    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?= base_url('assets/images/bg.jpg') ?>'); background-size: cover; background-position: center;"></div>
    <div class="wrapper-page account-page-full">
        <div class="card shadow-none">
            <div class="card-block">
                <div class="account-box">
                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                                <a href="<?= base_url() ?>" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="<?= base_url('assets/images/Logo Klas-A.png') ?>" alt="logo" height="150">
                                    </span>
                                </a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Daftar Sekarang</h4>
                            <p class="text-muted text-center">Permudah perjalanan anda bersama kami!</p>

                            <!-- Validation Errors -->
                            <?php if (session()->has('validation')) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->get('validation')->listErrors() ?>
                                </div>
                            <?php endif; ?>

                            <!-- Success Message -->
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <!-- Form with CSRF protection -->
                            <form class="mt-4" action="<?= base_url('post-register') ?>" method="post">
                                <?= csrf_field() ?>
                                
                                <!-- Nama Lengkap field -->
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control <?= (session()->has('validation.nama')) ? 'is-invalid' : '' ?>" 
                                        id="nama" name="nama" value="<?= old('nama') ?>" 
                                        placeholder="Masukkan Nama Lengkap" required>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('validation.nama') ?>
                                    </div>
                                </div>

                                <!-- Email field -->
                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" class="form-control <?= (session()->has('validation.useremail')) ? 'is-invalid' : '' ?>" 
                                        id="useremail" name="useremail" value="<?= old('useremail') ?>" 
                                        placeholder="Enter email" required>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('validation.useremail') ?>
                                    </div>
                                </div>

                                <!-- Username field -->
                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control <?= (session()->has('validation.username')) ? 'is-invalid' : '' ?>" 
                                        id="username" name="username" value="<?= old('username') ?>" 
                                        placeholder="Enter username" required>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('validation.username') ?>
                                    </div>
                                </div>

                               <!-- Password field -->
                                <div class="mb-3">
                                    <label class="small text-muted mb-1" for="userpassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control <?= (session()->has('validation.userpassword')) ? 'is-invalid' : '' ?>" 
                                            id="userpassword" name="userpassword" 
                                            placeholder="Enter password" required>
                                        <span class="input-group-text" onclick="togglePassword('userpassword')">
                                            <i class="fas fa-eye" id="userpassword-toggle"></i>
                                        </span>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('validation.userpassword') ?>
                                    </div>
                                    
                                    <!-- Password Requirements List - Hidden by default -->
                                    <div class="password-requirements mt-2" style="display: none;">
                                        <small class="text-muted">Password harus memenuhi:</small>
                                        <ul class="list-unstyled mt-1 small">
                                            <li id="length-check"><i class="fas fa-times-circle text-danger"></i> Minimal 8 karakter</li>
                                            <li id="lowercase-check"><i class="fas fa-times-circle text-danger"></i> Mengandung huruf kecil</li>
                                            <li id="uppercase-check"><i class="fas fa-times-circle text-danger"></i> Mengandung huruf besar</li>
                                            <li id="number-check"><i class="fas fa-times-circle text-danger"></i> Mengandung angka</li>
                                            <li id="match-check"><i class="fas fa-times-circle text-danger"></i> Password cocok</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Confirm Password field -->
                                <div class="mb-3">
                                    <label class="small text-muted mb-1" for="confirm_password">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control <?= (session()->has('validation.confirm_password')) ? 'is-invalid' : '' ?>" 
                                            id="confirm_password" name="confirm_password" 
                                            placeholder="Confirm password" required>
                                        <span class="input-group-text" onclick="togglePassword('confirm_password')">
                                            <i class="fas fa-eye" id="confirm_password-toggle"></i>
                                        </span>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('validation.confirm_password') ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2"><i class="mdi mdi-lock"></i> Lupa Password</a>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>

                                <!-- Terms Agreement -->
                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <p>Dengan Mendaftar Anda setuju dengan kebijakan <a href="#" class="text-primary">Persetujuan Penggunaan</a></p>
                                    </div>
                                </div>
                            </form>

                            <!-- Login Link -->
                            <div class="mt-5 pt-4 text-center">
                                <p>Sudah Memiliki Akun? <a href="<?= base_url('login') ?>" class="fw-medium text-primary">Login</a></p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Klas-A Tour and Travel <i class="fas fa-plane text-primary" style="transform: rotate(-45deg);"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('userpassword');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const registerButton = document.querySelector('button[type="submit"]');
        const requirementsList = document.querySelector('.password-requirements');
        
        // Tampilkan requirements saat password atau confirm password field focus
        passwordInput.addEventListener('focus', function() {
            requirementsList.style.display = 'block';
        });

        confirmPasswordInput.addEventListener('focus', function() {
            requirementsList.style.display = 'block';
        });

        // Sembunyikan requirements hanya jika klik di luar kedua password fields dan requirement list
        document.addEventListener('click', function(e) {
            const isClickInside = passwordInput.contains(e.target) || 
                                confirmPasswordInput.contains(e.target) || 
                                requirementsList.contains(e.target) ||
                                e.target.closest('.input-group-text'); // Untuk icon eye
            
            if (!isClickInside) {
                requirementsList.style.display = 'none';
            }
        });

        // Tambahkan event listener untuk mencegah sembunyikan saat focus masih di field
        passwordInput.addEventListener('click', function(e) {
            e.stopPropagation();
            requirementsList.style.display = 'block';
        });

        confirmPasswordInput.addEventListener('click', function(e) {
            e.stopPropagation();
            requirementsList.style.display = 'block';
        });
        
        function checkPassword(password, confirmPassword) {
            const requirements = {
                length: password.length >= 8,
                lowercase: /[a-z]/.test(password),
                uppercase: /[A-Z]/.test(password),
                number: /[0-9]/.test(password),
                match: password === confirmPassword && password !== ''
            };
            
            document.getElementById('length-check').innerHTML = `
                <i class="fas fa-${requirements.length ? 'check-circle text-success' : 'times-circle text-danger'}"></i> 
                Minimal 8 karakter
            `;
            document.getElementById('lowercase-check').innerHTML = `
                <i class="fas fa-${requirements.lowercase ? 'check-circle text-success' : 'times-circle text-danger'}"></i> 
                Mengandung huruf kecil
            `;
            document.getElementById('uppercase-check').innerHTML = `
                <i class="fas fa-${requirements.uppercase ? 'check-circle text-success' : 'times-circle text-danger'}"></i> 
                Mengandung huruf besar
            `;
            document.getElementById('number-check').innerHTML = `
                <i class="fas fa-${requirements.number ? 'check-circle text-success' : 'times-circle text-danger'}"></i> 
                Mengandung angka
            `;
            document.getElementById('match-check').innerHTML = `
                <i class="fas fa-${requirements.match ? 'check-circle text-success' : 'times-circle text-danger'}"></i> 
                Password cocok
            `;
            
            return Object.values(requirements).every(req => req === true);
        }
        
        function validatePasswords() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const isValid = checkPassword(password, confirmPassword);
            registerButton.disabled = !isValid;
        }
        
        passwordInput.addEventListener('input', validatePasswords);
        confirmPasswordInput.addEventListener('input', validatePasswords);
    });

    // Toggle password visibility
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId + '-toggle');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>
</body>
</html>