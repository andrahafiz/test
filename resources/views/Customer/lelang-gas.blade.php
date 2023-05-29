@extends('layouts.main-customer')

@section('title')
    Lelang Gas
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.customer.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Lelang Gas</h3>
        @endslot
        <li class="breadcrumb-item">Permintaan</li>
        <li class="breadcrumb-item active">Lelang Gas</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Lelang Gas</h5>
                    </div>
                    <div class="card-body">
                        @if (is_null($gas))
                            <h4 class="text-center">Tidak ada lelang</h4>
                        @else
                            @if ($gas->availability > $total_gas)
                                <form class="theme-form" enctype="multipart/form-data" method="POST"
                                    action="{{ route('customer.claim.gas') }}">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Periode</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" readonly value="{{ $gas->period }}">
                                            <input class="form-control" type="hidden" name="gas_id" readonly
                                                value="{{ $gas->id }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inp_sisagas">Gas Sisa</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('inp_sisagas') is-invalid @enderror"
                                                name="inp_sisagas" id="inp_sisagas" type="text"
                                                placeholder="Contoh : 550,10"
                                                value="{{ old('inp_sisagas') ?? $gas_sisa }}"readonly>
                                            @error('inp_sisagas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Klaim</button>
                                </form>
                                <h4 class="text-center">Tidak ada lelang</h4>
                            @endif
                        @endif
                    </div>
                    {{-- <div class="card-footer">
                    </div> --}}
                </div>
                <!-- Form Permintaan End -->
            </div>
        </div>
    </div>
@endsection
