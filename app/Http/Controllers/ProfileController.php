<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('profile');
    }
}
