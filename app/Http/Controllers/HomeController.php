<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isAdmin = Auth::user()->hasRole('Admin');

        $users = null;

        if ($isAdmin) {
            $users = User::all()->filter(fn ($user) => !$user->hasRole('Admin'));
        }

        return !$isAdmin ? view('app.dashboard') : view('app.admin-dashboard', [
            'users' => $users
        ]);
    }
}
