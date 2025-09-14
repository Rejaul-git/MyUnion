<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->find(Auth::id());
        return view('user.dashboard', compact('users'));
    }
}
