@extends('admin.layouts.master')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    @if($posts->count() > 0)
        <h1 class="text-[25px] text-center mt-4 font-medium pb-5">Danh Sách Bài Viết Đã Được Duyệt </h1>
        <table class="w-full">
            <thead>
                <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                    <th class="border border-gray-300 py-3 text-center">STT</th>
                    <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                    <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                    <th class="border border-gray-300 px-2">NGƯỜI TẠO</th>
                    <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                    <th class="border border-gray-300 px-2 text-center w-[160px]">TRẠNG THÁI</th>
                </tr>
            </thead>
            <tbody class="cursor-pointer">
            
                    <ul>
                        @foreach($posts as $key => $post)
                        <tr class="hover:bg-yellow-100">
                            <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                            <td class="border border-gray-300 px-2 py-3">
                                <a href="{{ route('admin.posts.show', $post->id) }}">
                                    <img class="w-[80px] h-[80px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                                </a>
                            </td>
                            <td class="border border-gray-300 px-2 post-title">{{ $post->title }}</td>
                            <td class="border border-gray-300 px-2">{{ $post->name ?? "unknow" }}</td>
                            <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                            <td class="border border-gray-300 px-2 text-center">
                                <button class="bg-blue-400 py-2 px-2 rounded-md text-white">Đã được duyệt</button>
                            </td>
                        </tr>
                        @endforeach
                    </ul>       
            </tbody>
        </table>
    @else
        <p class="py-5 text-2xl font-medium px-5 text-center">Chưa có bài viết nào được duyệt</p>
    @endif 
</div>
<div class="absolute bottom-6 right-6">
    {{$posts->links()}}
</div>
@stop

