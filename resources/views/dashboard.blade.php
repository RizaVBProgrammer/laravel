@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')  
@if (auth()->user()->role == 'ADMIN')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category text-dark">PO Masuk</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{ $po }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category text-dark">Invoice Keluar</h5>
                    <h3 class="card-title"><i class="tim-icons icon-notes text-info"></i> 3</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category text-dark">Surat Jalan Keluar</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast  text-success"></i>5</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-tasks">
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card card-tasks">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
