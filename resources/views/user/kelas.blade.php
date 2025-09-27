@extends('layouts.userlayouts')
@section('title','TOS')
@section('content')
@section('style')
<style>
.class-header {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  color: white;
  padding: 2rem;
  border-radius: 15px;
  margin-bottom: 2rem;
  box-shadow: 0 4px 15px rgba(0,123,255,0.3);
}


.menu-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 20px rgba(0,123,255,0.25);
  border-color: #0056b3;
  background: #f8f9fa;
  text-decoration: none;
}

.menu-card {
  border: 2px solid #007bff;
  border-radius: 12px;
  transition: all 0.3s ease;
  cursor: pointer;
  background: white;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 120px;
  text-decoration: none;
}

.menu-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 25px rgba(0,123,255,0.3);
  border-color: #0056b3;
  text-decoration: none;
  color: inherit;
}

.menu-icon {
  font-size: 2.5rem;
  color: #007bff;
  margin-bottom: 0.5rem;
  transition: all 0.3s ease;
}

.menu-card:hover .menu-icon {
  color: #0056b3;
  transform: scale(1.1);
}

.menu-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2c3e50;
  text-align: center;
  margin: 0;
  transition: color 0.3s ease;
}

.menu-card:hover .menu-title {
  color: #1a202c;
}

.back-btn {
  background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
  border: none;
  padding: 0.5rem 1.5rem;
  border-radius: 25px;
  color: white;
  transition: all 0.3s ease;
}

.back-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(108,117,125,0.3);
  background: linear-gradient(135deg, #495057 0%, #343a40 100%);
  color: white;
}


.class-info {
  background: rgba(255,255,255,0.2);
  backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 1rem;
  margin-top: 1rem;
}

.stat-item {
  text-align: center;
  padding: 0.5rem;
}

.stat-number {
  font-size: 2rem;
  font-weight: bold;
  display: block;
}

.stat-label {
  font-size: 0.9rem;
  opacity: 0.9;
}

@media (max-width: 768px) {
  .menu-card {
    min-height: 100px;
  }
  
  .menu-icon {
    font-size: 2rem;
  }
  
  .menu-title {
    font-size: 1rem;
  }
  
  .class-header {
    padding: 1.5rem;
  }
}
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
                        <p class="lead mb-0">32 Murid</p>
                        <span class="text-muted">Wali Kelas : Pak Tarno</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('siswa') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-group menu-icon"></i>
                    <h5 class="menu-title">Data Siswa</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('absensisiswa')}}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-check-circle menu-icon"></i>
                    <h5 class="menu-title">Absensi Siswa</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('suratizin')  }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-file menu-icon"></i>
                    <h5 class="menu-title">Surat Izin Siswa</h5>
                </div>
            </a>
        </div>

    
        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('tugas') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-book-content menu-icon"></i>
                    <h5 class="menu-title">Tugas & Proyek</h5>
                </div>
            </a>
        </div>


        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('penilaian') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-trophy menu-icon"></i>
                    <h5 class="menu-title">Penilaian</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('catatankasus') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-note menu-icon"></i>
                    <h5 class="menu-title">Catatan Kasus</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('jurnalkonseling') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-chat menu-icon"></i>
                    <h5 class="menu-title">Jurnal Konseling</h5>
                </div>
            </a>
        </div>


        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('raport') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-medal menu-icon"></i>
                    <h5 class="menu-title">Rapor</h5>
                </div>
            </a>
        </div>

    
        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ url('info') }}" class="card menu-card d-block p-4">
                <div class="text-center">
                    <i class="bx bx-info-circle menu-icon"></i>
                    <h5 class="menu-title text-dark">Info</h5>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection