@extends('layouts.app')
  
@section('title', 'Edit Data DOC')
  
@section('contents')
    <h1 class="mb-0">Edit Data Day Old Chick</h1>
    <hr />
    <form action="{{ route('products.edit', $doc->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $doc->tanggal }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">distributor</label>
                <input type="text" name="distributor" class="form-control" placeholder="distributor" value="{{ $doc->distributor }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">jenis ayam</label>
                <input type="text" name="jns_ayam" class="form-control" placeholder="jenis ayam" value="{{ $doc->jns_ayam }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">jumlah ayam</label>
                <textarea class="form-control" name="jumlah_ayam" placeholder="jumlah ayam" >{{ $doc->jumlah_ayam }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">harga kontrak</label>
                <input type="text" name="harga_kontrak" class="form-control" placeholder="harga kontrak" value="{{ $doc->harga_kontrak }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">total harga</label>
                <textarea class="form-control" name="total_harga" placeholder="total harga" >{{ $doc->total_harga }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection