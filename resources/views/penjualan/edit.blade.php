@extends('layouts.app')
  
@section('title', 'Edit Data Penjualan')
  
@section('contents')
    <h1 class="mb-0">Edit Data Penjualan</h1>
    <hr />
    <form action="{{ route('penjualan.edit', $penjualan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">periode doc</label>
                <input type="text" name="doc_id" class="form-control" placeholder="doc_id" value="{{ $penjualan->doc_id }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $penjualan->tanggal }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">mitra</label>
                <input type="text" name="mitra" class="form-control" placeholder="mitra" value="{{ $penjualan->mitra}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">alamat</label>
                <input type="text" name="alamat"  class="form_control" placeholder="alamat" value="{{$penjualan->alamat }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">nama pembeli</label>
                <input type="text" name="nama_pembeli" class="form-control" placeholder="nama_pembeli" value="{{ $penjualan->nama_pembeli }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">no mobil</label>
                <input type="text" name="no_mobil" class="form-control" placeholder="no_mobil" value="{{$penjualan->no_mobil }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">nama driver</label>
                <input type="text" name="nama_driver" class="form-control" placeholder="nama_driver" value="{{ $penjualan->nama_driver}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label"> jumlah ayam panen</label>
                <input type="text" name="jml_ayam_panen" class="form-control" placeholder="jml_ayam_panen" value="{{$penjualan->jml_ayam_panen }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">berat rata-rata</label>
                <input type="text" name="berat_rr" class="form-control" placeholder="berat_rr" value="{{ $penjualan->berat_rr}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">harga/kg</label>
                <input type="text" name="harga_kg" class="form-control" placeholder="harga_kg" value="{{$penjualan->harga_kg }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">total harga jual</label>
                <input type="text" name="total_harga_jual" class="form-control" placeholder="total_harga_jual" value="{{ $penjualan->total_harga_jual}}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection