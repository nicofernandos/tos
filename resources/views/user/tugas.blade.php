@extends('layouts.userlayouts')
@section('title','Tambah Tugas & Proyek')
@section('content')
@section('styles')
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
</style>
@endsection

<div class="container-fluid px-4">
    <div class="row mb-4">
      <div class="card px-2 py-3">
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
                        <h3 class="display-4 fw-bold mt-1">Tugas dan Proyek</h3>
                    </div>
                </div>
            </div>
        </div>
      </card>
    </div>
</div>


<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tugas & Proyek</h5>
      </div>
      <div class="card-body">
        <form action="{{ url('/tugassimpan') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="idkelas" value="{{$isikelas->id}}">
          <input type="hidden" name="idguru" value="{{ auth()->user()->id ?? '1' }}">

          {{-- Kode Tugas --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" name="mapel" class="form-control" value="" required>
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
            <label class="col-sm-2 col-form-label">Tanggal Pengumpulan</label>
            <div class="col-sm-10">
              <input type="date" name="tglpengumpulan" class="form-control" value="{{ date('Y-m-d') }}" >
            </div>
          </div>

          {{-- Tugas Untuk --}}
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tugas Untuk</label>
            <div class="col-sm-10">
                <select class="form-control" name="tugasFor" id="tugasSiswa" required>
                    <option value="">-- Pilih Tugas Untuk --</option>
                    <option value="kelas">1 Kelas</option>
                    <option value="siswa">Anak Tertentu</option>
                </select>
            </div>
        </div>

        <div class="row mb-3" id="siswaList" style="display: none;">
            <label class="col-sm-2 col-form-label">Pilih Siswa</label>
            <div class="col-sm-10">
                <div class="row g-3">
                    @foreach($siswa as $s)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100">
                                <div class="card-body p-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="siswa_ids[]" value="{{ $s->id }}" id="siswa{{ $s->id }}">
                                        <label class="form-check-label" for="siswa{{ $s->id }}">
                                            {{ $s->namlen }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
          <div class="row mb-4">
              <label class="col-sm-2 col-form-label">Deskripsi Informasi</label>
              <div class="col-sm-10">
                  <div id="editorDeskripsi"></div>
                  <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
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
<style>
        .ck-powered-by {
        display: none !important;
    }

    .ck-balloon-panel[class*="powered-by"] {
        display: none !important;
    }

    .ck-editor__editable {
        min-height: 200px;
    }
</style>
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
      let editors = {};

    document.addEventListener('DOMContentLoaded', function () {
        function initEditor(divId, textareaId) {
            ClassicEditor
                .create(document.querySelector('#' + divId), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', '|',
                        'undo', 'redo'
                    ]
                })
                .then(editor => {
                    editors[divId] = editor;
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#' + textareaId).value = editor.getData();
                    });
                })
                .catch(error => console.error(error));
        }

        // Inisialisasi dua editor
        initEditor('editorDeskripsi', 'deskripsi');
        initEditor('editorRencana', 'rencana');

        // Sync saat submit
        const form = document.getElementById('catalogForm');
        form.addEventListener('submit', function (e) {
            for (let key in editors) {
                const editor = editors[key];
                const textareaId = key === 'editorDeskripsi' ? 'deskripsi' : 'rencana';
                document.querySelector('#' + textareaId).value = editor.getData();

                if (!editor.getData().trim()) {
                    e.preventDefault();
                    alert(textareaId + ' tidak boleh kosong!');
                    return false;
                }
            }
        });
    });

  document.getElementById('tugasSiswa').addEventListener('change',function(){
    if(this.value === 'siswa'){
      document.getElementById('siswaList').style.display ='block';
    }else {
      document.getElementById('siswaList').style.display = 'none';
    }
  });
</script>

@endsection
