{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice V1</title>

    <style>
        .container {
            margin: 0;
            padding: 0;
        }

        .head {
            text-align: center;
        }

        .footer {
            text-align: center;
        }
    </style>
</head>

<body>

    <section id="invoice">
        <div class="container">
            <div class="head">
                <h2>Minishop</h2>
                <p class="m-0">Jl. New Garden No. 25 Sumedang</p>
            </div>
            <hr>
            <hr>

            <table>
                <tr>
                    <th width="100"></th>
                    <th></th>
                </tr>
                <tr>
                    <td>Id Penjualan</td>
                    <td>: {{ $penjualan->id }}</td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td>: {{ $penjualan->nama_kasir }}</td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td>: {{ $penjualan->nama_pelanggan }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $penjualan->tanggal_penjualan }}</td>
                </tr>
            </table>
            <hr>

            <table width="auto">
                <thead>
                    <tr>
                        <th align="center" width="50">No</th>
                        <th align="center" width="250">Nama Produk</th>
                        <th align="center" width="70">Qty</th>
                        <th align="center" width="150">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailpenjualan as $dp)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td class="text-truncate">{{ $dp->nama_produk }}</td>
                            <td align="center">{{ $dp->jumlah_produk }}</td>
                            <td class="text-truncate">{{ format_rupiah($dp->subtotal) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>

            <table>
                <tr>
                    <th width="230"></th>
                    <th width="103"></th>
                    <th width="37"></th>
                    <th width="150"></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Belanja</td>
                    <td>:</td>
                    <td>{{ format_rupiah($penjualan->total_harga) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pembayaran</td>
                    <td>:</td>
                    <td>{{ format_rupiah($penjualan->bayar) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kembalian</td>
                    <td>:</td>
                    <td>{{ format_rupiah($penjualan->kembali) }}</td>
                </tr>
            </table>
            <hr>

            <div class="footer">
                <p>Terimakasih Sudah Belanja Disini</p>
            </div>

        </div>
    </section>

</body>

</html> --}}

<html>

<head>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            /* border: 1px solid #ccc; */
            padding: 10px;
            max-width: 800px;
            margin: 0 auto;
        }

        .invoice h2 {
            text-align: center;
        }

        .garis {
            border-top: 0;
            border-style: dashed;
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice th,
        .invoice td {
            /* border: 1px solid #ccc; */
            padding: 5px;
            text-align: left;
        }

        .invoice th {
            /* background-color: #f2f2f2; */
        }

        .total {
            /* border-top: 2px solid #ccc; */
            font-weight: bold;
        }

        .footer {
            /* border-top: 1px solid #ccc; */
            padding-top: 10px;
            text-align: center;
            margin-top: 10px;
            font-size: 10px;
            color: #666;
        }

        .kosong{
            opacity: 0;
        }
    </style>

</head>

<body>
    <div class="invoice">
        <h2>TOKO OLAHRAGA</h2>
        <p class="garis"></p>
        <table>
            <tr>
                <td>Id Penjualan</td>
                <td>: {{ $penjualan->id }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>: {{ $penjualan->nama_kasir }}</td>
            </tr>
            <tr>
                <td>Member</td>
                <td>: {{ $penjualan->nama_member }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $penjualan->tanggal_penjualan }}</td>
            </tr>
        </table>
        <p class="garis"></p>
        <table>
            <thead>
                <tr>
                    <th align="center">No</th>
                    <th align="center">Nama Produk</th>
                    <th align="center">Jumlah</th>
                    <th align="center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailpenjualan as $dp)
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td class="text-truncate">{{ $dp->nama_produk }}</td>
                        <td align="center">{{ $dp->jumlah_produk }}</td>
                        <td class="text-truncate">{{ rp($dp->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="garis"></p>
        <table>
            <thead>
                <tr class="total">
                    <th colspan="2"></th>
                    <th colspan="2">Total</th>
                    <th>: {{ rp($penjualan->total_harga) }}</th>
                </tr>
                <tr class="total">
                    <th colspan="2"></th>
                    <th colspan="2">Bayar</th>
                    <th>: {{ rp($penjualan->bayar) }}</th>
                </tr>
                <tr class="total">
                    <th colspan="2" class="kosong">23517/02/2024</th>
                    <th colspan="2">Kembali</th>
                    <th>: {{ rp($penjualan->kembali) }}</th>
                </tr>
            </thead>
        </table>
        <div class="footer"> Selamat Poin Member Anda Bertambah 48<br> Kritik&Saran: 1500959, SMS : 0817111234 </div>
    </div>
</body>

</html>
