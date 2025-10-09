@extends('layouts.userlayouts')
@section('title','Surat Izin Siswa')
@section('content')
@section('styles')
<style>
.back-btn {
    background: linear-gradient(135deg, #ff4d4d 0%, #b30000 100%);
    border: none;
    padding: 0.5rem 1.5rem;
    border-radius: 25px;
    color: white;
    transition: all 0.3s ease;
    text-decoration: none;
}

.back-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(108,117,125,0.3);
    background: linear-gradient(135deg, #e60000 0%, #800000 100%);
    color: white;
    text-decoration: none;
}
</style>
@endsection

<div class="container-fluid px-4 card">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 px-2 py-3">
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
                        <h1 class="display-4 fw-bold mb-2"> {{$isikelas->nam}} </h1>
                        <h3 class="fw-bold mt-1">Daftar Surat Izin Siswa</h3>
                        <p class="text-muted">Surat izin yang diajukan oleh orang tua / wali murid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
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
                        @if (isset($siswa) && $siswa->count() > 0)
                            <?php $no = 1; ?>
                            @foreach ($siswa as $k)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>2025-09-17</td>
                                <td>{{ $k->siswa->namlen }}</td>
                                <td>{{ $k->kelas->nam }}</td>
                                <td>Pak Budi</td>
                                <td>Sakit demam, disarankan dokter untuk istirahat 2 hari.</td>
                                <td><a href="#" class="btn btn-sm btn-info"><i class="bx bx-download"></i> Lihat</a></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">Belum ada surat izin</td>
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
