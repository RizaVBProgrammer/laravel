@extends('layouts.app', ['pageSlug' => 'purchase-order'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Purchase Order</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('purchase-order.create') }}" class="btn btn-sm btn-danger">Back</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('purchase-order.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" value="{{ auth::user()->name }}" readonly class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" class="form-control" id="namaperusahaan"
                                        placeholder="Masukkan nama perusahaan anda">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="namaperusahaan" class="form-label">File Purchase Order</label>
                                    <input type="file" name="file" class="form-control" id="namaperusahaan">
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
@endsection
