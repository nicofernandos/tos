@extends('layouts.userlayouts')
@section('title','Detail Siswa')
@section('content')
@section('styles')
<style>
.profile-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.profile-photo {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    object-fit: cover;
}

.student-name {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: white;
}

.student-id {
    font-size: 1rem;
    opacity: 0.9;
    background: rgba(255,255,255,0.2);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    display: inline-block;
}

.info-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.card-header-custom {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 2px solid #dee2e6;
    padding: 1.2rem 1.5rem;
}

.card-header-custom h5 {
    margin: 0;
    color: #495057;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.card-header-custom i {
    margin-right: 0.5rem;
    color: #6f42c1;
}

.info-row {
    padding: 0.8rem 0;
    border-bottom: 1px solid #f8f9fa;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #495057;
    font-size: 0.9rem;
}

.info-value {
    color: #212529;
    font-size: 1rem;
}

.status-badge {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    border: none;
}

.status-inactive {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
}

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

.stats-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    border: 2px solid #e3f2fd;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-3px);
    border-color: #2196f3;
    box-shadow: 0 8px 25px rgba(33, 150, 243, 0.2);
}

.stats-number {
    font-size: 2rem;
    font-weight: 700;
    color: #2196f3;
    margin-bottom: 0.5rem;
}

.stats-label {
    color: #6c757d;
    font-size: 0.9rem;
    font-weight: 500;
}

.academic-info {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    border-left: 4px solid #ffc107;
    padding: 1rem;
    border-radius: 8px;
    margin: 1rem 0;
}


@media (max-width: 768px) {
    .profile-header {
        padding: 1.5rem;
        text-align: center;
    }
    
    .profile-photo {
        width: 100px;
        height: 100px;
        margin-bottom: 1rem;
    }
    
    .student-name {
        font-size: 1.5rem;
    }
}
</style>
@endsection

