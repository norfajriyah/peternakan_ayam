
@extends('layouts.app')
  
@section('title', 'Profile')
  
@section('contents')
    {{-- <h1 class="mb-0">Profile</h1> --}}
    <hr />
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="" >
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                {{-- @php
                    dd($user)
                @endphp --}}
                <div class="row" id="res"></div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" disabled class="form-control" placeholder="first name" value="{{ $user["name"] }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ $user["email"] }}" placeholder="Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Password</label>
                        <input type="text" name="password" disabled class="form-control" value="{{ $user["password"] }}" placeholder="Password">
                    </div>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('profile.show', ['profile' => $user['id']])}}" type="button" class="btn btn-warning">Edit</a>
                </div> 
            </div>
        </div>
    </div>   
            
</form>
@endsection