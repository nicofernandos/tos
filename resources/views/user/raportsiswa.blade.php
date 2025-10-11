@extends('layouts.userlayouts')

@section('title', 'Raport Siswa')

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
.ck-powered-by,
.ck-balloon-panel[class*="powered-by"] {
    display: none !important;
}
.ck-editor__editable {
    min-height: 200px;
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
                        <div class="col-lg-2"><span class="fw-medium">Nama</span></div>
                        <div class="col-lg-10"><span class="text-dark">{{ $siswa->siswa->namlen }}</span></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2"><span class="fw-medium">Tanggal Lahir</span></div>
                        <div class="col-lg-10"><span class="text-dark">{{ $siswa->siswa->tgllah }}</span></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2"><span class="fw-medium">Kelas</span></div>
                        <div class="col-lg-10"><span class="text-dark">{{ $isikelas->nam }}</span></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-2"><span class="fw-medium">Alamat</span></div>
                        <div class="col-lg-10"><span class="text-dark">{{ $siswa->siswa->ala }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Input Raport -->
<div class="card">
    <h5 class="card-header text-center fw-bold text-dark">Raport Siswa</h5>
    <div class="card-body">
        <form id="catalogForm" action="{{ url('/raportsiswasimpan') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="idta" value="{{ $idtahunajaran }}">
            <input type="hidden" name="idkel" value="{{ $isikelas->id }}">
            <input type="hidden" name="idk" value="{{ $idguru ?? 0 }}">
            <input type="hidden" name="idsis" value="{{ $siswa->siswa->id }}">

            <select name="tipe" class="form-select" required>
                <option value="">Pilih Jenis Raport</option>
                @foreach($jenisraport as $j)
                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                @endforeach
            </select>


            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <div id="editor"></div>
                    <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">File Raport</label>
                <div class="col-sm-10">
                    <input type="file" name="raport" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ url('raport/' . $isikelas->id) }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
let editorInstance;

document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi CKEditor
    ClassicEditor.create(document.querySelector('#editor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
    })
    .then(editor => {
        editorInstance = editor;
        
        // Update hidden textarea setiap ada perubahan
        editor.model.document.on('change:data', () => {
            document.querySelector('#deskripsi').value = editor.getData();
        });
    })
    .catch(error => {
        console.error('CKEditor Error:', error);
        alert('Error loading editor: ' + error);
    });

    // Handle form submit
    const form = document.getElementById('catalogForm');
    form.addEventListener('submit', function (e) {
        if (editorInstance) {
            // Pastikan data editor diupdate ke textarea
            const content = editorInstance.getData().trim();
            document.querySelector('#deskripsi').value = content;
            
            // Validasi content tidak kosong
            if (!content || content === '<p>&nbsp;</p>' || content === '<p></p>') {
                e.preventDefault();
                alert('Deskripsi tidak boleh kosong!');
                return false;
            }
        } else {
            e.preventDefault();
            alert('Editor belum siap!');
            return false;
        }
    });
});
</script>
@endsection
