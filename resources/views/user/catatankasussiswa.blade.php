    @extends('layouts.userlayouts')

    @section('title', 'TOS Penilaian')

    @section('style')
    <style>
        .nilai-input {
            width: 80px;
            text-align: center;
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
    <div class="container-fluid px-1 card mb-3">
        <div class="row mb-1">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 px-2 py-3">
                    <a href="{{ url('catatankasus/'.$siswa->kel) }}" class="btn btn-danger back-btn">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Informasi Siswa -->
        <div class="row">
            <div class="col-12 mb-3">
                <div class="bg-light p-3 rounded">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="bx bx-user me-2"></i>Informasi Siswa
                    </h6>

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Nama</div>
                                <div class="col-7 text-dark">{{ $siswa->namlen }}</div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">NIS</div>
                                <div class="col-7 text-dark">{{ $siswa->nis }}</div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">NISN (Nomor Induk Siswa Nasional)</div>
                                <div class="col-7 text-dark">{{ $siswa->nisn }}</div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Tanggal Lahir</div>
                                <div class="col-7 text-dark">{{ $siswa->tgllah }}</div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Tempat Lahir</div>
                                <div class="col-7 text-dark">{{ $siswa->temlah }}</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Kelas</div>
                                <div class="col-7 text-dark">{{ $siswa->kel }}</div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Alamat</div>
                                <div class="col-7 text-dark">
                                    {{ $siswa->detail->ala ?? '-' }}
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-5 fw-medium">Jenis Kelamin</div>
                                <div class="col-7 text-dark">
                                    @if ($siswa->jenkel == 1)
                                        Laki-laki
                                    @elseif ($siswa->jenkel == 2)
                                        Perempuan
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Input Kasus -->
    <div class="card">
        <h5 class="card-header text-center text-dark">Input Kasus Siswa</h5>
        <div class="card-body">
            <form id="catalogForm" action="{{ url('catatankasussiswasimpan') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="idsiswa" value="{{ $siswa->id }}">
                <input type="hidden" name="kelas" value="{{ $siswa->kelas->nam }}">
                <input type="hidden" name="idkelas" value="{{ $siswa->kelas->id    }}">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" name="namaguru" class="form-control" placeholder="Masukkan Nama Guru" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <div id="editor"></div>
                        <textarea name="deskripsi" id="deskripsi" style="display:none;" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jumlah Poin</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlahpoin" class="form-control" placeholder="Masukkan Poin" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <h6 class="fw-bold text-primary">Detail Kasus</h6>
                    <div id="detailKasusContainer" >
                        <div class="row mb-3 detail-item">
                            <div class="col-sm-5 mb-2">
                                <input type="text" name="details[0][detail]" class="form-control" placeholder="Jenis Pelanggaran">
                            </div>
                            <div class="col-sm-5 mb-2">
                                <input type="text" name="keterangan[0][detail]" class="form-control" placeholder="Keterangan">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger remove-detail" >Hapus</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addDetail" class="btn btn-secondary mb-2">Tambah Detail</button>
                </div>

                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ url('catatankasus/'.$siswa->kel) }}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
        
    @section('script')
    <script>
        document.getElementById('addDetail').addEventListener('click',function(){
            const container = document.getElementById('detailKasusContainer');
            const index = container.children.legth;
            const html = `
                <div class="row mb-2 detail-item">
                    <div class="col-sm-5 mb-2">
                        <input type="text" name="details[${index}][detail]" class="form-control" placeholder="Jenis Pelanggaran">
                    </div>
                    <div class="col-sm-5 mb-2">
                        <input type="text" name="details[${index}][keterangan]" class="form-control" placeholder="Keterangan">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger remove-detail">Hapus</button>
                    </div>
                </div>
            `;

                container.insertAdjacentHTML('beforeend',html);
        });

        document.addEventListener('click',function(e) {
            if(e.target.classList.contains('remove-detail')){
                e.target.closest('.detail-item').remove();
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let editorInstance;

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', '|',
                        'bulletedList', 'numberedList', '|',
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
                    }
                })
                .then(editor => {
                    editorInstance = editor;
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#deskripsi').value = editor.getData();
                    });
                })
                .catch(error => console.error('CKEditor error:', error));

            // sinkronisasi sebelum submit
            const form = document.getElementById('catalogForm');
            form.addEventListener('submit', e => {
                if (editorInstance) {
                    document.querySelector('#deskripsi').value = editorInstance.getData();
                    if (!editorInstance.getData().trim()) {
                        e.preventDefault();
                        alert('Deskripsi tidak boleh kosong!');
                    }
                }
            });
        });
    </script>
    @endsection
