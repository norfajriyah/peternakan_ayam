<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(session("user_id"));
        return view('profile.index', ['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::find(session('user_id'));
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $user;

        if($request->name !=null){
            $data->name = $request->name;
        }
        if($request->email !=null){
            $data->email = $request->email;
        }
        if($request->password !=null){
            $data->password = $request->password;
        }

        $user->update([
            'user_id' => session("user_id"),
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);

        return redirect("profile");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
