@extends('layouts.main-mcs')

@section('title')
    Pengaduan Gas
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.mcs.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Data Permintaan Gas ({{ now()->format('Y-m-d') }})</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Data Permintaan Gas</li>
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
                        <h5>Pengajuan Permintaan</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" enctype="multipart/form-data" method="POST"
                            action="{{ route('mcs.demand.approv') }}">
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
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="inp_availabily">Current</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" readonly name="gas_current"
                                        value="{{ $current }}">
                                </div>
                            </div>
                            <hr>
                            @if (!count($demand))
                                <center>
                                    <h1>Tidak ada pengajuan</h1>
                                </center>
                            @else
                                @php $i= 0 @endphp
                                @foreach ($demand as $item)
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="">Pelanggan
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" readonly
                                                    value="{{ $item->customer?->name }}">
                                                <input class="form-control" type="hidden" readonly
                                                    value="{{ $item->customer_id }}">
                                                <input class="form-control" type="hidden" readonly
                                                    value="{{ $item->id }}" name="inp_demand[]">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="">Nominasi</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" readonly
                                                    value="{{ $item->request_gas }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="inp_availabily">Availability</label>
                                            <div class="col-sm-9">
                                                <input
                                                    class="form-control @error('inp_availabily.' . $i) is-invalid @enderror"
                                                    name="inp_availabily[]" id="inp_availabily" type="text"
                                                    placeholder="Contoh : 550,10" value="{{ old('inp_availabily.' . $i) }}"
                                                    autocomplete="false" autofocus>
                                                @error('inp_availabily.' . $i++)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Ajukan</button>
                        <a href="{{ URL::previous() }}">
                            <button class="btn btn-secondary" type="button">Batal</button>
                        </a>
                        </form>
                        @endif
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
