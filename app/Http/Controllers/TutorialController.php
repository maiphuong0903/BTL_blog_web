<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function index(){
        $tutorials = Tutorial::paginate(8);
        return view('admin.pages.quanlydanhmuc.listTutorials',[
            'tutorials' => $tutorials
        ]);
    }

    public function show($id){
        $tutorial = Tutorial::find($id);
        return view('admin.pages.quanlydanhmuc.showTutorials')->with('tutorial', $tutorial);
    }

    public function create(){
        return view('admin.pages.quanlydanhmuc.addTutorials');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:tutorials,name',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trong cơ sở dữ liệu',
        ]);        
   
        $tutorial = Tutorial::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        $tutorial->save();
        return redirect('/admin/qldanhmuc');
    }
   

    public function edit($id){
        $tutorial = Tutorial::find($id);
        return view('admin.pages.quanlydanhmuc.editTutorials')->with('tutorial', $tutorial);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
        ]);
        $tutorial = Tutorial::Where('id', $id)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description')
                    ]);
        return redirect('/admin/qldanhmuc');
    }

    public function destroy($id){
        $tutorial = Tutorial::find($id); 
        $tutorial->delete();
        return back();
    }
}