<div class="container-fluid px-4 card">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 mt-2 px-2 py-3">
                <a href="{{ url('siswa/'.$namakelas) }}" class="btn  back-btn">
                    <i class="bx bx-arrow-back me-2"></i> Kembali ke Daftar Siswa
                </a>
            </div>
        </div>
    </div>

    <!-- Profile Header -->
    <div class="row">
        <div class="col-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center text-md-start">
                        @if ($detailsiswa->detailsiswa && isset($detailsiswa->detailsiswa->img_base64))
                            <img src="data:image/jpeg;base64,{{ $detailsiswa->detailsiswa->img_base64 }}" 
                                alt="Foto Siswa" 
                                class="img-fluid rounded rounded-sm" 
                                style="max-width: 200px; height: auto;">
                        @else
                           <img src="{{ asset('foto/noprof.jpg') }}" alt="Foto Siswa" class="img-fluid rounded rounded-lg" style="max-width: 200px; height:auto;">   
                        @endif
                    </div>
                    <div class="col-md-6 text-center text-md-start mt-3 mt-md-0">
                        <h1 class="student-name">{{ $detailsiswa->namlen }}</h1>
                        <div class="student-id">NIS: {{$detailsiswa->nis}} </div>
                        <div class="student-id mt-2">NISN: {{$detailsiswa->nisn}} </div>
                        <p class="mb-2 mt-2">Siswa Kelas {{$detailsiswa->kel}} - Tahun Ajaran {{ $detailsiswa->kelas->tahunajaran->nam }} </p>
                    </div>
                    {{-- <div class="col-md-3 text-center text-md-end mt-3 mt-md-0">
                        <span class="status-badge">
                            <i class="bx bx-check-circle me-1"></i>
                            Siswa Aktif
                        </span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    {{-- <div class="row mb-4">
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-number">85</div>
                <div class="stats-label">Rata-rata Nilai</div>
            </div>
       </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-number">95%</div>
                <div class="stats-label">Kehadiran</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-number">12</div>
                <div class="stats-label">Mata Pelajaran</div>
            </div>
        </div> 
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-number">3</div>
                <div class="stats-label">Semester</div>
            </div>
        </div>
    </div> --}}

    <div class="row mt-4">
        <!-- Data Personal -->
        <div class="col-md-6 mb-4">
            <div class="card info-card">
                <div class="card-header card-header-custom">
                    <h5><i class="bx bx-user"></i>Data Personal</h5>
                </div>
                <div class="card-body p-0">
                    <div class="p-3">
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Nama Lengkap</span></div>
                                <div class="col-7"><span class="info-value"> {{$detailsiswa->namlen}} </span></div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">NISN</span></div>
                                <div class="col-7"><span class="info-value"> {{$detailsiswa->nisn}} </span></div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Tempat Lahir</span></div>
                                <div class="col-7"><span class="info-value"> {{$detailsiswa->temlah ?? '-'}} </span></div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Tanggal Lahir</span></div>
                                <div class="col-7"><span class="info-value">   {{ \Carbon\Carbon::parse($detailsiswa->tgllah)->format('d/m/Y') }} </span></div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Jenis Kelamin</span></div>
                                    <div class="col-7">
                                        <span class="info-value">
                                            @if ($detailsiswa->jenkel == 1)
                                                Laki - Laki
                                            @elseif ($detailsiswa->jenkel == 2)
                                                Perempuan
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Agama</span></div>
                                <div class="col-7"><span class="info-value">Islam</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="col-md-6 mb- carder">
            <div class="card info-card" style="height: 253px;">
                <div class="card-header card-header-custom">
                    <h5><i class="bx bx-phone"></i>Informasi Kontak</h5>
                </div>
                <div class="card-body p-0">
                    <div class="p-3">
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Alamat</span></div>
                                <div class="col-7"><span class="info-value"> {{ $detailsiswa->detailsiswa->ala ?? 'Tidak ada Alamat' }} </span></div>
                            </div>
                        </div>
                        {{-- <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Kelurahan</span></div>
                                <div class="col-7"><span class="info-value">Bukit Baru</span></div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Kecamatan</span></div>
                                <div class="col-7"><span class="info-value">Ilir Barat I</span></div>
                            </div>
                        </div> --}}
                        <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">No. Telepon</span></div>
                                <div class="col-7"><span class="info-value"> {{$detailsiswa->tel}} </span></div>
                            </div>
                        </div>
                        {{-- <div class="info-row">
                            <div class="row">
                                <div class="col-5"><span class="info-label">Email</span></div>
                                <div class="col-7"><span class="info-value">andi.pratama@student.sch.id</span></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 mb-4">
            <div class="card info-card">
                <div class="card-header card-header-custom">
                    <h5><i class="bx bx-group"></i>Data Orang Tua</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Data Ayah -->
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="p-3">
                                <h6 class="text-primary mb-3">Data Ayah</h6>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">Nama Ayah</span></div>
                                        <div class="col-7"><span class="info-value">Budi Pratama</span></div>
                                    </div>
                                </div>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">Pekerjaan</span></div>
                                        <div class="col-7"><span class="info-value">Pegawai Swasta</span></div>
                                    </div>
                                </div>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">No. Telepon</span></div>
                                        <div class="col-7"><span class="info-value">0811-2345-6789</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Data Ibu -->
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="p-3">
                                <h6 class="text-primary mb-3">Data Ibu</h6>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">Nama Ibu</span></div>
                                        <div class="col-7"><span class="info-value">Sari Dewi</span></div>
                                    </div>
                                </div>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">Pekerjaan</span></div>
                                        <div class="col-7"><span class="info-value">Ibu Rumah Tangga</span></div>
                                    </div>
                                </div>
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-5"><span class="info-label">No. Telepon</span></div>
                                        <div class="col-7"><span class="info-value">0812-9876-5432</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
@section('script')
@endsection