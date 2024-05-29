@extends('layouts.app')
  
@section('title', 'Pakan')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Data Pakan</h1>
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
                <th>periode doc</th>
                <th>tanggal</th>
                <th>jenis pakan</th>
                <th>jumlah pakan</th>
                <th>harga pakan satuan</th>
                <th>total harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($pakan->count() > 0)
                @foreach($pakan as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->doc_id }}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->jenis_pakan }}</td>
                        <td class="align-middle">{{ $rs->jumlah_pakan }}</td>  
                        <td class="align-middle">{{ $rs->hrg_pakan_satuan }}</td>
                        <td class="align-middle">{{ $rs->total_harga}}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('pakan.show', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pakan.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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