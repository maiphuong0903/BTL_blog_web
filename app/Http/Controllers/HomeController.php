<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Tutorial::with("posts")->get();
        return view('client.pages.home', compact('data'));
    }
}
