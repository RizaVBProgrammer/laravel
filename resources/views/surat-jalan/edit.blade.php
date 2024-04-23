@extends('layouts.app', ['pageSlug' => 'surat-jalan'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Edit Surat Jalan</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('surat-jalan.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">SURAT JALAN</h2>
                    <form action="{{ route('surat-jalan.update', $suratJalan->id) }}" method="post" enctype="multipart/form-data" id="suratJalanForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kepada" class="form-label">Kepada</label>
                                    <input type="text" name="kepada" class="form-control" value="{{ $suratJalan->kepada }}">
                                </div>
                                <div class="mb-3">
                                    <label for="up" class="form-label">UP</label>
                                    <input type="text" name="up" class="form-control" value="{{ $suratJalan->up }}">
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $suratJalan->tanggal }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_surat" class="form-label">No Surat Jalan</label>
                                    <input type="text" name="no_surat" class="form-control" value="{{ $suratJalan->no_surat }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_po" class="form-label">No PO</label>
                                    <input type="text" name="no_po" class="form-control" value="{{ $suratJalan->no_po }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan Pengirim</label>
                                    <input type="text" name="tujuan" class="form-control" value="{{ $suratJalan->tujuan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact Person</label>
                                    <input type="text" name="contact" class="form-control" value="{{ $suratJalan->contact }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" value="{{ $suratJalan->no_telp }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">No</th>
                                            <th style="width: 25%">QUANTITY</th>
                                            <th style="width: 25%">JENIS BARANG</th>
                                            <th style="width: 25%">NAMA TRANSPORTIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="number" name="qty" class="form-control" value="{{ $suratJalan->qty }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="jenis" class="form-control" value="{{ $suratJalan->jenis }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="nama_transportir" class="form-control" value="{{ $suratJalan->nama_transportir }}">
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">Segel Atas</th>
                                            <th style="width: 25%">Segel Bawah</th>
                                            <th style="width: 25%">No. Plat Kendaraan</th>
                                            <th style="width: 25%">Dikirim Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="number" name="segel_atas" class="form-control" value="{{ $suratJalan->segel_atas }}">
                                            </td>
                                            <td>
                                                <input type="number" name="segel_bawah" class="form-control" value="{{ $suratJalan->segel_bawah }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="plat" class="form-control" value="{{ $suratJalan->plat }}">
                                            </td>
                                            <td style="vertical-align: top;">
                                                <input type="text" name="pengirim" class="form-control" value="{{ $suratJalan->pengirim }}">
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
