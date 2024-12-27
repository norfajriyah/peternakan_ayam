@extends('layouts.app')
  
@section('title', 'Hasil indeks performa')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Indeks Performa</h1>
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
                <th>abw</th>
                <th>fcr</th>
                <th>rata-rata umur panen</th>
                <th>deplesi</th>
                <th>indeks performa</th>
                <th>kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($hasil->count() > 0)
                @foreach($hasil as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->periode }}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->bobot_rr }}</td>
                        <td class="align-middle">{{ $rs->fcr }}</td>  
                        <td class="align-middle">{{ $rs->umur_panen }}</td>
                        <td class="align-middle">{{ $rs->deplesi}}</td>  
                        <td class="align-middle">{{ $rs->performa}}</td>
                        <td class="align-middle">{{ $rs->kategori}}</td>
                        
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{ route('hasil.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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