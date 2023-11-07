@extends('admin.layouts.master')

@section('title', 'Quản lý tài khoản')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <h1 class="text-[30px] text-center mt-3 mb-5 font-medium">Danh Sách Tài Khoản</h1>
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
            @foreach ($users as $key => $user)
            <tr class="hover:bg-yellow-100">
                <td class="border border-gray-300 py-3 text-center">{{($users->currentPage() - 1) * $users->perPage() + $key+1}}</td>
                <td class="border border-gray-300 px-2">{{$user->name}}</td>
                <td class="border border-gray-300 px-2">{{$user->email}}</td>
                <td class="border border-gray-300 px-2">{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
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
