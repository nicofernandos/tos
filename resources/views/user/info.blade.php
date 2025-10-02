@extends('layouts.userlayouts')
@section('title','TOS Info')
@section('content')

<div class="container-fluid px-4 card">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
                <a href="{{ url('kelas/'.$isikelas->id) }}" class="btn btn-danger back-btn">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
            
            <div class="class-header">
                <div class="row align-items-center">
                    <div class="col-md-5 my-2">
                        <img src="{{ asset('foto/sklh.jpeg') }}" class="img-fluid" style="border-radius: 20px; max-height:200px;"  alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="display-4 fw-bold mb-2">Kelas  {{$isikelas->nam}} </h1>
                        <h3 class="display-4 fw-bold mt-1">Informasi</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-2">
    <h5 class="card-header text-center">Informasi</h5>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-control mb-2" for=""> Tanggal  </label>
            <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control" id="" value="" placeholder="Jenis Nilai">
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-form-label">Deskripsi Informasi</label>
            <div class="col-sm-10">
                <div id="editorDeskripsi"></div>
                <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <button type="sumbit" class="btn btn-primary me-2">Simpan</button>
                <a href="" class="btn btn-danger"> Batal </a>
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
</script>
@endsection