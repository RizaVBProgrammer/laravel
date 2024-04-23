@extends('layouts.app', ['pageSlug' => 'purchase-order'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        </div>
                        @if (auth()->user()->role == 'CUSTOMER')
                        <div class="col-4 text-right">
                            <a href="{{ route('purchase-order.create') }}" class="btn btn-sm btn-info">+ Purchase Order</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter table-bordered" id="">
                            <thead class=" text-primary table-bordered">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">File Purchase Order</th>
                                    <th scope="col">Status</th>
                                    @if (auth()->user()->role == 'ADMIN')
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            PO_{{ $item->nama_perusahaan }} <a href="{{ asset('file') . '/' . $item->file }}"><i
                                                    class="tim-icons icon-cloud-download-93"></i></a>
                                        </td>
                                        <td>
                                            @if ($item->status == 'Proses')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @elseif($item->status == 'Batal')
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @elseif($item->status == 'Selesai')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @endif

                                        </td>
                                        @if (auth()->user()->role == 'ADMIN')
                                        <td>
                                            <a href="{{ route('purchase-order.status', ['status' => 'proses', 'id' => $item->id]) }}"
                                                class=" btn-info btn-sm text-white mr-1">
                                                <i class="tim-icons icon-refresh-02"></i>
                                            </a>
                                            <a href="{{ route('purchase-order.status', ['status' => 'batal', 'id' => $item->id]) }}"
                                                class=" btn-danger btn-sm text-white mr-1">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </a>
                                            <a href="{{ route('purchase-order.status', ['status' => 'selesai', 'id' => $item->id]) }}"
                                                class="btn- btn-success btn-sm text-white mr-1">
                                                <i class="tim-icons icon-check-2"></i>
                                            </a>
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
