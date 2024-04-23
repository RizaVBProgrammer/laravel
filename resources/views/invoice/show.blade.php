@extends('layouts.app', ['pageSlug' => 'invoice'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Invoice</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">INVOICE</h2>
                    <form action="{{ route('invoice.update',$invoice->id) }}" method="post" enctype="multipart/form-data" id="invoiceForm">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Invoice No</label>
                                    <input type="text" name="no_invoice" readonly value="{{ $invoice->no_invoice }}" readonly class="form-control" id="no_invoice">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No PO</label>
                                    <input type="text" name="no_po" readonly class="form-control" value="{{ $invoice->no_po }}" id=""
                                        placeholder="Masukkan No. PO">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="tanggal" readonly class="form-control" value="{{ $invoice->tanggal }}" id=""
                                        placeholder="Masukkan Tanggal">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Term</label>
                                    <input type="text" name="term" readonly class="form-control" value="{{ $invoice->term }}" id=""
                                        placeholder="Masukkan Term">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Invoice To</label>
                                    <input type="text" name="nama_perusahaan" readonly class="form-control" value="{{ $invoice->nama_perusahaan }}" placeholder="Masukkan Nama Customer">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="alamat" readonly class="form-control" value="{{ $invoice->alamat }}" placeholder="Masukkan Alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" readonly class="form-control" value="{{ $invoice->no_telp }}" placeholder="Masukkan No. Telp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Description & Part Number
                                                Uraian Dan Barang</th>
                                            <th>QTY
                                                Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Unit Price
                                                Harga Satuan</th>
                                            <th>Quantity Price
                                                Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="text" name="produk" readonly class="form-control" placeholder="Masukkan Nama Barang" value="{{ $invoice->produk }}"><br>
                                                <input type="text" name="nama_kapal" readonly class="form-control" placeholder="Masukkan Nama Kapal/site" value="{{ $invoice->nama_kapal }}"><br>
                                                <input type="text" name="wilayah_pengisian" readonly class="form-control" placeholder="Masukkan Lokasi Pengisian" value="{{ $invoice->wilayah_pengisian }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="qty" readonly class="form-control" placeholder="Masukkan Jumlah Barang" value="{{ $invoice->qty }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="satuan" readonly class="form-control" placeholder="Masukkan Satuan Barang" value="{{ $invoice->satuan }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="harga_dasar" readonly class="form-control" placeholder="Masukkan Harga Satuan" id="harga_dasar" value="{{ $invoice->harga_dasar }}"><br>
                                                <input type="text" name="ppn" readonly class="form-control" placeholder="PPN" id="ppn" value="{{ $invoice->ppn }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="harga" readonly class="form-control" placeholder="Harga Total" id="harga_total" value="{{ $invoice->harga_total }}"><br>
                                                <input type="text" name="jumlah_ppn" readonly class="form-control" placeholder="PPN Total" id="jumlah_ppn" value="{{ $invoice->jumlah_ppn }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="jumlah_harga_dasar" readonly class="form-control" placeholder="Jumlah Harga Dasar" id="jumlah_harga_dasar" value="{{ $invoice->jumlah_harga_dasar }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="total" readonly class="form-control" placeholder="Total" id="total" value="{{ $invoice->total }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Terbilang</td>
                                            <td colspan="5">
                                                <input type="text" readonly id="terbilang" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var sisa = number_string.length % 3;
            var rupiah = number_string.substr(0, sisa);
            var ribuan = number_string.substr(sisa).match(/\d{3}/g);
            
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            return rupiah + ',00';
        }

        function terbilang(angka) {
            // Convert angka to string if it's not already
            angka = Math.floor(angka);
            console.log(angka);

            // Remove non-numeric characters and parse as float
            var bilangan = angka;
            var kalimat = '';
            var angkaHuruf = [
                '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'
            ];
            var angkaBelasan = [
                '', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
            ];
            var angkaRibuan = [
                '', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion'
            ];

            if (bilangan === 0) {
                return 'Zero Rupiah';
            }

            var chunks = [];
            while (bilangan > 0) {
                chunks.push(bilangan % 1000);
                bilangan = Math.floor(bilangan / 1000);
            }

            for (var i = chunks.length - 1; i >= 0; i--) {
                if (chunks[i] === 0) continue;
                var chunkText = '';
                var chunk = chunks[i];

                var ratusan = Math.floor(chunk / 100);
                var sisa = chunk % 100;

                if (ratusan > 0) {
                    chunkText += angkaHuruf[ratusan] + ' Hundred ';
                }

                if (sisa < 10) {
                    chunkText += angkaHuruf[sisa];
                } else if (sisa < 20) {
                    chunkText += angkaBelasan[sisa - 10];
                } else {
                    var puluhan = Math.floor(sisa / 10);
                    var satuan = sisa % 10;
                    chunkText += angkaBelasan[puluhan] + ' ' + angkaHuruf[satuan];
                }

                kalimat += chunkText + ' ' + angkaRibuan[i] + ' ';
            }

            return kalimat.trim() + ' Rupiah';
        }

        // Fungsi untuk menghitung harga total dan PPN berdasarkan harga dasar dan qty
        function hitungHarga() {
            var hargaDasar = parseFloat(document.getElementById('harga_dasar').value);
            var qty = parseFloat(document.getElementsByName('qty')[0].value);
            var ppn = hargaDasar * 0.11;
            var hargaTotal = hargaDasar * qty;
            var jumlahPpn = ppn * qty;
            var jumlahHargaDasar = hargaTotal;
            var total = hargaTotal + jumlahPpn;

            // Mengisi nilai ke input yang readonly
            document.getElementById('ppn').value = formatRupiah(ppn);
            document.getElementById('harga_total').value = formatRupiah(hargaTotal);
            document.getElementById('jumlah_ppn').value = formatRupiah(jumlahPpn);
            document.getElementById('jumlah_harga_dasar').value = formatRupiah(jumlahHargaDasar);
            document.getElementById('total').value = formatRupiah(total);

            document.getElementById('terbilang').value = terbilang(total);
        }
        hitungHarga();

        // Panggil fungsi hitungHarga saat input qty atau harga dasar berubah
        document.getElementsByName('qty')[0].addEventListener('input', hitungHarga);
        document.getElementById('harga_dasar').addEventListener('input', hitungHarga);
    </script>
@endsection
