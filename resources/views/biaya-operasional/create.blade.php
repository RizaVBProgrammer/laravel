@extends('layouts.app', ['pageSlug' => 'biaya-operasional'])

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
                            <a href="{{ route('biaya-operasional.index') }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">PENGELUARAN BBM</h2>
                    <form action="{{ route('biaya-operasional.store') }}" method="post" enctype="multipart/form-data" id="PengeluaranBBMForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal"  class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id=""
                                        placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" id=""
                                        placeholder="Masukkan Nomor Invoice">
                                </div>
                                
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
