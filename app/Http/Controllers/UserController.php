<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(8);
        return view('admin.pages.users.index',[
            'users' => $users
        ]);
    }

    public function create(){
        return view('admin.pages.users.create');
    }

    public function store(CreateUserRequest $request){   
        $request->validate();   
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('public/images');
            $url = Storage::url($path);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'avatar' => $url,
            'role' => 1,
        ]);
        $user->save();
        return redirect()->route('admin.users.index');
    }
}
