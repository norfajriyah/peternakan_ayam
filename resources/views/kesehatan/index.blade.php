@extends('layouts.app')
  
@section('title', 'Kesehatan')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Data Kesehatan</h1>
        {{-- <a href="" class="btn btn-primary">Add Product</a> --}}
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No.</th>
                <th>periode</th>
                <th>tanggal</th>
                <th>hari</th>
                <th>obat pagi</th>
                <th>obat malam</th>
                <th>obat hama</th>
                <th>keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($kesehatan->count() > 0)
                @foreach($kesehatan as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->periode}}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->hari_ke }}</td>
                        <td class="align-middle">{{ $rs->jns_obat_pagi }}</td>  
                        <td class="align-middle">{{ $rs->jns_obat_malam }}</td>
                        <td class="align-middle">{{ $rs->jns_obat_hama}}</td> 
                        <td class="align-middle">{{ $rs->keterangan}}</td> 
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('kesehatan.show', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kesehatan.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection