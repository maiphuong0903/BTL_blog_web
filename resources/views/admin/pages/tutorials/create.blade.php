@extends('admin.layouts.master')

@section('title', 'Thêm Danh Mục Bài Viết')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <form action="{{ route('admin.tutorials.store') }}" method="post" class="px-7 py-6">
        <h1 class="text-[30px] text-center mb-7 font-medium">Thêm Danh Mục</h1>
       @csrf
       <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Tên danh mục
            </label>
            <input class="w-full rounded-md border border-gray-300" type="text" name="name" placeholder="Nhập tên danh mục..." value="{{ old('name') }}">
          </div>
      <p @error('name') class="error" @enderror>
        @error('name')
            <span class="px-3 text-red-500">{{ $message }}</span>
        @enderror
      </p> 
      <div class="w-full px-3 my-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Mô tả
            </label>
            <textarea name="description" id="" cols="30" rows="10" class="w-full rounded-md border border-gray-300"></textarea>
     </div>
      <div class="flex justify-end absolute bottom-6 right-6 items-center gap-5 px-3 py-1 cursor-pointer ">
        <button type="submit" class="bg-[#292c45] text-white px-3 py-2 rounded-md my-5">Submit</button>
      </div>
    </form>
</div>
@stop
