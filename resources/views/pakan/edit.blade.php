@extends('layouts.app')
  
@section('title', 'Edit Data Pakan')
  
@section('contents')
    <h1 class="mb-0">Edit Data Pakan</h1>
    <hr />
    <form action="{{ route('pakan.update', $pakan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">periode doc</label>
                <input disabled="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $pakan[0]->periode }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $pakan[0]->tanggal }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">jenis pakan</label>
                <input type="text" name="jenis_pakan" class="form-control" placeholder="jenis_pakan" value="{{ $pakan[0]->jenis_pakan }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">jumlah pakan</label>
                <input type="text" name="jumlah_pakan"  class="form_control" placeholder="jumlah_pakan" value="{{$pakan[0]->jumlah_pakan }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">harga pakan satuan</label>
                <input type="text" name="hrg_pakan_satuan" class="form-control" placeholder="hrg_pakan_satuan" value="{{ $pakan[0]->hrg_pakan_satuan}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">total harga</label>
                <input type="text" name="total_harga" class="form-control" placeholder="total_harga" value="{{$pakan[0]->total_harga }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection