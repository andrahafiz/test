@extends('layouts.main-medco')

@section('title')
    Pengaduan Gas
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.medco.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Pengiriman Gas</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Pengiriman Gas</li>
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
                                <h5>Data Permintaan Gas</h5>
                                <p class="m-t-10 f-w-600"> Tanggal : {{ tanggal_indo(now()->today()) }}</p>
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
                                        <th>Progress</th>
                                        <th>Pelanggan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name ?? '-' }}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar-animated bg-primary progress-bar-striped"
                                                        role="progressbar"
                                                        style="width: {{ ($item->gas / $item->received_gas) * 100 ?? 0 }}%"
                                                        aria-valuenow="{{ $item->gas ?? 0 }}" aria-valuemin="0"
                                                        aria-valuemax="{{ $item->received_gas ?? 0 }}"></div>
                                                </div>
                                                <p class="text-center f-w-700 m-t-5">
                                                    {{ $item->gas ?? 0 }}/{{ $item->received_gas }}</p>
                                            </td>
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
