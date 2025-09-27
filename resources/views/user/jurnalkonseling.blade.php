@extends('layouts.userlayouts')
@section('title','TOS Jurnal Konseling')
@section('content')

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
                        <h3 class="display-4 fw-bold mt-1">Jurnal Konseling</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Siswa</h5>
      <a href="" target="_blank" class="btn btn-sm btn-primary">
          <i class="bx bx-printer"></i> Download Jurnal Konseling
      </a>
  </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="siswaTable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data statis -->
                    <tr>
                        <td>1</td>
                        <td>202501</td>
                        <td>
                           <a href="{{ url('jurnalkonselingsiswa') }}">Andi Pratam</a>
                        </td>
                        <td>7A</td>
                        <td>Laki - Laki</td>
                        <td>Jl. Merdeka No. 12</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>202502</td>
                        <td>Budi Santoso</td>
                        <td>7B</td>
                        <td>Laki - Laki</td>
                        <td>Jl. Sudirman No. 45</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>202503</td>
                        <td>Citra Dewi</td>
                        <td>7C</td>
                        <td>Laki - Laki</td>
                        <td>Jl. Diponegoro No. 8</td>
                    </tr>
                    <!-- Jika tidak ada data -->
                    <!--
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data siswa</td>
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