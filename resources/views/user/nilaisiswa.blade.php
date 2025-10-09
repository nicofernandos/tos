@extends('layouts.userlayouts')
@section('title','TOS Penilaian')
@section('content')
@section('styles')
<style>
.back-btn{
    background: linear-gradient(135deg,#ff4d4d 0%, #b30000 100%);
    color: white;
    border:none;
    padding: 0.6rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-weight: 500;
}

.back-btn:hover {
    transform: translateX(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    background: linear-gradient(135deg, #e60000 0%, #800000 100%);
    color: white;
    text-decoration: none;
}

.card-header-child{
    color:black;
}

.nilai-input {
    width: 80px;
    text-align: center;
}
</style>
@endsection

<div class="container-fluid px-1">
    <div class="card mb-1">
        <div class="row mb-1">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 px-2 py-3">
                    <a href="{{ url('penilaiansiswa/' . $siswa->id) }}" class="btn back-btn">
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

                    <div class="row mb-2">
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            <span class="fw-medium">Nama</span>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-10">
                            <span class="fw-muted text-muted"> {{$siswa->namlen}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            <span class="fw-medium">Tanggal Lahir</span>
                        </div>
                        <div class="col-sm-6 col-md-6  col-lg-10">
                            <span class="fw-medium text-muted"> {{$siswa->tgllah}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-6 col-md-6  col-lg-2">
                            <span class="fw-medium">Kelas</span>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-10">
                            <span class="fw-medium text-muted"> {{$siswa->kel}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            <span class="fw-medium">Alamat</span>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-10">
                            <span class="fw-medium text-muted"> {{$siswa->detail->ala ?? '-'}} </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<div class="card">
    <h5 class="card-header text-center">Mata Pelajaran {{$pelajaran->nam}} </h5>
    <h6 class="card-header-child text-center">Kelas {{$pelajaran->kelas->nam}} </h6>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-control mb-2" for=""> Jenis Nilai  </label>
            <div class="col-sm-10">
                <input type="text" name="jenisnilai" class="form-control" id="" value="" placeholder="Jenis Nilai">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-control mb-2" for=""> Nilai  </label>
            <div class="col-sm-10">
                <input type="number" name="nilai" class="form-control" id="" value="" placeholder="Masukkan Nilai">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <button type="sumbit" class="btn btn-primary me-2">Simpan</button>
                <a href="" class="btn btn-danger"> Batal </a>
            </div>
        </div>

    </div>
</div>

@endsection
@section('script')
@endsection