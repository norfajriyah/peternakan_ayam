@extends('layouts.app')

@section('title', 'Edit Profile')

@section('contents')
    <h1 class="mb-0">Edit Profile</h1>
    <hr />

    <form method="POST" id="edit_profile_frm" action="{{ route('profile.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="New Password">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection