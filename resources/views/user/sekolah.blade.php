@extends('layouts.userlayouts')

@section('title','TOS')

@section('content')

@section('styles')
<style>

.classroom-card {
  border: 2px solid #007bff;
  border-radius: 10px;
  transition: all 0.3s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.classroom-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 15px rgba(0,123,255,0.3);
}

.classroom-info:hover {
  transform: translateY(-3px) !important;
  background-color: rgb(13, 97, 198) !important;
  color: white !important;  
  box-shadow: 0 4px 15px rgba(0,123,255,0.3) !important;
}

.classroom-card:hover h1{
  color:white !important;
}

.classroom-image {
  height: 150px;     
  max-height: 150px;   
  object-fit: cover;   
  border-radius: 5px;
  width: 100%;       
  display: block;
}

.classroom-name {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  text-align: center;
}

.classroom-name:hover{
  font-size: 18px;
  font-weight: bold;
  color: white;
  text-align:center;
}

.footer-info {
  font-size: 12px;
  padding: 5px 0;
}

.student-count {
  background-color: #e3f2fd;
  border: 1px solid #2196f3;
  border-radius: 15px;
  padding: 4px 8px;
  color: #1976d2;
}

.teacher-name {
  background-color: #f3e5f5;
  border: 1px solid #9c27b0;
  border-radius: 15px;
  padding: 4px 8px;
  color: #7b1fa2;
}
</style>
@endsection

<div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="header-section text-center">
          <h1 class="header-title">
            Sistem TOS
          </h1>
          <h2 class="secheader-title">Jenjang {{$jenjang->nam}} </h2>
          <p class="header-subtitle">Kelola dan Pantau Aktivitas Kelas dengan Mudah</p>
        </div>
      </div>
    </div>

  <div class="row mb-4">
    @foreach ($kelas as $k )
    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-4">
      <div class="card classroom-card">
        <a href="{{url('kelas/'.$k->id)}}">
          <div class="card-body p-3 position-relative">
            <img src="{{ asset('foto/sklh.jpeg') }}" alt="Kelas {{ $k->nam }}" class="classroom-image w-100 mb-3">
            <div class="classroom-info border border-primary p-2 rounded-3">
              <div class="classroom-name text-center"> {{ $k->nam }}  </div>
            </div>
          </div>
        </a>
        <div class="card-footer p-3">
          <div class="row g-2">
            <div class="col-6">
              <div class="info-section text-center">
                <span class="info-label">Total Murid</span>
                <div class="student-count text-primary"> {{ $k->jumlahsiswa_count}}  </div>
              </div>
            </div>
            <div class="col-6">
              <div class="info-section text-center">
                <span class="info-label">Wali Kelas</span>
                <div class="teacher-info text-danger" title="Bu Lisa Permata">Bu Lisa</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body text-center py-5 px-4">
          <div class="mb-3">
            <i class="bx bx-bell bx-tada text-primary" style="font-size: 3rem;"></i>
          </div>
          <h3 class="fw-bold text-primary mb-2">Pengumuman & Informasi</h3>
          <p class="text-muted mb-0">📢 Selamat datang di <span class="fw-bold">Sekolah TOS</span></p>
        </div>
      </div>
    </div>
  </div>


</div>


@endsection

@section('script')
<script>

</script>
@endsection