@extends('layouts.userlayouts')

@section('title','Pilih Jenjang Sekolah')

@section('styles')
<style>
.hero-section {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 60px 0;
  margin-bottom: 40px;
  border-radius: 15px;
  color: white;
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 15px;
  color:white;
}

.hero-subtitle {
  font-size: 1.1rem;
  opacity: 0.95;
}

.level-card {
  border: none;
  border-radius: 15px;
  transition: all 0.4s ease;
  min-height: 200px;
  flex-direction: column;
  display: flex;

  overflow: hidden;
  background: white;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.level-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.level-card-link {
  text-decoration: none;
  color: inherit;
  display: block;
  height: 100%;
}

.card-icon-wrapper {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.card-icon-wrapper::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 200%;
  height: 200%;
  background: rgba(255,255,255,0.1);
  transform: rotate(45deg);
}

.card-icon {
  font-size: 4rem;
  color: white;
  position: relative;
  z-index: 1;
}

.level-card-body {
  padding: 30px 25px;
  text-align: center;
  display: flex;
  flex-direction: coloumn;
  justify-content: space-between;
  text-align: center;
}

.level-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 10px;
  display: flex;
  justify-content: center;
}

.level-description {
  color: #666;
  font-size: 0.95rem;
  margin-bottom: 15px;
}

.level-badge {
  display: inline-block;
  padding: 6px 20px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  margin-top:auto;
}

/* Warna berbeda untuk setiap jenjang */
.level-card.pg .card-icon-wrapper,
.level-card.pg .level-badge {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.level-card.sd .card-icon-wrapper,
.level-card.sd .level-badge {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.level-card.smp .card-icon-wrapper,
.level-card.smp .level-badge {
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}

.level-card.sma .card-icon-wrapper,
.level-card.sma .level-badge {
  background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}

.info-section {
  background: white;
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.info-icon {
  font-size: 2.5rem;
  color: #667eea;
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 1.8rem;
  }
  
  .hero-subtitle {
    font-size: 1rem;
  }
  
  .card-icon {
    font-size: 3rem;
  }
  
  .level-title {
    font-size: 1.3rem;
  }
}
</style>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Hero Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="hero-section text-center">
        <h1 class="hero-title">
          <i class="bx bx-buildings me-2"></i>
          Selamat Datang di Sistem TOS
        </h1>
        <p class="hero-subtitle">Pilih jenjang sekolah untuk melanjutkan</p>
      </div>
    </div>
  </div>

  <!-- Level Cards -->
  <div class="row g-4 mb-5">
    @foreach ($jenjang as $j )
    <div class="col-12 col-sm-6 col-lg-3 justify-content-center">
        <div class="level-card {{strtolower($j->nam)}} ">
            <a href="{{url('sekolah',['tin' => $j->id])}}" class="level-card-link">
                <div class="card-icon-wrapper">
                    @switch($j->kod)
                        @case('1') 
                            <i class="bx bx-happy-heart-eyes card-icon"></i>
                        @break

                        @case('2')
                            <i class="bx bx-happy card-icon"></i>
                        @break

                        @case('3')
                            <i class="bx bx-book-open card-icon"></i>
                        @break

                        @case('4')
                            <i class="bx bx-book-reader card-icon"></i>
                        @break

                        @case('5')
                            <i class="bx bx-user-voice card-icon"></i>
                        @break

                        @default 
                            <i class="bx bx-layer card-icon"></i>
                    @endswitch

                </div>
                <div class="level-card-body d-flex align-items-center justify-content-center text-center">
                  <h3 class="level-title text-center">{{ strtoupper($j->nam) }}</h3>
                </div>

            </a>
        </div>
    </div>
        
    @endforeach

  </div>

  <!-- Info Section -->
  <div class="row">
    <div class="col-12">
      <div class="info-section text-center">
        <div class="mb-3">
          <i class="bx bx-info-circle info-icon"></i>
        </div>
        <h4 class="fw-bold text-dark mb-2">Informasi Sistem</h4>
        <p class="text-dark mb-0">
          Sistem TOS membantu Anda mengelola dan memantau aktivitas kelas dari semua jenjang pendidikan secara terpadu
        </p>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script>
// Script tambahan jika diperlukan
$(document).ready(function() {
  // Animasi hover effect tambahan
  $('.level-card').hover(
    function() {
      $(this).find('.card-icon').addClass('bx-tada');
    },
    function() {
      $(this).find('.card-icon').removeClass('bx-tada');
    }
  );
});
</script>
@endsection