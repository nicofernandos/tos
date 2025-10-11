@extends('layouts.userlayouts')
@section('title','TOS Penilaian')

@section('styles')
<style>
.back-btn {
    background: linear-gradient(135deg,#ff4d4d 0%, #b30000 100%);
    color: white;
    border:none;
    padding: 0.6rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-weight: 500;
}
.back-btn:hover {
    transform: translateX(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    background: linear-gradient(135deg, #e60000 0%, #800000 100%);
    color: white;
    text-decoration: none;
}
.card-header-child { color:black; }
.nilai-input { width: 80px; text-align: center; }

.btn-tambah {
    min-width: 260px;
    padding: 20px 10px 20px 10px;
    height: 25px;
    font-weight: 300;
    border-radius: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.btn-tambah i{
    font-size: 20px;
}

.btn-tambah-success {
    background: linear-gradient(135deg, #3a8ef6 0%, #0056d2 100%);
    color: #fff;
    border: none;
}

.btn-tambah-success:hover {
    background: linear-gradient(135deg, #0056d2 0%, #0041a8 100%);
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(0, 86, 210, 0.4);
}   

</style>
@endsection

@section('content')
<div class="container-fluid px-1">
    <div class="card mb-1">
        <div class="row mb-1">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 px-2 py-3">
                    <a href="{{ url('penilaiansiswa/' . $siswa->id) }}" class="btn back-btn">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Informasi Siswa -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-light p-3 rounded">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-user me-2"></i>Informasi Siswa</h6>
                    <div class="row mb-2"><div class="col-lg-2 fw-medium">Nama</div><div class="col-lg-10 fw-bold">{{$siswa->namlen}}</div></div>
                    <div class="row mb-2"><div class="col-lg-2 fw-medium">Tanggal Lahir</div><div class="col-lg-10 fw-bold">{{$siswa->tgllah}}</div></div>
                    <div class="row mb-2"><div class="col-lg-2 fw-medium">Kelas</div><div class="col-lg-10 fw-bold">{{$siswa->kel}}</div></div>
                    <div class="row mb-2"><div class="col-lg-2 fw-medium">Alamat</div><div class="col-lg-10 fw-bold">{{$siswa->detail->ala ?? '-'}}</div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ url('/nilaisiswasimpan') }}" method="POST">
    @csrf
    <!-- hidden field -->
    <input type="hidden" name="idta" value="{{ $pelajaran->idta }}">
    <input type="hidden" name="idk" value="{{ $pelajaran->idk }}">
    <input type="hidden" name="idkel" value="{{ $pelajaran->kelas->id }}">
    <input type="hidden" name="idsis" value="{{ $siswa->id }}">
    <input type="hidden" name="idpel" value="{{ $pelajaran->id }}">

    <div class="card">
        <h5 class="card-header text-center">Mata Pelajaran {{ $pelajaran->nam }}</h5>
        <h6 class="card-header-child text-center">Kelas {{ $pelajaran->kelas->nam }}</h6>
        <div class="card-body">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                    <input type="number" name="nilai" class="form-control" placeholder="Masukkan Nilai">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="ket" class="form-control" rows="2" placeholder="Keterangan"></textarea>
                </div>
            </div>

            <hr>
            
            <!-- Tombol Toggle Komponen Penilaian -->
            <div class="mb-3">
                <button type="button" id="btn-toggle-komponen" class="btn btn-tambah btn-tambah-success">
                    <i class="bx bx-plus-circle me-1"></i> Tambah Komponen Penilaian
                </button>
            </div>

            <!-- Section Komponen Penilaian (Hidden by default) -->
            <div id="komponen-section">
                <h6 class="text-primary">Komponen Penilaian</h6>

                <div id="komponen-wrapper">
                    <div class="row mb-2 komponen-row">
                        <div class="col-md-4">
                            <input type="text" name="komponen[]" class="form-control" placeholder="Komponen">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="skor[]" class="form-control" placeholder="Skor">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="ket1[]" class="form-control" placeholder="Keterangan Komponen">
                        </div>
                    </div>
                </div>

                <button type="button" id="btn-tambah-komponen" class="btn btn-sm btn-outline-primary mb-3">
                    <i class="bx bx-plus me-1"></i> Tambah Komponen Lainnya
                </button>

                <hr>
            </div>

            <!-- Tombol Toggle Kategori Nilai -->
            <div class="mb-3">
                <button type="button" id="btn-toggle-kategori" class="btn btn-tambah btn-tambah-success">
                    <i class="bx bx-plus-circle me-1"></i> Tambah Kategori Nilai
                </button>
            </div>

            <!-- Section Kategori Nilai (Hidden by default) -->
            <div id="kategori-section">
                <h6 class="text-primary">Kategori Nilai</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" name="kat" class="form-control" placeholder="Kategori (misal: Sikap)">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="predi" class="form-control" placeholder="Predikat (misal: A/B/C)">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="ket2" class="form-control" placeholder="Keterangan tambahan">
                    </div>
                </div>
                <hr>
            </div>

            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ url('penilaiansiswa/' . $siswa->id) }}" class="btn btn-danger">Batal</a>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sembunyikan form komponen dan kategori saat halaman dimuat
    const komponenSection = document.getElementById('komponen-section');
    const kategoriSection = document.getElementById('kategori-section');
    komponenSection.style.display = 'none';
    kategoriSection.style.display = 'none';

    // Toggle Komponen Penilaian
    const btnToggleKomponen = document.getElementById('btn-toggle-komponen');
    btnToggleKomponen.addEventListener('click', function() {
        if (komponenSection.style.display === 'none') {
            komponenSection.style.display = 'block';
            this.innerHTML = '<i class="bx bx-minus-circle me-1"></i> Sembunyikan Komponen Penilaian';
            this.classList.remove('btn-success');
            this.classList.add('btn-warning');
        } else {
            komponenSection.style.display = 'none';
            this.innerHTML = '<i class="bx bx-plus-circle me-1"></i> Tambah Komponen Penilaian';
            this.classList.remove('btn-warning');
            this.classList.add('btn-success');
        }
    });

    // Toggle Kategori Nilai
    const btnToggleKategori = document.getElementById('btn-toggle-kategori');
    btnToggleKategori.addEventListener('click', function() {
        if (kategoriSection.style.display === 'none') {
            kategoriSection.style.display = 'block';
            this.innerHTML = '<i class="bx bx-minus-circle me-1"></i> Sembunyikan Kategori Nilai';
            this.classList.remove('btn-success');
            this.classList.add('btn-warning');
        } else {
            kategoriSection.style.display = 'none';
            this.innerHTML = '<i class="bx bx-plus-circle me-1"></i> Tambah Kategori Nilai';
            this.classList.remove('btn-warning');
            this.classList.add('btn-success');
        }
    });

    // Tambah Komponen Baru
    const btnTambahKomponen = document.getElementById('btn-tambah-komponen');
    const komponenWrapper = document.getElementById('komponen-wrapper');
    
    btnTambahKomponen.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2 komponen-row';
        newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="komponen[]" class="form-control" placeholder="Komponen">
            </div>
            <div class="col-md-3">
                <input type="number" name="skor[]" class="form-control" placeholder="Skor">
            </div>
            <div class="col-md-4">
                <input type="text" name="ket1[]" class="form-control" placeholder="Keterangan Komponen">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm btn-hapus-komponen w-100">
                    <i class="bx bx-trash"></i>
                </button>
            </div>
        `;
        komponenWrapper.appendChild(newRow);
        
        // Event listener untuk tombol hapus
        newRow.querySelector('.btn-hapus-komponen').addEventListener('click', function() {
            newRow.remove();
        });
    });
});
</script>
@endsection
