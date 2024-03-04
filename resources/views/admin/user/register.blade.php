<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/template') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Aplikasi Kasir</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/template') }}/assets/img/icons/brands/mailchimp.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/fonts/materialdesignicons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('assets/template') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ asset('assets/template') }}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/template') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Register Card -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="" class="app-brand-link">
                            <img
                            src="{{asset('assets/template')}}/assets/img/icons/brands/mailchimp.png"
                            alt="mailchimp"
                            class="me-3"
                            height="36" />
                        <span class="app-brand-text demo text-heading fw-semibold">TOKO OLAHRAGA</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-2">
                        {{-- <h4 class="mb-2">Adventure starts here 🚀</h4> --}}
                        <p class="mb-4">Buat akun dengan benar!</p>
                        @if (session('message'))
                            <div class="alert alert-success">
                                <b>Register Berhasil.</b>{{ session('message') }}
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('actionregister') }}" method="post">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukan Nama Lengkap" value="{{ old('nama_lengkap') }}" autofocus />
                                <label for="nama_lengkap">Nama Lengkap</label>
                            </div>
                            @error('nama_lengkap')
                                <div class="alert alert-warning">
                                    <small>Nama Lengkap Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan Username" value="{{ old('username') }}" />
                                <label for="username">Username</label>
                            </div>
                            @error('username')
                                <div class="alert alert-warning">
                                    <small>Username Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" value="{{ old('email') }}" />
                                <label for="email">Email</label>
                            </div>
                            @error('email')
                                <div class="alert alert-warning">
                                    <small>Email Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="mb-3 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <!-- <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span> -->
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-warning">
                                    <small>Password Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <select class="form-select" name="role">
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                                <label for="role">Role</label>
                            </div>
                            @error('role')
                                <div class="alert alert-warning">
                                    <small>Role Harus Diisi</small>
                                </div>
                            @enderror

                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn rounded-pill btn-primary d-grid w-100">Register</button>
                        </form>

                        <p class="text-center">
                            <a href="{{ route('dashboardadmin') }}">
                                <span>Kembali</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
                {{-- <img src="{{ asset('assets/template') }}/assets/img/illustrations/tree-3.png" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block" />
                <img src="{{ asset('assets/template') }}/assets/img/illustrations/auth-basic-mask-light.png" class="authentication-image d-none d-lg-block" alt="triangle-bg" data-app-light-img="illustrations/auth-basic-mask-light.png" data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
                <img src="{{ asset('assets/template') }}/assets/img/illustrations/tree.png" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block" /> --}}
            </div>
        </div>
    </div>

    <!-- / Content -->

    {{-- <div class="buy-now">
        <a href="https://themeselection.com/item/materio-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div> --}}

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/template') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/template') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/template') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/template') }}/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('assets/template') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/template') }}/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/template') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
