@extends('layouts.userlayouts')
@section('title','Surat Izin Siswa')
@section('content')
@section('style')
<style>
/* Bisa ditambah styling kalau ingin lebih rapi */
</style>
@endsection

<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ url('sekolah') }}" class="btn back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
            
            <div class="class-header">
                <div class="row align-items-center">
                    <div class="col-md-5 my-2">
                        <img src="{{ asset('foto/sklh.jpeg') }}" class="img-fluid" style="border-radius: 20px; max-height:200px;"  alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="display-4 fw-bold mb-2">Kelas 7A</h1>
                        <h3 class="fw-bold mt-1">Daftar Surat Izin Siswa</h3>
                        <p class="text-muted">Surat izin yang diajukan oleh orang tua / wali murid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Surat Izin Siswa</h5>

    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="izinTable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Orang Tua</th>
                        <th>Alasan</th>
                        <th>Lampiran</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis -->
                    <tr>
                        <td>1</td>
                        <td>2025-09-17</td>
                        <td>Andi Pratama</td>
                        <td>7A</td>
                        <td>Pak Budi</td>
                        <td>Sakit demam, disarankan dokter untuk istirahat 2 hari.</td>
                        <td><a href="#" class="btn btn-sm btn-info"><i class="bx bx-download"></i> Lihat</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2025-09-16</td>
                        <td>Citra Dewi</td>
                        <td>7C</td>
                        <td>Ibu Sari</td>
                        <td>Acara keluarga mendesak di luar kota.</td>
                        <td><a href="#" class="btn btn-sm btn-info"><i class="bx bx-download"></i> Lihat</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2025-09-15</td>
                        <td>Budi Santoso</td>
                        <td>7B</td>
                        <td>Pak Joko</td>
                        <td>Kontrol kesehatan rutin di rumah sakit.</td>
                        <td><a href="#" class="btn btn-sm btn-info"><i class="bx bx-download"></i> Lihat</a></td>
                    </tr>
                    <!-- Jika tidak ada data -->
                    <!--
                    <tr>
                        <td colspan="7" class="text-center">Belum ada surat izin</td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
