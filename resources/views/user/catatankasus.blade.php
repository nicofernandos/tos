@extends('layouts.userlayouts')
@section('title','TOS Catatan Kasus')
@section('content')

<div class="container-fluid px-4 card mb-2">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 py-2 px-3">
                <a href="{{ url('kelas/'.$isikelas->id) }}" class="btn btn-danger back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
            
            <div class="class-header">
                <div class="row align-items-center">
                    <div class="col-md-5 my-2">
                        <img src="{{ asset('foto/sklh.jpeg') }}" class="img-fluid" style="border-radius: 20px; max-height:200px;"  alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="display-4 fw-bold mb-2">Kelas {{$isikelas->nam}}</h1>
                        <h3 class="display-4 fw-bold mt-1">Catatan Kasus</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Data Siswa</h5>

    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-responsive table-striped table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kasus Terakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;  ?>
                    @foreach ($siswa as $q )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $q->nis  ?? '-' }}</td>
                        <td>{{ $q->nisn ?? '-' }}</td>
                        <td>
                            <a href="{{ url('catatankasussiswa/' . $q->id) }}" class="student-link">
                                {{ $q->namlen ?? 'Nama tidak tersedia' }}
                            </a>
                        </td>
                        <td> {{ $q->kel  }} </td>
                        <td>{{ $q->detail->ala }}</td>
                        <td> - </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection