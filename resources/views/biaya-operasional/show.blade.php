@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

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
                            <a href="{{ route('biaya-operasional.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">BIAYA OPERASIONAL</h2>
                    <form action="{{ route('biaya-operasional.update', $biayaOperasional->id) }}" method="post" enctype="multipart/form-data" id="biayaOperasionalForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kepada" class="form-label">Tanggal</label>
                                    <input type="date" name="kepada" readonly class="form-control" value="{{ $biayaOperasional->tanggal ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="up" class="form-label">Keterangan</label>
                                    <input type="text" name="up" readonly class="form-control" value="{{ $biayaOperasional->keterangan ?? '' }}">
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Jumlah</label>
                                    <input type="text" name="jumlah" readonly class="form-control" value="{{ $biayaOperasional->jumlah ?? '' }}">
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
