<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('client.pages.home', compact('posts'));
    }

    public function search(Request $request)
    {
        $keyWord = $request->get('search_term');
        $posts = Post::where('title', 'LIKE', "%{$request->get('search_term')}%")->get();
        return view('client.pages.search', compact(['posts', 'keyWord']));
    }

    public function getByTutorial(int $tutorial_id)
    {
        $tutorial = Tutorial::find($tutorial_id);
        $posts = Post::where('tutorial_id', $tutorial_id)->get();
        return view('client.pages.tutorial', compact(['posts', 'tutorial']));
    }
}
