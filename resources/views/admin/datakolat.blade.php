@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="col-9">
                    <h2>Daftar Kolat</h2>
                </div>
                <table id="data_kolat" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">Nama Kelompok Latihan</th>
                            <th class="text-center">Nama Pelatih 1</th>
                            <th class="text-center">Nama Pelatih 2</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kolat as $u)
                        <tr class="text-center">
                            <td>{{ $u->nama_kontingen }}</td>
                            <td>{{ $u->nama_pelatih_1 }}</td>
                            <td>{{ $u->nama_pelatih_2 }}</td>
                            <td class="d-flex justify-content-center">
                                <form id="formReset{{ $u->id_kolat }}" action="{{ route('a.reset-password', ['id_kolat' => $u->id_kolat]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-primary "><i class="ti ti-repeat"></i></button>
                                </form>

                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#editModal"><i class="ti ti-edit"></i></button>

                                <form id="deleteForm{{ $u->id_kolat }}" action="{{ route('a.delete-kolat', ['id_kolat' => $u->id_kolat]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger ms-2"><i class="ti ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        {{-- Sweetalert Delete Form B --}}
                        <script>
                            $(document).ready(function(){
                                $('#deleteForm{{ $u->id_kolat }}').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: "Anda tidak akan dapat mengembalikan ini!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus saja!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Submit form manually
                                            this.submit();
                                        }
                                    });
                                });
                            });
                            $(document).ready(function(){
                                $('#formReset{{ $u->id_kolat }}').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Apakah Anda yakin ingin mereset password?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, reset saja!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Submit form manually
                                            this.submit();
                                        }
                                    });
                                });
                            });
                        </script>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kelompok Latihan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('a.update-kolat', ['id_kolat' => $u->id_kolat]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kelompok Latihan</label>
                                            <input type="text" class="form-control" id="" name="nama_kontingen" value="{{ $u->nama_kontingen }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Pelatih 1</label>
                                            <input type="text" class="form-control" id="" name="nama_pelatih_1" value="{{ $u->nama_pelatih_1 }}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Pelatih 2</label>
                                            <input type="text" class="form-control" id="" name="nama_pelatih_2" value="{{ $u->nama_pelatih_2 }}" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                        <div class="card-body">
                            <table id="data_formB" class="table table-striped display nowrap" style="width: 100%">
                                
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Kontingen</th>
                                        <th class="text-center">Nama Form B</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formB as $item)
                                        <tr class="text-center">
                                            <td class="text-center">{{ $item->nama_kontingen }}</td>
                                            <td class="text-center">{{ !empty($item->nama_form_B) ? $item->nama_form_B : '-' }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if (!empty($item->nama_form_B))
                                                    <a href="{{ $item->image }}" target="_blank" class="btn btn-rounded btn-sm btn-primary btn-xs">Lihat</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
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