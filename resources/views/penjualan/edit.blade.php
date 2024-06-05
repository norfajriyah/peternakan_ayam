@extends('layouts.app')
  
@section('title', 'Edit Data Penjualan')
  
@section('contents')
    <h1 class="mb-0">Edit Data Penjualan</h1>
    <hr />
    <form action="{{ route('penjualan.update', $penjualan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">periode</label>
                <input disabled="text" name="doc_id" class="form-control" placeholder="doc_id" value="{{ $penjualan[0]->periode }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $penjualan[0]->tanggal }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">umur</label>
                <input type="text" name="umur" class="form-control" placeholder="umur" value="{{ $penjualan[0]->umur }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">mitra</label>
                <input type="text" name="mitra" class="form-control" placeholder="mitra" value="{{ $penjualan[0]->mitra}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">alamat</label>
                <input type="text" name="alamat"  class="form_control" placeholder="alamat" value="{{$penjualan[0]->alamat }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">nama pembeli</label>
                <input type="text" name="nama_pembeli" class="form-control" placeholder="nama_pembeli" value="{{ $penjualan[0]->nama_pembeli }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">no mobil</label>
                <input type="text" name="no_mobil" class="form-control" placeholder="no_mobil" value="{{ $penjualan[0]->no_mobil }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">nama driver</label>
                <input type="text" name="nama_driver" class="form-control" placeholder="nama_driver" value="{{ $penjualan[0]->nama_driver}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label"> jumlah ayam panen</label>
                <input type="text" name="jml_ayam_panen" class="form-control" placeholder="jml_ayam_panen" value="{{ $penjualan[0]->jml_ayam_panen }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">berat rata-rata</label>
                <input type="text" name="berat_rr" class="form-control" placeholder="berat_rr" value="{{ $penjualan[0]->berat_rr}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">total berat</label>
                <input type="text" name="total_berat" class="form-control" placeholder="total_berat" value="{{ $penjualan[0]->total_berat}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">harga/kg</label>
                <input type="text" name="harga_kg" class="form-control" placeholder="harga_kg" value="{{ $penjualan[0]->harga_kg }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">total harga jual</label>
                <input type="text" name="total_harga_jual" class="form-control" placeholder="total_harga_jual" value="{{ $penjualan[0]->total_harga_jual}}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection