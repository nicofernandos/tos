@extends('layouts.userlayouts')
@section('title','TOS - Data Siswa')

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

.class-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
}
.class-header h1, .class-header h3 {
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}
.card {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
    border: none;
}
.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    padding: 1.5rem;
    border: none;
}
.table {
    margin-bottom: 0;
}
.table th {
    background: #f8f9fa;
    border-color: #dee2e6;
    font-weight: 600;
    color: #495057;
}
.student-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
}
.student-link:hover {
    color: #764ba2;
    text-decoration: underline;
}
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card px-2 py-3">       
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ url('kelas/'.$isikelas->id) }}" class="btn back-btn">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
                
                <div class="class-header">
                    <div class="row align-items-center">
                        <div class="col-md-5 my-2">
                            <img src="{{ asset('foto/sklh.jpeg') }}" class="img-fluid" style="border-radius: 20px; max-height:200px;" alt="Foto Sekolah">
                        </div>
                        <div class="col-md-7">
                            @if(isset($siswa) && $siswa->count() > 0)
                                <h1 class="display-4 fw-bold mb-2">{{ $siswa->first()->kel ?? 'Kelas' }}</h1>
                            @else
                                <h1 class="display-4 fw-bold mb-2">Data Siswa</h1>
                            @endif
                            <h3 class="display-5 fw-bold mt-1">Total: {{ isset($siswa) ? $siswa->count() : 0 }} Siswa</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="card-header">
            <i class="bx bx-group me-2"></i>Data Siswa
            @if(isset($siswa) && $siswa->count() > 0)
                - {{ $siswa->first()->kel }}
            @endif
        </h5>

        <div class="card-body">
            @if(isset($siswa) && $siswa->count() > 0)
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-striped table-border table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($siswa as $k)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $k->siswa->nis ?? '-' }}</td>
                                <td>{{ $k->siswa->nisn ?? '-' }}</td>
                                <td>
                                    <a href="{{ url('datasiswa/' . $k->->siswa->id) }}" class="student-link">
                                        {{ $k->siswa->namlen ?? 'Nama tidak tersedia' }}
                                    </a>
                                </td>
                                <td>
                                    @if($k->siswa->tgllah)
                                        {{ \Carbon\Carbon::parse($k->siswa->tgllah)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($k->siswa->jenkel == 1)
                                        Laki - Laki
                                    @elseif ($k->siswa->jenkel == 2)
                                        Perempuan
                                    @else
                                    -    
                                    @endif
                                </td>
                                <td>{{ $k->siswa->tel ?? '-' }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bx bx-user-x" style="font-size: 4rem; color: #6c757d;"></i>
                    <h4 class="mt-3 text-muted">Belum ada data siswa</h4>
                    <p class="text-muted">Data siswa untuk kelas ini belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection