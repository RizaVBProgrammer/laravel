<!DOCTYPE html>
<html>
<head>
    <title>Rekap Biaya Operasional</title>
    <style>
        /* Sesuaikan gaya CSS sesuai kebutuhan */
    </style>
</head>
<body>
    <h1>Rekap Biaya Operasional</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
