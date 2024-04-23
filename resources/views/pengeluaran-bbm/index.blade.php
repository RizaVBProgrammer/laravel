@extends('layouts.app', ['pageSlug' => 'pengeluaran-bbm'])

@section('content')

@include('sweetalert::alert')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('pengeluaran-bbm.create') }}" class="btn btn-sm btn-info">+ Tambah Pengeluaran BBM</a>
                        <a href="" class="btn btn-sm btn-success">Unduh PDF</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="nama_perusahaan">Nama Perusahaan:</label>
                                <input type="text" name="nama_perusahaan" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="produk">Produk:</label>
                                <input type="text" name="produk" class="form-control">
                            </div>
                            <!-- Tambahkan input filter lainnya sesuai kebutuhan -->
                            <div class="col-md-3">
                                <label>&nbsp;</label><br>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>

                    <table class="table tablesorter table-bordered ">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Perusahaan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No Invoice</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Wilayah Pengisian</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>

                                @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama_perusahaan }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->no_invoice }}</td>
                                <td>{{ $item->produk }}</td>
                                <td>{{ $item->wilayah_pengisian }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->total }}</td>

                                @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                <td>
                                    @if (auth()->user()->role == 'ADMIN')
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('pengeluaran-bbm.edit',$item->id) }}">Edit</a>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('pengeluaran-bbm.hapus', $item->id) }}">Delete</a>
                                            <a class="dropdown-item" href="{{ route('pengeluaran-bbm.show', $item->id) }}">Detail</a>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                @endif
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
