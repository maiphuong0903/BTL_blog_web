<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(8);
        return view('admin.pages.quanlytaikhoan.listUsers',[
            'users' => $users
        ]);
    }

    public function create(){
        return view('admin.pages.quanlytaikhoan.addUsers');
    }

    public function store(Request $request){
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'role' => 'required',
        //     'avatar' => 'mimes:png,jpg,jpeg|max:5048'
        // ]);
      
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
        return redirect('/admin/qltaikhoan');
    }
}
