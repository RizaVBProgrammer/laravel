@extends('layouts.app', ['pageSlug' => 'surat-jalan'])

@section('content')
@include('sweetalert::alert')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <!-- Form filter -->
                        <form action="" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="tujuan">Tujuan:</label>
                                    <input type="text" name="tujuan" class="form-control">
                                </div>
                                <!-- Tambahkan input filter lainnya sesuai kebutuhan -->
                                <div class="col-md-4">
                                    <label>&nbsp;</label><br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (auth()->user()->role == 'ADMIN')
                    <div class="col-4 text-right">
                        <a href="" class="btn btn-sm btn-success">Unduh PDF</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table tablesorter table-bordered " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Penerima</th>
                                <th scope="col">No Surat Jalan</th>
                                <th scope="col">No PO</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Dikirim Oleh</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kepada }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->no_po }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
