<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.allusers', [
            'users' => User::where('id', '!=', Auth::id())->get(),
        ]);
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
        $validatedData = $request->validate([
            'username' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:3',
            'birth' => 'date',
            'gender' => 'required',
            'role' => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect()->back()->with('success', "Berhasil menambah user baru!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', "Berhasil menghapus user");
    }
}
