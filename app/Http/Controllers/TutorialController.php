<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function index(){
        $tutorials = Tutorial::paginate(8);
        return view('admin.pages.tutorials.index', compact('tutorials'));
    }

    public function show($id){
        $tutorial = Tutorial::find($id);
        return view('admin.pages.tutorials.detail')->with('tutorial', $tutorial);
    }

    public function create(){
        return view('admin.pages.tutorials.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:tutorials,name',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trong cơ sở dữ liệu',
        ]);        
   
        $tutorial = Tutorial::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        $tutorial->save();
        return redirect()->route('admin.tutorials.index');
    }
   

    public function edit($id){
        $tutorial = Tutorial::find($id);
        return view('admin.pages.tutorials.update')->with('tutorial', $tutorial);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:tutorials,name,' . $id,
        ], [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trong cơ sở dữ liệu',
        ]);
        $tutorial = Tutorial::Where('id', $id)
                    ->update([
                        'name' => $request->get('name'),
                        'description' => $request->get('description')
                    ]);
        return redirect()->route('admin.tutorials.index');
    }

    public function destroy($id){
        $tutorial = Tutorial::find($id); 
        $tutorial->delete();
        return back();
    }
}
