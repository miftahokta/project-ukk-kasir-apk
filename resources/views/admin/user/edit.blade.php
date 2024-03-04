@extends('layout_admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-4">
                <!-- Form Tambah Produk -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Member</h5>
                            <div class="text-muted float-end"><a href="{{route('memberadmin')}}" class="btn btn-outline-dark">Kembali</a></div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('actionmemberadmin') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_member"
                                        placeholder="Masukkan Nama Member" value="{{$member->nama_member}}"/>
                                    <label for="basic-default-fullname">Nama Member</label>
                                </div>
                                @error('nama_member')
                                <div class="alert alert-warning">
                                    <small>Nama Member Harus Diisi</small>
                                </div>
                                @enderror
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="jenis_kelamin"
                                        placeholder="Masukan Jenis Kelamin" value="{{$member->jenis_kelamin}}"/>
                                    <label for="basic-default-fullname">Jenis Kelamin</label>
                                </div>
                                @error('jenis_kelamin')
                                <div class="alert alert-warning">
                                    <small>Jenis Kelamin Harus Diisi</small>
                                </div>
                                @enderror
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="alamat"
                                        placeholder="Masukkan Alamat Member" value="{{$member->alamat}}"/>
                                    <label for="basic-default-fullname">Alamat</label>
                                </div>
                                @error('alamat')
                                <div class="alert alert-warning">
                                    <small>Alamat Lengkap Harus Diisi</small>
                                </div>
                                @enderror
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="no_telp"
                                        placeholder="Masukkan No Telepon member" value="{{$member->no_telp}}"/>
                                    <label for="basic-default-fullname">No Telepon</label>
                                </div>
                                @error('no_telp')
                                <div class="alert alert-warning">
                                    <small>No Telepon Harus Diisi</small>
                                </div>
                                @enderror
                                <div class="mt-3 mb-3"><img src="" id="output" width="300"></div>
                                <button type="submit" class="btn btn-outline-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Form Tambah Produk -->
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                    <div class="text-body mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by
                        <a href="https://themeselection.com" target="_blank"
                            class="footer-link fw-medium">ThemeSelection</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="https://themeselection.com/license/" class="footer-link me-3" target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-3">More Themes</a>

                        <a href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/documentation/"
                            target="_blank" class="footer-link me-3">Documentation</a>

                        <a href="https://github.com/themeselection/materio-bootstrap-html-admin-template-free/issues"
                            target="_blank" class="footer-link">Support</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
