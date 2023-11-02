@extends('admin.layouts.master')

@section('title', 'Sửa Tags Bài Viết')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <form action="/edit_tag/{{$tags->id}}" method="post" class="px-7 py-6">
        <h1 class="text-[30px] text-center mb-7 font-medium">Sửa Tags Bài Viết</h1>
       @csrf
       @method('PUT')
       <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
               Tên tags
            </label>
            <input value="{{$tags->name}}" class="w-full rounded-md border border-gray-300" type="text" name="name" placeholder="Nhập tên danh mục...">
      </div>
      @if ($errors->any())
        <div class="px-3 mt-2">
            @foreach ($errors->all() as $error)
                <p class="text-red-500">
                    {{$error}}
                </p>
            @endforeach
        </div>
     @endif
      <div class="flex justify-end absolute bottom-6 right-6 items-center gap-5 px-3 py-1 cursor-pointer ">
        <button type="submit" class="bg-[#292c45] text-white px-3 py-2 rounded-md my-5">Submit</button>
      </div>
    </form>
</div>
@stop
