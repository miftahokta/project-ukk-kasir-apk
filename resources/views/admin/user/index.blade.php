@extends('layout_admin.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-center ">
                            <a href="" class="app-brand-link">
                                <img
                                src="{{asset('assets/template')}}/assets/img/icons/brands/mailchimp.png"
                                alt="mailchimp"
                                class="me-3"
                                height="36" />
                            </a>                    
                            <h5 class="card-title m-0 me-2"><b>TOKO OLAHRAGA</h5>
                            {{-- <div class="dropdown">
                                <button class="btn p-0" type="button" id="transactionID"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <div class="row g-3 justify-content-center">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-primary rounded shadow">
                                            <i class="mdi mdi-trending-up mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Penjualan</div>
                                        <h5 class="mb-0">{{($produkterjual)}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-success rounded shadow">
                                            <i class="mdi mdi-account-group mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Member</div>
                                        <h5 class="mb-0">{{($member)}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-warning rounded shadow">
                                            <i class="mdi mdi-shopping mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Produk</div>
                                        <h5 class="mb-0">{{($produk)}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-currency-usd mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Revenue</div>
                                        <h5 class="mb-0">$88k</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row gy-4">

            <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Member</h5>
                                {{-- <div class="text-muted float-end"><a href="{{ route('tambahmemberadmin') }}"
                                class="btn btn-outline-primary">Tambah</a></div> --}}
                                <div class="text-muted float-end"><a href="/admin/member/print"
                                    class="btn btn-danger">Cetak PDF<i class="menu-icon tf-icons mdi mdi-printer"></i></a></div>
                            </div>
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-truncate" width="10%">Id</th>
                                        <th class="text-truncate" width="25%">Nama</th>
                                        <th class="text-truncate" width="15%">Jenis Kelamin</th>
                                        <th class="text-truncate" width="15%">No Telepon</th>
                                        <th class="text-truncate" width="30%">Alamat</th>
                                        <th class="text-truncate" width="5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member as $m)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0 text-truncate">{{ $m->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">{{ $m->nama_member }}</td>
                                        <td class="text-truncate">{{ $m->jenis_kelamin }}</td>
                                        <td class="text-truncate">{{ $m->no_telp }}</td>
                                        <td class="text-truncate">{{ $m->alamat }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle    hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin/member/edit/{{$m->id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="member/hapus/{{$m->id}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            {{-- {{ $member->links() }} --}}
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
                        , made with <span class="text-danger"><i
                                class="tf-icons mdi mdi-heart"></i></span> by
                        <a href="https://themeselection.com" target="_blank"
                            class="footer-link fw-medium">ThemeSelection</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="https://themeselection.com/license/" class="footer-link me-3"
                            target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank"
                            class="footer-link me-3">More Themes</a>

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