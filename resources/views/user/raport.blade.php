@extends('layouts.userlayouts')
@section('title','TOS Raport Siswa')
@section('styles')
<style>
.back-btn{
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
.back-btn:hover{
    transform: translateY(-2);
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
    text-decoration: underline;
  
</style>
@endsection



@section('content')

<div class="container-fluid px-4">
    <div class="row mb-4 card px-2 py-3">
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
                        <h1 class="display-4 fw-bold mb-2">Kelas {{$isikelas->nam}} </h1>
                        <h3 class="display-4 fw-bold mt-1">Raport Siswa</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Siswa</h5>
      {{-- <a href="" target="_blank" class="btn btn-sm btn-primary">
          <i class="bx bx-printer"></i> Download Jurnal Konseling
      </a> --}}
  </div>
    <div class="card-body">
        @if(isset($siswa) && $siswa->count() > 0 )
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped table-bordered dt-responsive nowrap w-100 ">
                <thead class="text-bold text-dark">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran </th>
                        <th>Jenis Raport</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($siswa as $key)
                        <tr>
                            <td>
                            {{ $no++ }}
                            </td>
                            <td> {{$key->siswa->nis}} </td>
                            <td> {{$key->siswa->nisn}} </td>
                            <td> 
                                <a href="{{ url('raportsiswa/'.$isikelas->id.'/'.$key->siswa->id) }}" class="student-link">
                                    {{$key->siswa->namlen}} 
                                </a>
                            </td>
                            <td> {{$key->siswa->kel}} </td>
                            <td> {{$key->tahunajaran->nam }} </td>
                            <td> Mid Semester Ganjil </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else 
        <div class="text-center py-5">
            <i class="bx bx-user-x" style="font-size: 4rem; color: #6c757d;"></i>
            <h4 class="mt-3 text-muted">Belum ada data siswa</h4>
            <p class="text-muted">Data siswa untuk kelas ini belum tersedia.</p>
        </div>
        @endif
    </div>
</div>

@endsection
@section('script')
@endsection