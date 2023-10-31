@extends('admin.layouts.master')

@section('title', 'Thông tin Danh Mục Bài Viết')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <div class="px-7 py-10">
        <h1 class="text-xl font-medium mb-3">Thông tin chung</h1>
        <hr>
        <table class="table-auto mt-14 ml-10 text-lg text-gray-60">
            <tbody>
              <tr>
                <td class="px-5 py-3">Tên danh mục</td>
                <td class="px-5 py-3">{{$tutorial->name}}</td>
              </tr>
              <tr>
                <td class="px-5 py-3">Mô tả</td>
                <td class="px-5 py-3">{{$tutorial->description}}</td>
              </tr>
              <tr>
                <td class="px-5 py-3">Ngày tạo</td>
                <td class="px-5 py-3">{{$tutorial->created_at}}</td>
              </tr>
              <tr>
                <td class="px-5 py-3">Ngày sửa</td>
                <td class="px-5 py-3">{{$tutorial->updated_at}}</td>
              </tr>
            </tbody>
          </table>
    </div>  
</div>
@stop
