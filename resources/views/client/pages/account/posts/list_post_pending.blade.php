@extends('client.layouts.account')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    @if($posts->count() > 0)
    <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết Chờ Duyệt</h1>
    <table class="w-full">
        <thead>
            <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                <th class="border border-gray-300 py-3 text-center">STT</th>
                <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                <th class="border border-gray-300 px-2">NGƯỜI VIẾT</th>
                <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                <th class="border border-gray-300 px-2 text-center w-[150px]">TRẠNG THÁI</th>
            </tr>
        </thead>
        <tbody class="cursor-pointer">
            <ul>
                @foreach($posts as $key => $post)
                <tr class="hover:bg-yellow-100">
                    <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                    <td class="border border-gray-300 px-2 post-title"><a href="{{ route('client.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                    <td class="border border-gray-300 px-2 py-3">
                        <img class="w-[80px] h-[80px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                    </td>
                    <td class="border border-gray-300 px-2">{{ $post->author->name ?? "unknow"}}</td>
                    <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                    <td class="border border-gray-300 px-2 text-center">
                        <button class="bg-blue-500 py-2 px-2 rounded-md text-white">Chờ duyệt</button>
                    </td>
                </tr>
                @endforeach
            </ul>
        </tbody>
    </table>
    @else
        <p class="py-5 text-2xl font-medium px-5 text-center">Bạn chưa đăng bài viết nào</p>
    @endif 
</div>

@stop

