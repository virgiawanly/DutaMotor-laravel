<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

    </style>

</head>

<body>

    <table width="100%" style="margin-bottom: 25px">
        <tr>
            <td width="115px">
                <img src="{{ public_path('/img/company-logo.svg') }}" alt="" width="100" />
            </td>
            <td valign="top">
                <h3 style="margin: 0; margin-bottom: 8px">PT Duta Motor Indonesia</h3>
                <div>Jl. Harapan Bunda No. 12 Bandung</div>
                <div>www.dutamotor.com</div>
                <div>Telp (0263) 261265</div>
            </td>
            <td valign="top" align="right">
                <div><b>Tgl {{date('d-M-Y', strtotime($transaksi->cash_tgl))}}</b></div>
                <div><b>No. {{$transaksi->kode_cash}}</b></div>
            </td>
        </tr>

    </table>

    <table>
        <tr>
            <td><b>Terima dari</b></td>
            <td>:</td>
            <td colspan="3"><u>{{strtoupper($transaksi->pembeli->nama)}}</u></td>
        </tr>
        <tr>
            <td><b>Jumlah Uang</b></td>
            <td>:</td>
            <td colspan="3"><u>Rp {{number_format($transaksi->cash_bayar)}}</u></td>
        </tr>
        <tr>
            <td><b>Untuk Pembayaran</b></td>
            <td>:</td>
            <td colspan="3">Mobil {{$transaksi->mobil->merek}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Model</td>
            <td>:</td>
            <td><u>{{$transaksi->mobil->model}}</u></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tipe / Jenis</td>
            <td>:</td>
            <td><u>{{$transaksi->mobil->tipe}}</u></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tahun</td>
            <td>:</td>
            <td><u>{{$transaksi->mobil->tahun}}</u></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Warna</td>
            <td>:</td>
            <td><u>{{strtoupper($transaksi->mobil->warna)}}</u></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Atas Nama STNK</td>
            <td>:</td>
            <td><u>{{strtoupper($transaksi->pembeli->nama)}}</u></td>
        </tr>
        <tr valign="top">
            <td></td>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td><u>{{strtoupper($transaksi->pembeli->alamat)}}</u></td>
        </tr>
        <tr valign="top">
            <td><b>Keterangan</b></td>
            <td>:</td>
            <td colspan="3">Pembayaran {{$transaksi->pembeli->nama}}</td>
        </tr>
    </table>

    <br>

    <table border="1" style="border-collapse: collapse; min-width: 25%;">
        <tr>
            <td style="padding: 5px; background-color: #EBD4D7"><b>Rp {{number_format($transaksi->cash_bayar)}}</b></td>
        </tr>
    </table>

    <br>

    <table style="font-size: 0.6em">
        <tr>
            <td>{{date('d/m/Y h:i:s')}}</td>
        </tr>
        <tr>
            <td>DUTAMOTOR</td>
        </tr>
    </table>

</body>

</html>
