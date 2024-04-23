@extends('layouts.app', ['pageSlug' => 'invoice'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        </div>
                        @if (auth()->user()->role == 'ADMIN')
                        <div class="col-4 text-right">
                            <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-info">+Tambah Invoice</a>
                            <a href="{{ route('invoice.cetak') }}" class="btn btn-sm btn-primary">Cetak Laporan</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter table-bordered">
                            <thead class="text-primary table-bordered">
                                <tr class="table-bordered ">
                                    <th >#</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">No Purhase Order</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama Kapal/Site</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">satuan</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">harga dasar</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Jumlah Harga Dasar</th>
                                    <th scope="col">Wilayah Pengisian</th>
                                    <th scope="col">Jumlah PPN</th>
                                    <th scope="col">Total</th>
                                    @if (auth()->user()->role == 'ADMIN' )
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $item->alamat }}
                                        </td>
                                        <td>
                                            {{ $item->no_telp }}
                                        </td>
                                        <td>
                                            {{ $item->no_po }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->no_invoice }}
                                        </td>
                                        <td>
                                            {{ $item->term }}
                                        </td>
                                        <td>
                                            {{ $item->produk }}
                                        </td>
                                        <td>
                                            {{ $item->nama_kapal }}
                                        </td>
                                        <td>
                                            {{ $item->wilayah_pengisian }}
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->satuan }}
                                        </td>
                                        <td>
                                            {{ $item->harga }}
                                        </td>
                                        <td>
                                            {{ $item->harga_dasar }}
                                        </td>
                                        <td>
                                            {{ $item->ppn }}
                                        </td>
                                        <td>
                                            {{ $item->jumlah_harga_dasar }}
                                        </td>
                                        <td>
                                            {{ $item->jumlah_ppn }}
                                        </td>
                                        <td>
                                            {{ number_format($item->total, 2, ',', '.') }}
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
                                                <a class="dropdown-item" href="{{ route('invoice.edit',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('invoice.hapus', $item->id) }}">Delete</a>
                                                <a class="dropdown-item" href="{{ route('invoice.show', $item->id) }}">Detail</a>
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
            </div>
        </div>
    </div>

    

@endsection


