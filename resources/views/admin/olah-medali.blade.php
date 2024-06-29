@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4">Daftar Medali</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modaltambah" class="btn btn-primary mt-2">Tambah <i class="ti ti-edit"></i></button>
                <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <form id="formModal" action="{{ route('a.tambah-medali') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Medali</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Kolat</label>
                                        <select name="id_kolat" id="nama_kolat"
                                            value="{{ old('nama_kolat') }}"
                                            class="form-select @error('nama_kolat') is-invalid @enderror" required>
                                            <option value="">-- pilih Kolat --</option>
                                            @foreach ($kolat as $item)
                                            <option value="{{ $item->id_kolat }}">{{ $item->nama_kontingen }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_kolat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Emas</label>
                                        <input type="number"
                                            class="form-control @error('emas') is-invalid @enderror"
                                            name="emas" id="emas" required>
                                        @error('emas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Perak</label>
                                        <input type="number"
                                            class="form-control @error('perak') is-invalid @enderror"
                                            name="perak" id="perak" required>
                                        @error('perak')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Perunggu</label>
                                        <input type="number"
                                            class="form-control @error('perunggu') is-invalid @enderror"
                                            name="perunggu" id="perunggu" required>
                                        @error('perunggu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                <table id="data_kolat" class="table table-striped display nowrap" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">Nama Kolat</th>
                            <th class="text-center">Emas</th>
                            <th class="text-center">Perak</th>
                            <th class="text-center">Perunggu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medali as $item)
                            <tr class="text-center">
                                <td class="text-center">{{ $item->kolat->nama_kontingen }}</td>
                                <td class="text-center">{{ $item->emas }}</td>
                                <td class="text-center">{{ $item->perak }}</td>
                                <td class="text-center">{{ $item->perunggu }}</td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="ti ti-edit"></i></button>
                                    <form id="deleteForm{{ $item->id }}" action="{{ route('a.delete-medali', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-2"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form id="formModal" action="{{ route('a.update-medali', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Medali</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Pilih Kolat</label>
                                                    <select name="nama_kolat" id="nama_kolat"
                                                        value="{{ old('nama_kolat') }}"
                                                        class="form-select @error('nama_kolat') is-invalid @enderror">
                                                        <option value="">-- pilih Kolat --</option>
                                                        @foreach ($kolat as $k)
                                                        <option @if ($k->nama_kontingen == $item->nama_kolat) selected @endif value="{{ $k->nama_kontingen }}">{{ $k->nama_kontingen }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('nama_kolat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Emas</label>
                                                    <input type="number"
                                                        class="form-control @error('emas') is-invalid @enderror"
                                                        name="emas" id="emas" value="{{ $item->emas }}">
                                                    @error('emas')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Perak</label>
                                                    <input type="number"
                                                        class="form-control @error('perak') is-invalid @enderror"
                                                        name="perak" id="perak" value="{{ $item->perak }}">
                                                    @error('perak')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Perunggu</label>
                                                    <input type="number"
                                                        class="form-control @error('perunggu') is-invalid @enderror"
                                                        name="perunggu" id="perunggu" value="{{ $item->perunggu }}">
                                                    @error('perunggu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah') {{-- validasi error --}}
@endsection