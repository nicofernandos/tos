@extends('layouts.userlayouts')
@section('title','TOS Catatan Kasus')

@section('styles' )
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
.student-link{
    color:#667eea;
    text-decoration: none;
    font-weight:500;
}
.student-link:hover {
    color : #764ba2;
  
</style>
@endsection

@section('content')

<div class="container-fluid px-4 card mb-2">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 py-2 px-3">
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
                        <td>{{ $q->siswa->nis  ?? '-' }}</td>
                        <td>{{ $q->siswa->nisn ?? '-' }}</td>
                        <td>
                            <a href="{{ url('catatankasussiswa/' . $q->siswa->id) }}" class="student-link">
                                {{ $q->siswa->namlen ?? 'Nama tidak tersedia' }}
                            </a>
                        </td>
                        <td> {{ $q->siswa->kel  }} </td>
                        <td>{{ $q->detailsiswa->ala }}</td>
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