<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::paginate(1);
        return view('admin.pages.quanlytags.listTags', compact('tags'));
    }

    public function create(){
        return view('admin.pages.quanlytags.addTags');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:tags,name',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trong cơ sở dữ liệu',
        ]);        
   
        $tag = Tag::create([
            'name' => $request->input('name'),
        ]);
        $tag->save();
        return redirect('/admin/qltag');
    }
   

    public function edit($id){
        $tags = Tag::find($id);
        return view('admin.pages.quanlytags.editTags',compact('tags'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
        ]);  
        $tag = Tag::Where('id', $id)
                    ->update([
                        'name' => $request->input('name'),
                    ]);
        return redirect('/admin/qltag');
    }

    public function destroy($id){
        $tag = Tag::find($id); 
        $tag->delete();
        return back();
    }
}
