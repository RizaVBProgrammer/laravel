<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Purchase Order</title>
</head>

<body>
    <h1>Laporan Purchase Order</h1>
    <table border="1">
        <thead class=" text-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">No PO</th>
                <th scope="col">Tanggal</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Term</th>
                <th scope="col">Produk</th>
                <th scope="col">Nama Kapal/Site</th>
                <th scope="col">Wilayah Pengisian</th>

                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $item->nama_perusahaan }}
                    </td>
                    <td>
                        {{ $item->alamat }}
                    </td>
                    <td>
                        {{ $item->no_telp }}
                    </td>
                    <td>
                        {{ $item->no_po }}
                    </td>
                    <td>
                        {{ $item->tanggal }}
                    </td>
                    <td>
                        {{ $item->no_invoice }}
                    </td>
                    <td>
                        {{ $item->term }}
                    </td>
                    <td>
                        {{ $item->produk }}
                    </td>
                    <td>
                        {{ $item->nama_kapal }}
                    </td>
                    <td>
                        {{ $item->wilayah_pengisian }}
                    </td>

                    <td>
                        {{ number_format($item->total, 2, ',', '.') }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
