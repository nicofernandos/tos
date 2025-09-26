@extends('layouts.userlayouts')
@section('title','TOS Penilaian')
@section('content')
@section('style')
<style>
    .nilai-input {
        width: 80px;
        text-align: center;
    }
</style>
@endsection

<div class="container-fluid px-1">
    <div class="row mb-1">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ url('sekolah') }}" class="btn back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card mb-2">
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
                        <span class="fw-muted text-muted">Andre</span>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <span class="fw-medium">Tanggal Lahir</span>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-10">
                        <span class="fw-medium text-muted">10-20-12</span>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-6 col-md-6  col-lg-2">
                        <span class="fw-medium">Kelas</span>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-10">
                        <span class="fw-medium text-muted">7A</span>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <span class="fw-medium">Alamat</span>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-10">
                        <span class="fw-medium text-muted">Jl. Merdeka No. 12</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="card">
    <h5 class="card-header text-center">Mata Pelajaran Agama</h5>
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