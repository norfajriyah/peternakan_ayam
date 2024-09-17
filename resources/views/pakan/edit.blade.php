@extends('layouts.app')

@section('title', 'Edit Data Pakan')

@section('contents')
    <h1 class="mb-0">Edit Data Pakan</h1>
    <hr />
    <form action="{{ route('pakan.update', $pakan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Periode DOC</label>
                <input type="text" name="tanggal" class="form-control" placeholder="periode" value="{{ $pakan[0]->periode }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $pakan[0]->tanggal }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Jenis Pakan</label>
                <select name="jenis_pakan" class="form-control">
                    <option value="Galaxy 00" {{ $pakan[0]->jenis_pakan == 'Galaxy 00' ? 'selected' : '' }}>Galaxy 00</option>
                    <option value="Galaxy 01" {{ $pakan[0]->jenis_pakan == 'Galaxy 01' ? 'selected' : '' }}>Galaxy 01</option>
                    <option value="B 151 C / Strarfeed" {{ $pakan[0]->jenis_pakan == 'B 151 C / Strarfeed' ? 'selected' : '' }}>B 151 C / Strarfeed</option>
                    <option value="510" {{ $pakan[0]->jenis_pakan == '510' ? 'selected' : '' }}>510</option>
                    <option value="511 Alfa" {{ $pakan[0]->jenis_pakan == '511 Alfa' ? 'selected' : '' }}>511 Alfa</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Jumlah Pakan</label>
                <input type="text" name="jumlah_pakan" class="form-control" placeholder="jumlah_pakan" value="{{ $pakan[0]->jumlah_pakan }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Harga Pakan Satuan</label>
                <input type="text" name="hrg_pakan_satuan" class="form-control" placeholder="hrg_pakan_satuan" value="{{ $pakan[0]->hrg_pakan_satuan }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Total Harga</label>
                <input type="text" name="total_harga" class="form-control" placeholder="total_harga" value="{{ $pakan[0]->total_harga }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection