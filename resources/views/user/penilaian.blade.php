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

<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ url('kelas') }}" class="btn back-btn">
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
                        <h3 class="display-4 fw-bold mt-1">Tabel Penilaian Siswa</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Penilaian</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="siswaTable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis -->
                    <tr>
                        <td>1</td>
                        <td>202501</td>
                        <td> <a href="{{ url('penilaiansiswa') }}">Andi Pratama</a></td>
                        <td>7A</td>
                        <td>Laki - Laki</td>
                        <td>Jl. Merdeka No. 12</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">80</td>
                        <td class="text-center">-</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>202502</td>
                        <td>Budi Santoso</td>
                        <td>7A</td>
                        <td>Laki - Laki</td>
                        <td>Jl. Sudirman No. 45</td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center">65</td>
                        <td class="text-center"> -</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>202503</td>
                        <td>Citra Dewi</td>
                        <td>7A</td>
                        <td>Perempuan</td>
                        <td>Jl. Diponegoro No. 8</td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center">90</td>
                        <td class="text-center">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
