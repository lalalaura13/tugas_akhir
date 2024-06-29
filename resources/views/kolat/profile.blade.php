@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4 text-primary">Profile</h5>
                <div class="row">
                    <div class="col-md-4">
                            @if ($user->image)
                                <img src="{{ $user->image }}" class="d-block mr-3 rounded-circle mb-3" height="200" width="200" alt="Foto Profil">
                            @else
                                <img src="{{ asset('img/profile.svg') }}" height="150" width="150" class="card-img-top" alt="Foto Profil">
                            @endif
                            {{-- <img src="https://via.placeholder.com/300" class="card-img-top" alt="Foto Profil"> --}}
                            <form action="{{ route('k.update-foto') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <input class="form-control me-2" type="file" id="image" name="image" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                </div>
                            </form>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Informasi Pribadi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="update-tab" data-bs-toggle="tab" data-bs-target="#update-tab-pane" type="button" role="tab" aria-controls="update-tab-pane" aria-selected="false">update Profile</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <h5 class="card-title">Informasi Pribadi</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Nama Kontingen:</strong>    {{ $user->nama_kontingen }}</li>
                                            <li class="list-group-item"><strong>Nama Pelatih 1:</strong>    {{ $user->nama_pelatih_1 }}</li>
                                            <li class="list-group-item"><strong>Nama Pelatih 2:</strong>    {{ $user->nama_pelatih_2 }}</li>
                                            <li class="list-group-item"><strong>Email:</strong> {{ $user->users->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="update-tab-pane" role="tabpanel" aria-labelledby="update-tab" tabindex="0">
                                        <h5 class="card-title">Update Profile</h5>
                                        <form action="{{ route('k.update-profile') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Nama Kontingen</label>
                                                <input type="text" name="nama_kontingen" value="{{ $user->nama_kontingen }}" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Nama Pelatih 1</label>
                                                <input type="text" name="nama_pelatih_1" value="{{ $user->nama_pelatih_1 }}" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Nama Pelatih 2</label>
                                                <input type="text" name="nama_pelatih_2" value="{{ $user->nama_pelatih_2 }}" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->users->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Media Sosial</h5>
                                <a href="https://facebook.com" class="btn btn-primary" target="_blank">Facebook</a>
                                <a href="https://twitter.com" class="btn btn-info" target="_blank">Twitter</a>
                                <a href="https://instagram.com" class="btn btn-danger" target="_blank">Instagram</a>
                                <a href="https://linkedin.com" class="btn btn-secondary" target="_blank">LinkedIn</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('assets.js.notifikasi-berhasil')
@endsection
