<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index', [
            'users' => User::all()->where('id', auth()->id())
        ]);
    }
}
