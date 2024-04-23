<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya CSS untuk tampilan invoice */
        .container {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/logo.png') }}" width="250" alt=""><br>
                <p>Telp : (0542) 2323323, Email: general</p>
            </div>
            <div class="col" style="text-align: right">
                GENERAL SUPLIER<br>
                FUEL TRADING<br>
                TRANSPORTIR BBM<br>
                Web: https://alishagroup.com
            </div>
        </div>
        <hr><hr>
        <div class="header">
            <h2>INVOICE</h2>
        </div>
        <div class="row">
            <div class="col">
                <table border="0" style="width:80%">
                    <tr>
                        <td style="width:50%">Invoice No</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                    <tr>
                        <td>No PO</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                    <tr>
                        <td>Term</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table border="0" style="width:80%">
                    <tr>
                        <td style="width:50%">Invoice To</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>:</td>
                        <td>ASDS</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">JENIS BARANG</th>
                        <th scope="col">NAMA TRANSPORTIR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>5,000</td>
                        <td>BIO SOLAR</td>
                        <td>PT. ALISHA KARUNIA PERDANA</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            Dikirim Oleh: Nama: YOYOK
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
