@extends('layouts.userlayouts')
@section('title','TOS Penilaian')
@section('content')
@section('style')
<style>

.nilai-input {
    width: 80px;
    text-align: center;
}
.student-link{
    color:#667eea;
    text-decoration: none;
    font-weight:500;
}
.student-link:hover {
    color : #764ba2;
    text-decoration: underline
}
</style>
@endsection

<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ url('kelas/'.$isikelas->id) }}" class="btn back-btn">
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
        @if(isset($siswa) && $siswa->count() > 0)
            <div class="table-responsive text-nowrap">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $q)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $q->nis }}</td>
                                <td>{{ $q->nisn }}</td>
                                <td> 
                                    <a href="{{ url('datasiswa/'. $q->id) }} " class="student-link">
                                    {{ $q->namlen ?? 'Nama siswa tidak tersedia' }}
                                    </a>
                                </td>
                                <td>{{ $q->kel }}</td>
                                <td>{{ $q->jenkel == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">80</td>
                                <td class="text-center">-</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bx bx-user-x" style="font-size:4rem; color: #6c757d;"></i>
                <h4 class="mt-3 text-muted">Belum ada data siswa</h4>
                <p class="text-muted">Data siswa untuk kelas ini belum tersedia.</p>
            </div>
        @endif
    </div>
</div>

@endsection
@section('script')
@endsection
