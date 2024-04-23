@extends('layouts.app', ['pageSlug' => 'pengeluaran-bbm'])

@section('content')
@include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('pengeluaran-bbm.index') }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">PENGELUARAN BBM</h2>
                    <form action="{{ route('pengeluaran-bbm.store') }}" method="post" enctype="multipart/form-data" id="PengeluaranBBMForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan"  class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id=""
                                        placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="no_invoice" class="form-label">No Invoice</label>
                                    <input type="text" name="no_invoice" class="form-control" id=""
                                        placeholder="Masukkan Nomor Invoice">
                                </div>
                                <div class="mb-3">
                                    <label for="produk" class="form-label">Produk</label>
                                    <input type="text" name="produk" class="form-control" id=""
                                        placeholder="Masukkan Nama Produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="wilayah_pengisian" class="form-label">Wilayah Pengisian</label>
                                    <input type="text" name="wilayah_pengisian" class="form-control" placeholder="Masukkan Wilayah Pengisian">
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="text" name="qty" class="form-control" placeholder="Masukkan QTY">
                                </div>
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Masukkan Satuan">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga">
                                </div>
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="number" name="total" class="form-control" placeholder="Masukkan Total">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/number-to-words"></script>

    
@endsection
