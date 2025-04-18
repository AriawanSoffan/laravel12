@extends('layout.app')

@section('title','Periksa')

@section('nav-item')
<li class="nav-item">
    <a href="{{ route('periksa.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-solid fa-hospital"></i>
        <p>Periksa</p>
    </a>
</li>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Periksa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Periksa</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Periksa</h3>
                </div>
                <form action="{{ route('periksa.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_pasien">ID Pasien</label>
                            <input type="number" class="form-control" id="id_pasien" name="id_pasien" placeholder="Masukkan ID Pasien" required>
                        </div>

                        <div class="form-group">
                            <label for="id_dokter">Pilih Dokter</label>
                            <select class="form-control" name="id_dokter" id="id_dokter" required>
                                <option value="">-- Pilih Dokter --</option>
                                <option value="1">Dokter Awan</option>
                                <option value="2">Dokter Bukan Awan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tgl_periksa">Tanggal Periksa</label>
                            <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" required>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" name="catatan" id="catatan" placeholder="Catatan tambahan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="biaya_periksa">Biaya Periksa</label>
                            <input type="number" class="form-control" name="biaya_periksa" id="biaya_periksa" placeholder="Masukkan Biaya Periksa">
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Periksa</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokter</th>
                                <th>Tanggal</th>
                                <th>Biaya Periksa</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($periksa as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($item->id_dokter == 1) Dokter Awan
                                    @elseif($item->id_dokter == 2) Dokter Bukan Awan
                                    @else Tidak Diketahui
                                    @endif
                                </td>
                                <td>{{ $item->tgl_periksa }}</td>
                                <td>{{ $item->biaya_periksa ?? 'Belum ditentukan' }}</td>
                                <td>{{ $item->catatan }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data periksa.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
