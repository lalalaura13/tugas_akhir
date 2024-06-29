@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs mb-3 justify-content-center fw-semibold" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dewasa-tab" data-bs-toggle="tab" data-bs-target="#dewasa" type="button"
                    role="tab" aria-controls="dewasa" aria-selected="true">Dewasa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="remaja-tab" data-bs-toggle="tab" data-bs-target="#remaja" type="button"
                    role="tab" aria-controls="remaja" aria-selected="false">Remaja</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="praremaja-tab" data-bs-toggle="tab" data-bs-target="#praremaja" type="button"
                    role="tab" aria-controls="praremaja" aria-selected="false">Pra Remaja</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="usiadini-tab" data-bs-toggle="tab" data-bs-target="#usiadini" type="button"
                    role="tab" aria-controls="usiadini" aria-selected="false">Usia Dini</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dewasa" role="tabpanel" aria-labelledby="dewasa-tab">
                @include('bagan.TabPane.dewasa')
            </div>
            <div class="tab-pane fade" id="remaja" role="tabpanel" aria-labelledby="remaja-tab">
                @include('bagan.TabPane.remaja')
            </div>
            <div class="tab-pane fade" id="praremaja" role="tabpanel" aria-labelledby="praremaja-tab">
                @include('bagan.TabPane.praremaja')
            </div>
            <div class="tab-pane fade" id="usiadini" role="tabpanel" aria-labelledby="usiadini-tab">
                @include('bagan.TabPane.usiadini')
            </div>
        </div>
    </div>
    @include('assets.js.ajax-bagan')
    @include('assets.js.validasi-modal-edit')
    @include('assets.js.notifikasi-berhasil')
@endsection