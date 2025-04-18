@extends('layout.app')

@section('title', content:'Obat')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home Dokter</a></li>
              <li class="breadcrumb-item active">Data Obat</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        {{-- Form Tambah Obat --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah Obat</h3>
                  </div>

                  <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Masukkan nama obat">
                      </div>
                      <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah">
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan jenis obat">
                      </div>
                      <div class="form-group">
                        <label for="kemasan">Kemasan</label>
                        <input type="text" class="form-control" name="kemasan" id="kemasan" placeholder="Masukkan kemasan">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

        {{-- Table Data Obat --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Data Obat</h3>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Jumlah</th>
                          <th>Jenis</th>
                          <th>Kemasan</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($obats as $obat)
                        <tr>
                          <td>{{ $obat->id }}</td>
                          <td>{{ $obat->nama_obat }}</td>
                          <td>{{ $obat->jumlah }}</td>
                          <td>{{ $obat->jenis }}</td>
                          <td>{{ $obat->kemasan }}</td>
                          <td>{{ $obat->harga }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

      </div>
    </section>
</div>
@endsection
