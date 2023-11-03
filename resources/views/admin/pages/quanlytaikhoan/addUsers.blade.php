@extends('admin.layouts.master')

@section('title', 'Thêm Tài Khoản')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <form action="/users" method="post" class="px-7 py-6" enctype="multipart/form-data">
      <h1 class="text-[30px] text-center mb-7 font-medium">Thêm Tài Khoản</h1>
       @csrf
       <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  User Name
              </label>
              <input class="w-full rounded-md border border-gray-300" type="text" name="name" placeholder="Nhập tên tài khoản">
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Email
              </label>
              <input class="w-full rounded-md border border-gray-300" type="text" name="email" placeholder="Nhập email">
            </div>
      </div>
      <div class="w-full mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Password
          </label>
          <input class="w-full rounded-md border border-gray-300" type="password" name="password" placeholder="************">
    </div>
      <div class="w-full px-3 my-5" class="rounded-md border border-gray-300">
        <input type="file" name="avatar" class="rounded-md">
      </div>
      <div class="flex justify-end absolute bottom-6 right-6 items-center gap-5 px-3 py-1 cursor-pointer ">
        <button type="submit" class="bg-[#292c45] text-white px-3 py-2 rounded-md my-5">Submit</button>
      </div>
    </form>
</div>
@stop
