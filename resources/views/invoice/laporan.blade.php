@extends('layouts.app', ['pageSlug' => 'laporan-invoice'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('invoice.cetak') }}" class="btn btn-sm btn-primary">Cetak Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class=" table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead class=" table-bordered" >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">No PO</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama Kapal/Site</th>
                                    <th scope="col">Wilayah Pengisian</th>
                                    
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
                                            {{ number_format($item->total, 2, ',', '.') }}
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('invoice.show', $item->id) }}"
                                                class="btn btn-success text-white mr-1">
                                                <i class="tim-icons icon-cloud-download-93"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <form action="{{ route('invoice.filter') }}" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="nama_perusahaan">Nama Perusahaan:</label>
            <input type="text" name="nama_perusahaan" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="no_invoice">Nomor Invoice:</label>
            <input type="text" name="no_invoice" class="form-control">
        </div>
        <!-- Tambahkan input filter lainnya sesuai kebutuhan -->
        <div class="col-md-4">
            <label>&nbsp;</label><br>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>
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