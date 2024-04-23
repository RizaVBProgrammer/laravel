@extends('layouts.app', ['pageSlug' => 'laporan-po'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Laporan Purchase Order</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('purchase-order.cetak') }}" class="btn btn-sm btn-primary">Cetak Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter" id="myTable">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">File Purchase Order</th>
                                    @if (auth()->user()->role == 'DIREKTUR')
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nama_perusahaan }}
                                        </td>
                                        <td>
                                            PO_{{ $item->name }} <a href="{{ asset('file') . '/' . $item->file }}"><i
                                                    class="tim-icons icon-cloud-download-93"></i></a>
                                        </td>
                                        @if (auth()->user()->role == 'DIREKTUR')
                                        <td>
                                            <a href="{{ route('purchase-order.hapus', $item->user_id) }}"
                                                class="btn btn-warning text-white -1">
                                                <i class="tim-icons icon-trash-simple"></i>
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

@push('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endpush