@extends('layouts.userlayouts')
@section('title','TOS')
@section('content')
@section('style')
<style>
.back-btn {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
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
    background: linear-gradient(135deg, #495057 0%, #343a40 100%);
    color: white;
    text-decoration: none;
}

.class-header {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
    box-shadow: 0 4px 15px rgba(0,123,255,0.3);
}

.filter-card {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.badge-hadir {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 500;
}

.badge-izin {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 500;
}

.badge-sakit {
    background: linear-gradient(135deg, #17a2b8 0%, #6610f2 100%);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 500;
}

.badge-alpha {
    background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 500;
}

.stats-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}

.table th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
    color: #495057;
}

.table-striped tbody tr:nth-of-type(odd) {
    background: rgba(0,123,255,0.05);
}

.form-select, .form-control {
    border-radius: 8px;
    border: 1px solid #ced4da;
    transition: all 0.3s ease;
}

.form-select:focus, .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

.btn-filter {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
    border-radius: 8px;
    padding: 0.5rem 1.5rem;
    color: white;
    transition: all 0.3s ease;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,123,255,0.3);
    color: white;
}

.btn-reset {
    background: #6c757d;
    border: none;
    border-radius: 8px;
    padding: 0.5rem 1.5rem;
    color: white;
    transition: all 0.3s ease;
}

.btn-reset:hover {
    background: #545b62;
    transform: translateY(-1px);
    color: white;
}

@media (max-width: 768px) {
    .class-header {
        padding: 1.5rem;
    }
    
    .filter-card {
        padding: 1rem;
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
                        <img src="{{ asset('foto/sklh.jpeg') }}" class="img-fluid" style="border-radius: 20px; max-height:200px;" alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="display-4 fw-bold mb-2">Kelas 7A</h1>
                        <h3 class="display-4 fw-bold mt-1">Absensi Siswa</h3>
                        <p class="lead mb-0">Tahun Ajaran 2024/2025 • Semester Genap</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Absensi Siswa</h5>
      <a href="{{ url('cetaklaporanabsensi', request()->all()) }}" target="_blank" class="btn btn-sm btn-primary">
          <i class="bx bx-printer"></i> Cetak
      </a>
  </div>

  <div class="card-body">
      <!-- Filter Form -->
      <form method="GET" action="{{ url('laporanabsensi') }}" class="row g-3 mb-3">
          <div class="col-md-3">
              <label class="form-label">Tanggal Awal</label>
              <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
          </div>
          <div class="col-md-3">
              <label class="form-label">Tanggal Akhir</label>
              <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
          </div>
          <div class="col-md-3">
              <label class="form-label">Cari Siswa</label>
              <input type="text" name="cari" class="form-control" placeholder="Nama / NIS / Kelas" value="{{ request('cari') }}">
          </div>
          <div class="col-md-3 d-flex align-items-end">
              <button type="submit" class="btn btn-primary me-2">Filter</button>
              <a href="{{ url('laporanabsensi') }}" class="btn btn-secondary">Reset</a>
          </div>
      </form>

      <!-- Table -->
      <div class="table-responsive text-nowrap">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Data statis -->
                  <tr>
                      <td>1</td>
                      <td>202501</td>
                      <td>Andi Pratama</td>
                      <td>7A</td>
                      <td>2025-09-18</td>
                      <td>Hadir</td>
                      <td>-</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>202502</td>
                      <td>Budi Santoso</td>
                      <td>7B</td>
                      <td>2025-09-18</td>
                      <td>Izin</td>
                      <td>Sakit</td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>202503</td>
                      <td>Citra Dewi</td>
                      <td>7C</td>
                      <td>2025-09-18</td>
                      <td>Alpha</td>
                      <td>Tidak ada keterangan</td>
                  </tr>
              </tbody>
          </table>
      </div>

            
      <div class="mt-3">
          {{-- $data->links() --}}
      </div>
  </div>
</div>

@endsection
@section('script')
@endsection 