@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-12">
                <div class="card text-center text-bg-light shadow p-3">
                    <div class="card-body">
                        <p class="card-text h3">Haii <span class="fw-bolder">{{ Auth()->user()->nama_kontingen }},</span>
                            Selamat Datang di sistem silat, Anda login sebagai {{ auth()->user()->roles->level }} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Kelompok Latihan</h5>
                        <p class="card-text fw-bolder">Jumlah seluruh Kolat Mencapai {{ $countK }} Kelompok Latihan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Atlet</h5>
                        <p class="card-text fw-bolder">Jumlah seluruh Atlet Mencapai {{ $countA }} Atlet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
