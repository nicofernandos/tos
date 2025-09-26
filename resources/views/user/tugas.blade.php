@extends('layouts.userlayouts')
@section('title','Tambah Tugas & Proyek')
@section('content')

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
                        <h3 class="display-4 fw-bold mt-1">Tugas dan Proyek</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tugas & Proyek</h5>
      </div>
      <div class="card-body">
        <form action="{{ url('') }}" method="POST" enctype="multipart/form-data">
          @csrf


          {{-- Kode Tugas --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" name="matapelajaran" class="form-control" value="" required>
            </div>
          </div>

          {{-- Tanggal Pengungasan --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal Pengugasan</label>
            <div class="col-sm-10">
              <input type="date" name="tglpenugasan" class="form-control" value="{{ date('Y-m-d') }}" readonly>
            </div>
          </div>
          
          {{-- Tanggal Pengumpulan --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal Pengugasan</label>
            <div class="col-sm-10">
              <input type="date" name="tglpengumpulan" class="form-control" value="{{ date('Y-m-d') }}" >
            </div>
          </div>

          {{-- Judul Tugas --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Judul Tugas</label>
            <div class="col-sm-10">
              <input type="text" name="judul" class="form-control" placeholder="Masukkan judul tugas" required>
            </div>
          </div>

          {{-- Deskripsi --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi tugas atau proyek"></textarea>
            </div>
          </div>

          {{-- Lampiran --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Lampiran</label>
            <div class="col-sm-10">
              <input type="file" name="lampiran" class="form-control">
            </div>
          </div>

          <hr>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ url('tugas') }}" class="btn btn-secondary">Batal</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection
