@extends('layouts.userlayouts')
@section('title','TOS Penilaian')
@section('content')
@section('styles')
<style>
.back-btn {
    background: linear-gradient(135deg, #ff4d4d 0%, #b30000 100%);
    color: white;
    border: none;
    padding: 0.6rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-weight: 500;
}

.back-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    background: linear-gradient(135deg, #e60000 0%, #800000 100%);
    color: white;
    text-decoration: none;
}

.nilai-input {
    width: 80px;
    text-align: center;
}
</style>
@endsection

<div class="card container-fluid px-1 mb-2">
    <div class="row mb-1">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 px-3 py-2">
                <a href="{{ url('penilaian/'.$isikelas->id) }}" class="btn back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Informasi Siswa -->
        <div class="col-12 mb-3">
            <div class="bg-light p-3 rounded">
                <h6 class="fw-bold text-primary mb-3">
                    <i class="bx bx-user me-2"></i>Informasi Siswa
                </h6>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                         <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Nama</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-muted text-dark"> {{$siswa->namlen}} </span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Nisn</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-muted text-dark"> {{$siswa->nisn}} </span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Nis</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-muted text-dark"> {{$siswa->nis}} </span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6  col-lg-3">
                                <span class="fw-medium">Kelas</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-medium text-dark"> {{$siswa->kel}} </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                         <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Tempat Lahir</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-muted text-muted"> {{$siswa->temlah ?? '-'}} </span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Tanggal Lahir</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-medium text-dark"> {{$siswa->tgllah}} </span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Alamat</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-medium text-dark"> {{$siswa->detail->ala}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <span class="fw-medium">Jenis Kelamin</span>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-9">
                                <span class="fw-medium text-dark">  
                                    @if ($siswa->jenkel == 1)
                                        Laki - Laki
                                    @elseif ($siswa->jenkel == 2)
                                        Perempuan
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header text-center">Mata Pelajaran</h5>
    <div class="card-body">
        <div class="row">
            @forelse($pelajaran as $p)
                <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                    <a href="{{url('nilaisiswa/'.$siswa->id.'/'.$p->id)}}">
                        <div class="card border border-primary px-2 py-3">
                            <h5 class="text-center fw-bold text-dark">{{ $p->nam }}</h5>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data mata pelajaran untuk kelas ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>




@endsection
@section('script')
@endsection
