@extends('layout_petugas.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-center ">
                            <a href="" class="app-brand-link">
                                <img src="{{ asset('assets/template') }}/assets/img/icons/brands/mailchimp.png"
                                    alt="mailchimp" class="me-3" height="36" />
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
            <div class="row">
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Pembelian</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Cari Id</label>
                                <div class="col-sm-9">
                                    <form method="get">
                                        <div class="d-flex">
                                            <input type="text" class="form-control" name="id_produk"
                                                id="basic-default-company" value="" />
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="mdi mdi-magnify mdi-24px lh-0"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Id Produk</label>
                                <div class="col-sm-9">
                                    <form method="get">
                                        <div class="d-flex">
                                            <select class="form-select" name="id_produk">
                                                <option selected>
                                                    {{ isset($produkdetail) ? $produkdetail->id : 'Nama Produk' }}
                                                </option>
                                                @foreach ($produk as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->id . ' - ' . $item->nama_produk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-outline-primary">Pilih</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('detailpenjualanpetugas') }}" method="post">
                                @csrf

                                <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                <input type="hidden" name="id_produk"
                                    value="{{ isset($produkdetail) ? $produkdetail->id : '' }} ">
                                <input type="hidden" name="nama_produk"
                                    value="{{ isset($produkdetail) ? $produkdetail->nama_produk : '' }} ">
                                <input type="hidden" name="subtotal" value="{{ $subtotal }} ">

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_produk" class="form-control"
                                            value="{{ isset($produkdetail) ? $produkdetail->nama_produk : '' }} " disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Harga Satuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="harga" class="form-control"
                                            value="{{ isset($produkdetail) ? rp($produkdetail->harga) : '' }} " disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Jumlah</label>
                                    <div class="col-sm-9 d-flex">
                                        <a href="?id_produk={{ request('id_produk') }}&act=min&qty={{ $qty }}"
                                            class="btn btn-outline-primary"><i class="tf-icons mdi mdi-minus"></i></a>
                                        <input type="text" name="jumlah_produk" class="form-control"
                                            id="basic-default-company" value="{{ $qty }} ">
                                        <a href="?id_produk={{ request('id_produk') }}&act=plus&qty={{ $qty }}"
                                            class="btn btn-outline-primary"><i class="tf-icons mdi mdi-plus"></i></a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Subtotal</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="harga" class="form-control"
                                            value="{{ rp($subtotal) }} " disabled>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-outline-primary">Selesai</button>
                                        {{-- <a href="/petugas/penjualan" class="btn btn-outline-primary">Kembali</a> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Merged -->
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Form Produk</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-truncate">No</th>
                                            <th class="text-truncate">Nama Produk</th>
                                            {{-- <th class="text-truncate">Nama Member</th> --}}
                                            <th class="text-truncate">Jumlah</th>
                                            <th class="text-truncate">Subtotal</th>
                                            <th class="text-truncate">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detailpenjualan as $dp)
                                            <tr>
                                                <td class="text-truncate text-center">{{ $loop->iteration }}</td>
                                                <td class="text-truncate">{{ $dp->nama_produk }}</td>
                                                {{-- <td class="text-truncate">{{ $dp->nama_member }}</td> --}}
                                                <td class="text-truncate text-center">{{ $dp->jumlah_produk }}</td>
                                                <td class="text-truncate">{{ rp($dp->subtotal) }}</td>
                                                <td class="text-truncate"><a
                                                        href="/petugas/penjualan/detail/hapus?id={{ $dp->id }}"><i
                                                            class="mdi mdi-close"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Form Member</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Cari Id</label>
                                <div class="col-sm-9">
                                    <form method="get">
                                        <div class="d-flex">
                                            <input type="text" class="form-control" name="id_member"
                                                id="basic-default-company" value="" />
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="mdi mdi-magnify mdi-24px lh-0"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Member</label>
                                <div class="col-sm-9">
                                    <form action="{{route('memberpenjualanpetugas')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                        <input type="hidden" name="id_member"
                                        value="{{ isset($memberdetail) ? $memberdetail->id : '' }}">
                                        <input type="hidden" name="nama_member"
                                        value="{{ isset($memberdetail) ? $memberdetail->nama_member : '' }}">
                                        <div class="d-flex">
                                            <input type="text" name="nama_member" class="form-control"
                                            value="{{ isset($memberdetail) ? $memberdetail->nama_member : '' }} " disabled>
                                            <button type="submit" class="btn btn-outline-primary">Pilih</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="get">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Total
                                        Belanja</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="total_harga" class="form-control"
                                            value="{{ rp($penjualan->total_harga) }} " disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Bayar</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bayar" class="form-control"
                                            value="{{ request('bayar') }} ">
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Hitung</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-company">Kembalian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ rp($kembali) }} " disabled>
                                </div>
                            </div>
                            <form action="{{ route('updatepenjualanpetugas') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                <input type="hidden" name="bayar" value="{{ request('bayar') }}">
                                <input type="hidden" name="kembali" value="{{ $kembali }}">

                                <div class="row justify-content-end">
                                    <div class="col-sm-9 mb-3">
                                        <a href="/petugas/penjualan/create" class="btn btn-outline-primary">Selesai</a>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                        <a href="/petugas/penjualan" class="btn btn-outline-primary">Kembali</a>
                                        <a href="?print=klik" class="btn btn-danger"><i
                                                class="menu-icon tf-icons mdi mdi-printer"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                            <a href="https://themeselection.com/license/" class="footer-link me-3"
                                target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-3">More
                                Themes</a>

                            <a href="https://demos.themeselection.com/materio-bootstrap-html-petugas-template/documentation/"
                                target="_blank" class="footer-link me-3">Documentation</a>

                            <a href="https://github.com/themeselection/materio-bootstrap-html-petugas-template-free/issues"
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
