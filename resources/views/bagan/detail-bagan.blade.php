@extends('layouts.app')

@section('content')
    @if (Auth()->user()->role_id == 1)
    <div class="container-fluid">
        <h2>DETAIL BAGAN</h2>
        <form action="{{ route('a.update-bagan', ['id' => $id]) }}" method="POST">
            @csrf
            @method('put')
            @foreach($detailBagan as $detail)
                <div class="card mb-3">
                    <div class="card-header">
                        Pertandingan antara <span class="fw-bolder">{{ $detail->sudut_merah }} (Merah)</span>  dan <span class="fw-bolder">{{ $detail->sudut_biru }} (Biru)</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Juri dan Skor</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Sudut Merah: {{ $detail->sudut_merah }}</h6>
                                <div class="mb-3">
                                    <label for="juri1_merah_{{ $detail->id }}" class="form-label">Juri 1</label>
                                    <input type="text" class="form-control" id="juri1_merah_{{ $detail->id }}" name="juri1_merah[{{ $detail->id }}]" value="{{ $detail->Juri_1_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor1_merah_{{ $detail->id }}" class="form-label">Skor 1</label>
                                    <input type="text" class="form-control" id="skor1_merah_{{ $detail->id }}" name="skor1_merah[{{ $detail->id }}]" value="{{ $detail->skor_1_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri2_merah_{{ $detail->id }}" class="form-label">Juri 2</label>
                                    <input type="text" class="form-control" id="juri2_merah_{{ $detail->id }}" name="juri2_merah[{{ $detail->id }}]" value="{{ $detail->Juri_2_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor2_merah_{{ $detail->id }}" class="form-label">Skor 2</label>
                                    <input type="text" class="form-control" id="skor2_merah_{{ $detail->id }}" name="skor2_merah[{{ $detail->id }}]" value="{{ $detail->skor_2_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri3_merah_{{ $detail->id }}" class="form-label">Juri 3</label>
                                    <input type="text" class="form-control" id="juri3_merah_{{ $detail->id }}" name="juri3_merah[{{ $detail->id }}]" value="{{ $detail->Juri_3_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor3_merah_{{ $detail->id }}" class="form-label">Skor 3</label>
                                    <input type="text" class="form-control" id="skor3_merah_{{ $detail->id }}" name="skor3_merah[{{ $detail->id }}]" value="{{ $detail->skor_3_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri4_merah_{{ $detail->id }}" class="form-label">Juri 4</label>
                                    <input type="text" class="form-control" id="juri4_merah_{{ $detail->id }}" name="juri4_merah[{{ $detail->id }}]" value="{{ $detail->Juri_4_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor4_merah_{{ $detail->id }}" class="form-label">Skor 4</label>
                                    <input type="text" class="form-control" id="skor4_merah_{{ $detail->id }}" name="skor4_merah[{{ $detail->id }}]" value="{{ $detail->skor_4_merah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_skor_merah_{{ $detail->id }}" class="form-label">Total Skor Merah</label>
                                    <input type="text" class="form-control" id="total_skor_merah{{ $detail->id }}" name="total_skor_merah[{{ $detail->id }}]" value="{{ $detail->total_skor_merah }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Sudut Biru: {{ $detail->sudut_biru }}</h6>
                                <div class="mb-3">
                                    <label for="juri1_biru_{{ $detail->id }}" class="form-label">Juri 1</label>
                                    <input type="text" class="form-control" id="juri1_biru_{{ $detail->id }}" name="juri1_biru[{{ $detail->id }}]" value="{{ $detail->Juri_1_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor1_biru_{{ $detail->id }}" class="form-label">Skor 1</label>
                                    <input type="text" class="form-control" id="skor1_biru_{{ $detail->id }}" name="skor1_biru[{{ $detail->id }}]" value="{{ $detail->skor_1_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri2_biru_{{ $detail->id }}" class="form-label">Juri 2</label>
                                    <input type="text" class="form-control" id="juri2_biru_{{ $detail->id }}" name="juri2_biru[{{ $detail->id }}]" value="{{ $detail->Juri_2_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor2_biru_{{ $detail->id }}" class="form-label">Skor 2</label>
                                    <input type="text" class="form-control" id="skor2_biru_{{ $detail->id }}" name="skor2_biru[{{ $detail->id }}]" value="{{ $detail->skor_2_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri3_biru_{{ $detail->id }}" class="form-label">Juri 3</label>
                                    <input type="text" class="form-control" id="juri3_biru_{{ $detail->id }}" name="juri3_biru[{{ $detail->id }}]" value="{{ $detail->Juri_3_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor3_biru_{{ $detail->id }}" class="form-label">Skor 3</label>
                                    <input type="text" class="form-control" id="skor3_biru_{{ $detail->id }}" name="skor3_biru[{{ $detail->id }}]" value="{{ $detail->skor_3_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="juri4_biru_{{ $detail->id }}" class="form-label">Juri 4</label>
                                    <input type="text" class="form-control" id="juri4_biru_{{ $detail->id }}" name="juri4_biru[{{ $detail->id }}]" value="{{ $detail->Juri_4_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="skor4_biru_{{ $detail->id }}" class="form-label">Skor 4</label>
                                    <input type="text" class="form-control" id="skor4_biru_{{ $detail->id }}" name="skor4_biru[{{ $detail->id }}]" value="{{ $detail->skor_4_biru }}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_skor_biru_{{ $detail->id }}" class="form-label">Total Skor Biru</label>
                                    <input type="text" class="form-control" id="total_skor_biru{{ $detail->id }}" name="total_skor_biru[{{ $detail->id }}]" value="{{ $detail->total_skor_biru }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between">
                @if (Auth()->user()->role_id == 1)
                    <a href="{{ route('a.olah-bagan') }}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                @elseif (Auth()->user()->role_id == 2)
                <a href="{{ route('k.daftar-bagan') }}" class="btn btn-success">Kembali</a>
                @endif
            </div>
        </form>
    </div>
    @elseif (Auth()->user()->role_id == 2)
    <div class="container-fluid">
        <h2>DETAIL BAGAN</h2>
        <form action="{{ route('a.update-bagan', ['id' => $id]) }}" method="POST">
            @csrf
            @method('put')
            @foreach($detailBagan as $detail)
                <div class="card mb-3">
                    <div class="card-header">
                        Pertandingan antara <span class="fw-bolder">{{ $detail->sudut_merah }} (Merah)</span>  dan <span class="fw-bolder">{{ $detail->sudut_biru }} (Biru)</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Juri dan Skor</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Sudut Merah: {{ $detail->sudut_merah }}</h6>
                                <div class="mb-3">
                                    <label for="juri1_merah_{{ $detail->id }}" class="form-label">Juri 1</label>
                                    <input type="text" class="form-control" id="juri1_merah_{{ $detail->id }}" name="juri1_merah[{{ $detail->id }}]" value="{{ $detail->Juri_1_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor1_merah_{{ $detail->id }}" class="form-label">Skor 1</label>
                                    <input type="text" class="form-control" id="skor1_merah_{{ $detail->id }}" name="skor1_merah[{{ $detail->id }}]" value="{{ $detail->skor_1_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri2_merah_{{ $detail->id }}" class="form-label">Juri 2</label>
                                    <input type="text" class="form-control" id="juri2_merah_{{ $detail->id }}" name="juri2_merah[{{ $detail->id }}]" value="{{ $detail->Juri_2_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor2_merah_{{ $detail->id }}" class="form-label">Skor 2</label>
                                    <input type="text" class="form-control" id="skor2_merah_{{ $detail->id }}" name="skor2_merah[{{ $detail->id }}]" value="{{ $detail->skor_2_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri3_merah_{{ $detail->id }}" class="form-label">Juri 3</label>
                                    <input type="text" class="form-control" id="juri3_merah_{{ $detail->id }}" name="juri3_merah[{{ $detail->id }}]" value="{{ $detail->Juri_3_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor3_merah_{{ $detail->id }}" class="form-label">Skor 3</label>
                                    <input type="text" class="form-control" id="skor3_merah_{{ $detail->id }}" name="skor3_merah[{{ $detail->id }}]" value="{{ $detail->skor_3_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri4_merah_{{ $detail->id }}" class="form-label">Juri 4</label>
                                    <input type="text" class="form-control" id="juri4_merah_{{ $detail->id }}" name="juri4_merah[{{ $detail->id }}]" value="{{ $detail->Juri_4_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor4_merah_{{ $detail->id }}" class="form-label">Skor 4</label>
                                    <input type="text" class="form-control" id="skor4_merah_{{ $detail->id }}" name="skor4_merah[{{ $detail->id }}]" value="{{ $detail->skor_4_merah }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="total_skor_merah_{{ $detail->id }}" class="form-label">Total Skor Merah</label>
                                    <input type="text" class="form-control" id="total_skor_merah{{ $detail->id }}" name="total_skor_merah[{{ $detail->id }}]" value="{{ $detail->total_skor_merah }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Sudut Biru: {{ $detail->sudut_biru }}</h6>
                                <div class="mb-3">
                                    <label for="juri1_biru_{{ $detail->id }}" class="form-label">Juri 1</label>
                                    <input type="text" class="form-control" id="juri1_biru_{{ $detail->id }}" name="juri1_biru[{{ $detail->id }}]" value="{{ $detail->Juri_1_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor1_biru_{{ $detail->id }}" class="form-label">Skor 1</label>
                                    <input type="text" class="form-control" id="skor1_biru_{{ $detail->id }}" name="skor1_biru[{{ $detail->id }}]" value="{{ $detail->skor_1_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri2_biru_{{ $detail->id }}" class="form-label">Juri 2</label>
                                    <input type="text" class="form-control" id="juri2_biru_{{ $detail->id }}" name="juri2_biru[{{ $detail->id }}]" value="{{ $detail->Juri_2_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor2_biru_{{ $detail->id }}" class="form-label">Skor 2</label>
                                    <input type="text" class="form-control" id="skor2_biru_{{ $detail->id }}" name="skor2_biru[{{ $detail->id }}]" value="{{ $detail->skor_2_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri3_biru_{{ $detail->id }}" class="form-label">Juri 3</label>
                                    <input type="text" class="form-control" id="juri3_biru_{{ $detail->id }}" name="juri3_biru[{{ $detail->id }}]" value="{{ $detail->Juri_3_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor3_biru_{{ $detail->id }}" class="form-label">Skor 3</label>
                                    <input type="text" class="form-control" id="skor3_biru_{{ $detail->id }}" name="skor3_biru[{{ $detail->id }}]" value="{{ $detail->skor_3_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="juri4_biru_{{ $detail->id }}" class="form-label">Juri 4</label>
                                    <input type="text" class="form-control" id="juri4_biru_{{ $detail->id }}" name="juri4_biru[{{ $detail->id }}]" value="{{ $detail->Juri_4_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="skor4_biru_{{ $detail->id }}" class="form-label">Skor 4</label>
                                    <input type="text" class="form-control" id="skor4_biru_{{ $detail->id }}" name="skor4_biru[{{ $detail->id }}]" value="{{ $detail->skor_4_biru }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="total_skor_biru_{{ $detail->id }}" class="form-label">Total Skor Biru</label>
                                    <input type="text" class="form-control" id="total_skor_biru{{ $detail->id }}" name="total_skor_biru[{{ $detail->id }}]" value="{{ $detail->total_skor_biru }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between">
                @if (Auth()->user()->role_id == 1)
                    <a href="{{ route('a.olah-bagan') }}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                @elseif (Auth()->user()->role_id == 2)
                <a href="{{ route('k.daftar-bagan') }}" class="btn btn-success">Kembali</a>
                @endif
            </div>
        </form>
    </div>
    @endif
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah')
    @include('assets.js.validasi-modal-edit')
@endsection