@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-1 g-4">
            <div class="col">
                <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-uppercase mb-4">Jadwal Technical Meeting</h5>
                        <form id="formModal" action="{{ route('a.tambah-jadwal-tm') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date"
                                        class="form-control @error('tanggal') is-invalid @enderror"
                                        name="tanggal" value="{{ old('tanggal') }}"
                                        id="tanggal" required>
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Waktu</label>
                                    <input type="time"
                                        class="form-control @error('waktu') is-invalid @enderror" name="waktu"
                                        value="{{ old('waktu') }}" id="waktu" placeholder="Opsional">
                                    @error('waktu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Narahubung 1</label>
                                    <input type="text"
                                        class="form-control @error('narahubung_1') is-invalid @enderror" name="narahubung_1"
                                        value="{{ old('narahubung_1') }}" id="narahubung_1" placeholder="Opsional">
                                    @error('narahubung_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO.HP Narahubung 1</label>
                                    <input type="number"
                                        class="form-control @error('nohp_narhub_1') is-invalid @enderror" name="nohp_narhub_1"
                                        value="{{ old('nohp_narhub_1') }}" id="nohp_narhub_1" placeholder="Opsional">
                                    @error('nohp_narhub_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Narahubung 2</label>
                                    <input type="text"
                                        class="form-control @error('narahubung_2') is-invalid @enderror" name="narahubung_2"
                                        value="{{ old('narahubung_2') }}" id="narahubung_2" placeholder="Opsional">
                                    @error('narahubung_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO.HP Narahubung 2</label>
                                    <input type="number"
                                        class="form-control @error('nohp_narhub_2') is-invalid @enderror" name="nohp_narhub_2"
                                        value="{{ old('nohp_narhub_2') }}" id="nohp_narhub_2" placeholder="Opsional">
                                    @error('nohp_narhub_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Narahubung 3</label>
                                    <input type="text"
                                        class="form-control @error('narahubung_3') is-invalid @enderror" name="narahubung_3"
                                        value="{{ old('narahubung_3') }}" id="narahubung_3" placeholder="Opsional">
                                    @error('narahubung_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO.HP Narahubung 3</label>
                                    <input type="number"
                                        class="form-control @error('nohp_narhub_3') is-invalid @enderror" name="nohp_narhub_3"
                                        value="{{ old('nohp_narhub_3') }}" id="nohp_narhub_3" placeholder="Opsional">
                                    @error('nohp_narhub_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body">
                        <table id="data_kolat" class="table table-striped display nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Narahubung 1</th>
                                    <th class="text-center">NO.HP Narahubung 1</th>
                                    <th class="text-center">Narahubung 2</th>
                                    <th class="text-center">NO.HP Narahubung 2</th>
                                    <th class="text-center">Narahubung 3</th>
                                    <th class="text-center">NO.HP Narahubung 3</th>
                                    <th class="text-center">AKsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $item)
                                    <tr class="text-center">
                                        <td class="text-center">{{ $item->tanggal }}</td>
                                        <td class="text-center">{{ !empty($item->waktu) ? $item->waktu : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->narahubung_1) ? $item->narahubung_1 : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->nohp_narhub_1) ? $item->nohp_narhub_1 : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->narahubung_2) ? $item->narahubung_2 : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->nohp_narhub_2) ? $item->nohp_narhub_2 : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->narahubung_3) ? $item->narahubung_3 : '-' }}</td>
                                        <td class="text-center">{{ !empty($item->nohp_narhub_3) ? $item->nohp_narhub_3 : '-' }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="ti ti-edit"></i></button>
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('a.delete-jadwal', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ms-2"><i class="ti ti-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="{{ route('a.update-jadwal-tm', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal Technical Meeting</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal') is-invalid @enderror"
                                                                name="tanggal" value="{{ $item->tanggal }}" id="tanggal" required>
                                                            @error('tanggal')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Waktu</label>
                                                            <input type="text" class="form-control" name="waktu" value="{{ $item->waktu }}" id="waktu">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Narahubung 1</label>
                                                            <input type="text" class="form-control" name="narahubung_1" value="{{ $item->narahubung_1 }}" id="narahubung_1" placeholder="Opsional">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">NO.HP Narahubung 1</label>
                                                            <input type="number" class="form-control" name="nohp_narhub_1" value="{{ $item->nohp_narhub_1 }}" id="nohp_narhub_1" placeholder="Opsional">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Narahubung 2</label>
                                                            <input type="text" class="form-control" name="narahubung_2" value="{{ $item->narahubung_2 }}" id="narahubung_2" placeholder="Opsional">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">NO.HP Narahubung 2</label>
                                                            <input type="number" class="form-control" name="nohp_narhub_2" value="{{ $item->nohp_narhub_2 }}" id="nohp_narhub_2" placeholder="Opsional">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Narahubung 3</label>
                                                            <input type="text" class="form-control" name="narahubung_3" value="{{ $item->narahubung_3 }}" id="narahubung_3" placeholder="Opsional">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">NO.HP Narahubung 3</label>
                                                            <input type="number" class="form-control" name="nohp_narhub_3" value="{{ $item->nohp_narhub_3 }}" id="nohp_narhub_3" placeholder="Opsional">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @include('assets.js.sweatalert-delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah')
    @include('assets.js.validasi-modal-edit')
@endsection