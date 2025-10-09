@extends('layouts.userlayouts')

@section('title', 'Raport Siswa')

@section('styles')
<style>
.back-btn{
    background: linear-gradient(135deg, #ff4d4d 0%, #b30000 100%);
    color:white;
    border: none;
    padding: 0.6rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-weight: 500;
}

.back-btn:hover{
    transform: translateY(-2);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    background: linear-gradient(135deg, #e60000 0%, #800000 100%);
    color:white;
    text-decoration: none;
}
</style>

@endsection

@section('content')
<div class="container-fluid px-1">
    <div class="card mb-2">
        <div class="row mb-1">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 px-2 py-3">
                    <a href="{{ url('raport/' . $isikelas->id) }}" class="btn back-btn">
                        <i class="bx bx-arrow-back me-1"></i> Kembali {{ $isikelas->nam }}
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
                            <span class="text-dark"> {{$siswa->siswa->namlen}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Tanggal Lahir</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-dark"> {{$siswa->siswa->tgllah}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Kelas</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-dark"> {{$isikelas->nam}} </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <span class="fw-medium">Alamat</span>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                            <span class="text-dark"> {{$siswa->siswa->ala}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Form Input Kasus -->
<div class="card">
    <h5 class="card-header text-center fw-bold text-dark">Raport Siswa</h5>
    <div class="card-body">
        <form id="catalogForm" action="#" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Raport</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-12">
                            <select name="tipe" class="form-select">
                                <option value="">Pilih Jenis Raport</option>
                                <option value="Mid Semester Ganjil">Mid Semester Ganjil</option>
                                <option value="Mid Semester Genap">Mid Semester Genap</option>
                                <option value="Akhir Semester Ganjil">Akhir Semester Ganjil</option>
                                <option value="Akhir Semester Genap">Akhir Semester Genap</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <div id="editor"></div>
                    <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
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
    let editorInstance;

    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                },
                ui: {
                    poweredBy: { position: 'inside', label: null }
                }
            })
            .then(editor => {
                editorInstance = editor;

                // Update textarea saat ada perubahan di editor
                editor.model.document.on('change:data', () => {
                    document.querySelector('#deskripsi').value = editor.getData();
                });
            })
            .catch(error => console.error('Error initializing CKEditor:', error));

        // Handle form submit
        const form = document.getElementById('catalogForm');
        form.addEventListener('submit', function (e) {
            if (editorInstance) {
                document.querySelector('#deskripsi').value = editorInstance.getData();

                if (!editorInstance.getData().trim()) {
                    e.preventDefault();
                    alert('Deskripsi tidak boleh kosong!');
                    return false;
                }
            }
        });
    });
</script>
@endsection
