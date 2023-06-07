@extends('layouts.main-mcs')

@section('title')
    Riwayat Permintaan Gas
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.mcs.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Riwayat Permintaan Gas</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Riwayat Permintaan Gas</li>
    @endcomponent

    <!-- Form Tambah Gas -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Sukses ! </strong> {{ session('success') }}.
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12">
                                <h5>Riwayat Permintaan Gas</h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Nominasi</th>
                                        <th>Availability</th>
                                        <th>Gas</th>
                                        <th>Periode</th>
                                        <th>Pelanggan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name ?? '-' }}</td>
                                            <td>{{ $item->request_gas }} BBTU</td>
                                            <td>{{ $item->received_gas ?? 'Proses' }} MMSCFD</td>
                                            <td>{{ $item->gas ?? 'Kosong' }}</td>
                                            <td>{{ $item->gases?->period ?? '-' }}</td>
                                            <td>{{ $item->customer?->name ?? '-' }}</td>
                                            <td>
                                                <x-ButtonStatus type="{{ $item->status }}">
                                                </x-ButtonStatus>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Simple</button> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush
