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
                <a href="{{ url('penilaian') }}" class="btn back-btn">
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
    <h5 class="card-header text-center">Mata Pelajaran</h5>
    <div class="card-body">
        <div class="row">
            <a href="{{ url('nilaisiswa') }}">
                <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                    <div class="card border border-primary px-2 py-3">
                        <h5 class="text-center fw-muted">Agama</h5>
                    </div>
                </div>
            </a>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">IPS</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">Pend Pancasila</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">B Inggris</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">B Indonesia</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">Seni Musik</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">Matematika</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">PJOK</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">IPA FISIKA</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">B Mandarin</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">IPA Biologi</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                <div class="card border border-primary px-2 py-3">
                    <h5 class="text-center fw-muted">INFORMATIKA</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
