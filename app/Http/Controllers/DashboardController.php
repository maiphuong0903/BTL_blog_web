<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $postInMonth = Post::whereMonth('created_at', Carbon::now())->count();
        return view('admin.pages.home', compact(['postInMonth']));
    }
}
