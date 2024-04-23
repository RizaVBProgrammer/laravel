@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                    <h2 class="text-center">Edit Biaya Operasional</h2>
                    <form action="{{ route('biaya-operasional.update', $biayaOperasional->id) }}" method="post"
                        enctype="multipart/form-data" id="biayaOperasionalForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control"
                                        value="{{ $biayaOperasional->tanggal }}">
                                </div>
                               
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control"
                                        value="{{ $biayaOperasional->keterangan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="produk" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control"
                                        value="{{ $biayaOperasional->jumlah }}">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
