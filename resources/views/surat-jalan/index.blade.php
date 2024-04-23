@extends('layouts.app', ['pageSlug' => 'surat-jalan'])

@section('content')
@include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        </div>
                        @if (auth()->user()->role == 'ADMIN')
                        <div class="col-4 text-right">
                            <a href="{{ route('surat-jalan.create') }}" class="btn btn-sm btn-info">+ Tambah Surat Jalan</a>
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
                                    
                                    @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->kepada }}
                                        </td>
                                        <td>
                                            {{ $item->no_surat }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->tujuan }}
                                        </td>
                                        <td>
                                            {{ $item->pengirim }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        
                                        @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
                                        <td>
                                            @if (auth()->user()->role == 'ADMIN')
                                            <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('surat-jalan.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('surat-jalan.hapus', $item->id) }}">Delete</a>
                                                <a class="dropdown-item" href="{{ route('surat-jalan.show', $item->id) }}">Detail</a>
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
