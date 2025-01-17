{{-- TABs PANEL PUTRA dan PUTRI --}}
<ul class="nav nav-tabs justify-content-center fw-semibold" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#PutraUsiadini" type="button" role="tab" aria-controls="PutraUsiadini" aria-selected="true">Putra</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#PutriUsiadini" type="button" role="tab" aria-controls="PutriUsiadini" aria-selected="false">Putri</button>
    </li>
</ul>

{{-- ISI TABs PUTRA dan PUTRI --}}
{{-- PUTRA --}}
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active mt-1" id="PutraUsiadini" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="row">
            @foreach ($baganPutraUsiaDini as $item)
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-cotent-center align-items-center">
                            <h5 class="card-title fw-semibold text-uppercase mb-4">{{ $item->kategori }}</h5>
                            @if (Auth()->user()->role_id == 2)
                            <a href="{{ route('k.detail-bagan', ['id' => $item->id]) }}" class="btn btn-success ms-2 btn-sm me-2" >Detail</i></a>
                            @elseif (Auth()->user()->role_id == 1)
                            <a href="{{ route('a.detail-bagan', ['id' => $item->id]) }}" class="btn btn-success ms-2 btn-sm me-2" >Detail</a>
                                <form id="deleteForm{{ $item->id }}" class="ms-auto" action="{{ route('a.delete-bagan', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm"><i class="ti ti-trash"></i></button>
                                </form>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr class="text-center">
                                        <th><h6>Sudut Merah</h6></th>
                                        <th><h6>VS</h6></th>
                                        <th><h6>Sudut Biru</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->detailBagan as $dt)
                                        <tr class="text-center">
                                            <td>{{ $dt->sudut_merah }}</td>
                                            <td>vs</td>
                                            <td>{{ $dt->sudut_biru }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('assets.js.sweatalert-delete')
            @endforeach
        </div>
    </div>
    {{-- PUTRI --}}
    <div class="tab-pane fade mt-1" id="PutriUsiadini" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="row">
            @foreach ($baganPutriUsiaDini as $item)
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-cotent-center align-items-center">
                            <h5 class="card-title fw-semibold text-uppercase mb-4">{{ $item->kategori }}</h5>
                            @if (Auth()->user()->role_id == 2)
                            <a href="{{ route('k.detail-bagan', ['id' => $item->id]) }}" class="btn btn-success ms-2 btn-sm me-2" >Detail</i></a>
                            @elseif (Auth()->user()->role_id == 1)
                            <a href="{{ route('a.detail-bagan', ['id' => $item->id]) }}" class="btn btn-success ms-2 btn-sm me-2" >Detail</a>
                                <form id="deleteForm{{ $item->id }}" class="ms-auto" action="{{ route('a.delete-bagan', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm"><i class="ti ti-trash"></i></button>
                                </form>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr class="text-center">
                                        <th><h6>Sudut Merah</h6></th>
                                        <th><h6>VS</h6></th>
                                        <th><h6>Sudut Biru</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->detailBagan as $dt)
                                        <tr class="text-center">
                                            <td>{{ $dt->sudut_merah }}</td>
                                            <td>vs</td>
                                            <td>{{ $dt->sudut_biru }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('assets.js.sweatalert-delete')
            @endforeach
        </div>
    </div>
</div>