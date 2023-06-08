@extends('layouts.main-mcs')

@section('title')
    Approval Permintaan
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.mcs.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Approval Permintaan ({{ now()->format('Y-m-d') }})</h3>
        @endslot
        {{-- <li class="breadcrumb-gas">Pengaduan</li> --}}
        <li class="breadcrumb-gas active">Approval Permintaan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi
                            kesalahan</strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Approval Permintaan</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" enctype="multipart/form-data" method="POST"
                            action="{{ route('mcs.send.gas', $demand->id) }}">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="inp_period">Periode</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" readonly value="{{ $gas->period }}">
                                    <input class="form-control" type="hidden" name="inp_period"
                                        value="{{ $gas->id }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="inp_availabily">Availability</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" readonly name="gas_availability"
                                        value="{{ $gas->availability }}">
                                </div>
                            </div>
                            <hr>
                            {{-- @if (!count($gas))
                                <center>
                                    <h1>Tidak ada pengajuan</h1>
                                </center>
                            @else --}}
                            <div class="row">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="">Pelanggan
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" readonly
                                            value="{{ $demand->customer?->name }}">
                                        <input class="form-control" type="hidden" readonly
                                            value="{{ $demand->customer_id }}">
                                        <input class="form-control" type="hidden" readonly value="{{ $demand->id }}"
                                            name="inp_demand">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="">Nominasi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" readonly
                                            value="{{ $demand->request_gas }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inp_availabily">Availability</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('inp_availabily') is-invalid @enderror"
                                            name="inp_availabily" id="inp_availabily" type="text"
                                            value="{{ $demand->received_gas }}" autocomplete="false" readonly>
                                        @error('inp_availabily')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inp_gas_terima">Gas Diterima</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('inp_gas_terima') is-invalid @enderror"
                                            name="inp_gas_terima" id="inp_gas_terima" type="number"
                                            value="{{ $demand->gas }}" readonly>
                                        @error('inp_gas_terima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inp_gas">Gas Dikirim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('inp_gas') is-invalid @enderror" name="inp_gas"
                                            id="inp_gas" type="number" placeholder="Contoh : 550,10"
                                            max="{{ $demand->received_gas }}" value="{{ old('inp_gas') }}"
                                            autocomplete="false" autofocus>
                                        @error('inp_gas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Ajukan</button>
                        <a href="{{ URL::previous() }}">
                            <button class="btn btn-secondary" type="button">Batal</button>
                        </a>
                        </form>
                        {{-- @endif --}}
                    </div>
                </div>
                <!-- Form Permintaan End -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush
