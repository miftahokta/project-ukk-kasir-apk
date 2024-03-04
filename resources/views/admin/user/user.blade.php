@extends('layout_admin.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-4">

                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data User</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-truncate">User</th>
                                            <th class="text-truncate">Email</th>
                                            <th class="text-truncate">Role</th>
                                            <th class="text-truncate">Status</th>
                                            <th class="text-truncate">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-3">
                                                            <img src="{{ asset('assets/template') }}/assets/img/avatars/7.png"
                                                                alt="Avatar" class="rounded-circle" />
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-truncate">{{ $u->nama_lengkap }}</h6>
                                                            <small
                                                                class="text-truncate"><span></span>{{ $u->username }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-truncate">{{ $u->email }}</td>
                                                <td class="text-truncate">
                                                    <i class="mdi mdi-laptop mdi-24px text-danger me-1"></i>
                                                    {{ $u->role }}
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill bg-label-primary me-1">Active</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle    hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="users/hapus/{{ $u->id }}"><i
                                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Data Tables -->
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
