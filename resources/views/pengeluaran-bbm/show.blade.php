@extends('layouts.app', ['pageSlug' => 'surat-jalan'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Lihat Data Pengeluaran BBM</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('surat-jalan.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">PENGELUARAN BBM</h2>
                    <form action="{{ route('pengeluaran-bbm.update', $pengeluaranBbm->id ?? '') }}" method="post" enctype="multipart/form-data" id="pengeluaranBbmForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kepada" class="form-label">Nama Perusahaan</label>
                                    <input type="text" name="kepada" readonly class="form-control" value="{{ $pengeluaranBbm->nama_perusahaan ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="up" class="form-label">Tanggal</label>
                                    <input type="date" name="up" readonly class="form-control" value="{{ $pengeluaranBbm->tanggal ?? '' }}">
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">No Invoice</label>
                                    <input type="text" name="tanggal" readonly class="form-control" value="{{ $pengeluaranBbm->no_invoice ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_surat" class="form-label">wilayah Pengisian</label>
                                    <input type="text" name="no_surat" readonly class="form-control" value="{{ $pengeluaranBbm->wilayah_pengisian ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_po" class="form-label">QTY</label>
                                    <input type="text" name="no_po" readonly class="form-control" value="{{ $pengeluaranBbm->qty ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Satuan</label>
                                    <input type="text" name="tujuan" readonly class="form-control" value="{{ $pengeluaranBbm->satuan ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Harga</label>
                                    <input type="text" name="contact" readonly class="form-control" value="{{ $pengeluaranBbm->harga ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">Total</label>
                                    <input type="text" name="no_telp" readonly class="form-control" value="{{ $pengeluaranBbm->total ?? '' }}">
                                </div>
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
@endsection
