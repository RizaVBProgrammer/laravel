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
                    <div class="col-4 text-right">
                        <a href="{{ route('biaya-operasional.create') }}" class="btn btn-sm btn-info">+ Tambah Biaya Operasional</a>
                         <a href="{{ route('biaya-operasional.create') }}" class="btn btn-sm btn-success">Unduh PDF</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('biaya-operasional.filter') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <!-- Tambahkan input filter lainnya sesuai kebutuhan -->
                        <div class="col-md-4">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="">
                    <table class="table tablesorter table-bordered " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jumlah</th>
                                @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->jumlah }}</td>
                                @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                <td>
                                    @if (auth()->user()->role == 'ADMIN')
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="{{ route('biaya-operasional.edit',$item->id) }}">Edit</a>
                                            <a class="dropdown-item"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('biaya-operasional.hapus', $item->id) }}">Delete</a>
                                            <a class="dropdown-item"
                                                href="{{ route('biaya-operasional.show', $item->id) }}">Detail</a>
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
