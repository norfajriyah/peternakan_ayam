@extends('layouts.app')
  
@section('title', 'Edit Data Kesehatan')
  
@section('contents')
    <h1 class="mb-0">Edit Data Kesehatan</h1>
    <hr />
    <form action="{{ route('kesehatan.edit', $kesehatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">periode doc</label>
                <input type="text" name="doc_id" class="form-control" placeholder="doc_id" value="{{ $kesehatan->doc_id }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $kesehatan->tanggal }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">hari</label>
                <input type="text" name="hari_ke" class="form-control" placeholder="hari_ke" value="{{ $kesehatan->hari_ke }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">obat pagi</label>
                <input type="text" name="jns_obat_pagi"  class="form_control" placeholder="jns_obat_pagi" value="{{$kesehatan->jns_obat_pagi }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">obat malam</label>
                <input type="text" name="jns_obat_malam" class="form-control" placeholder="jns_obat_malam" value="{{ $kesehatan->jns_obat_malam}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">obat hama</label>
                <input type="text" name="jns_obat_hama" class="form-control" placeholder="jns_obat_hama" value="{{$kesehatan->jns_obat_hama }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="{{$kesehatan->keterangan }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection