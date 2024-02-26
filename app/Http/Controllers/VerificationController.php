<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        return view('verification.verify');
    }

    public function verify()
    {
        return view('verification.verify');
    }
}
