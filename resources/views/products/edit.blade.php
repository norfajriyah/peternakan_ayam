@extends('layouts.app')
  
@section('title', 'Edit Data DOC')
  
@section('contents')
    <h1 class="mb-0">Edit Data Day Old Chick</h1>
    <hr />
    <form action="{{ route('products.update', $doc->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $doc->tanggal }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">distributor</label>
                <input type="text" name="distributor" class="form-control" placeholder="distributor" value="{{ $doc->distributor }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">jenis ayam</label>
                <select name="jns_ayam" class="form-control">
                    <option value="CP" {{ $doc->jns_ayam == 'CP' ? 'selected' : '' }}>CP</option>
                    <option value="MB" {{ $doc->jns_ayam == 'MB' ? 'selected' : '' }}>MB</option>
                    <option value="Wonokoyo" {{ $doc->jns_ayam == 'Wonokoyo' ? 'selected' : '' }}>Wonokoyo</option>
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">jumlah ayam</label>
                <input type="text" name="jumlah_ayam" class="form-control" placeholder="jumlah ayam" value="{{ $doc->jumlah_ayam }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">harga kontrak</label>
                <input type="text" name="harga_kontrak" class="form-control" placeholder="harga kontrak" value="{{ $doc->harga_kontrak }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">total harga</label>
                <input type="text" name="total_harga" class="form-control" placeholder="total harga" value="{{ $doc->total_harga }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection