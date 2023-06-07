@extends('layouts.main-customer')

@section('title')
    Pengajuan Permintaan Gas
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.customer.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Pengajuan Permintaan</h3>
        @endslot
        <li class="breadcrumb-item">Permintaan</li>
        <li class="breadcrumb-item active">Pengajuan Permintaan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- @if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif --}}

                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Pengajuan Permintaan</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" enctype="multipart/form-data" method="POST"
                            action="{{ route('customer.demand.store') }}">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="inp_requestgas">Periode</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" readonly
                                        value="{{ now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="inp_requestgas">Jumlah Permintaan Gas</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('inp_requestgas') is-invalid @enderror"
                                        name="inp_requestgas" id="inp_requestgas" type="text"
                                        placeholder="Contoh : 550,10" value="{{ old('inp_requestgas') }}"
                                        autocomplete="false" autofocus>
                                    @error('inp_requestgas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Kirim</button>
                        <a href="{{ URL::previous() }}">
                            <button class="btn btn-secondary" type="button">Batal</button>
                        </a>
                        </form>
                    </div>
                </div>
                <!-- Form Permintaan End -->
            </div>
        </div>
    </div>
@endsection
