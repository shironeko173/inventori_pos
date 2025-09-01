<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    {{-- <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"> --}}
</head>
<body>
    <table>
        <tr>
            <th colspan="6" align="center"><b><h3 class="text-center">Laporan Pendapatan</h3></b></th>
        </tr>
        <tr>
            <th  colspan="6" align="center">
                <b> <h4 class="text-center">
                    Tanggal {{ tanggal_indonesia($awal, false) }}
                    s/d
                    Tanggal {{ tanggal_indonesia($akhir, false) }}
                </h4></b>
            </th>
        </tr>
    </table>
   
   

    <table class="table table-striped">
        <thead> 
            <tr>
                <th align="center">Tanggal</th>
                <th align="center">Penjualan</th>
                <th align="center">Pembelian</th>
                <th align="center">Refund Produk</th>
                <th align="center">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>