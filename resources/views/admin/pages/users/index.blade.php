@extends('admin.layouts.master')

@section('title', 'Quản lý tài khoản')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <div class="flex justify-end">
        <a class="bg-[#292c45] text-white px-2 py-2 rounded-md my-5" href="{{ route('admin.users.create') }}">Thêm User</a>
    </div>
    <table class="w-full">
        <thead>
            <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                <th class="border border-gray-300 py-3 text-center">STT</th>
                <th class="border border-gray-300 px-2">TÊN ĐĂNG NHẬP</th>
                <th class="border border-gray-300 px-2">EMAIL</th>
                <th class="border border-gray-300 px-2">VAI TRÒ</th>
            </tr>
        </thead>
        <tbody class="cursor-pointer">
            @foreach ($users as $user)
            <tr class="hover:bg-yellow-100">
                <td class="border border-gray-300 py-3 text-center">{{$user->id}}</td>
                <td class="border border-gray-300 px-2">{{$user->name}}</td>
                <td class="border border-gray-300 px-2">{{$user->email}}</td>
                <td class="border border-gray-300 px-2">Admin</td>
            </tr>
            @endforeach
        </tbody>
    </table>

     {{-- phân trang --}}
     <div class="absolute bottom-6 right-6">
        {{$users->links()}}
    </div>
</div>
@stop
