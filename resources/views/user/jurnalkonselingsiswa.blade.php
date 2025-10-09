@extends('layouts.userlayouts')

@section('title', 'TOS Kegiatan Konseling')

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
   

    .nilai-input {
        width: 80px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-1 card mb-2">
    <div class="row mb-1">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 px-3 py-2">
                <a href="{{ url('jurnalkonseling/'.$siswa->kel) }}" class="btn back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="bg-light p-3 rounded">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="bx bx-user me-2"></i>Informasi Siswa
                    </h6>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Nama</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-muted"> {{$siswa->namlen}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Tanggal Lahir</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-muted"> {{$siswa->tgllah}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Kelas</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-muted"> {{$siswa->kel }} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Alamat</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-muted"> {{$siswa->detail->ala}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Informasi Siswa -->


<!-- Form Input Kasus -->
<div class="card">
    <h5 class="card-header text-center">Jurnal Konseling Siswa</h5>
    <div class="card-body">
        <form id="catalogForm" action="#" method="POST">
            @csrf

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                    <input type="time" name="tanggal" class="form-control" placeholder="Tanggal">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Deskripsi Kegiatan Konseling</label>
                <div class="col-sm-10">
                    <div id="editorDeskripsi"></div>
                    <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Rencana Tindak Lanjut Guru</label>
                <div class="col-sm-10">
                    <div id="editorRencana"></div>
                    <textarea name="rencana" id="rencana" style="display:none;" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
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
</script>

@endsection
