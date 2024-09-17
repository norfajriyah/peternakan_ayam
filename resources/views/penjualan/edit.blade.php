@extends('layouts.app')

@section('title', 'Edit Data Penjualan')

@section('contents')
    <h1 class="mb-0">Edit Data Penjualan</h1>
    <hr />
    <form action="{{ route('penjualan.update', $penjualan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Periode</label>
                <input type="text" name="doc_id" class="form-control" placeholder="doc_id" value="{{ $penjualan[0]->periode }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $penjualan[0]->tanggal }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Umur</label>
                <input type="text" name="umur" class="form-control" placeholder="umur" value="{{ $penjualan[0]->umur }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Mitra</label>
                <input type="text" name="mitra" class="form-control" placeholder="mitra" value="{{ $penjualan[0]->mitra}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{$penjualan[0]->alamat }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Pembeli</label>
                <input type="text" name="nama_pembeli" class="form-control" placeholder="nama_pembeli" value="{{ $penjualan[0]->nama_pembeli }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">No Mobil</label>
                <input type="text" name="no_mobil" class="form-control" placeholder="no_mobil" value="{{ $penjualan[0]->no_mobil }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Driver</label>
                <input type="text" name="nama_driver" class="form-control" placeholder="nama_driver" value="{{ $penjualan[0]->nama_driver}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Jumlah Ayam Panen</label>
                <input type="text" name="jml_ayam_panen" class="form-control" placeholder="jml_ayam_panen" value="{{ $penjualan[0]->jml_ayam_panen }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Berat Rata-rata</label>
                <input type="text" name="berat_rr" class="form-control" placeholder="berat_rr" value="{{ $penjualan[0]->berat_rr}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Total Berat</label>
                <input type="text" name="total_berat" class="form-control" placeholder="total_berat" value="{{ $penjualan[0]->total_berat}}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Harga/Kg</label>
                <input type="text" name="harga_kg" class="form-control" placeholder="harga_kg" value="{{ $penjualan[0]->harga_kg }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label">Total Harga Jual</label>
                <input type="text" name="total_harga_jual" class="form-control" placeholder="total_harga_jual" value="{{ $penjualan[0]->total_harga_jual}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection