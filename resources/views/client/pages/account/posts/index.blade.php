@extends('client.layouts.account')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    @if($posts->count() > 0)
        <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết Đã Được Duyệt </h1>

        <table class="w-full">
            <thead>
                <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                    <th class="border border-gray-300 py-3 text-center">STT</th>
                    <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                    <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                    <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                    <th class="border border-gray-300 px-2 w-[180px] text-center">TRẠNG THÁI</th>
                    <th class="border border-gray-300 px-2 text-center">THAO TÁC</th>
                </tr>
            </thead>
            <tbody class="cursor-pointer">
                <ul>
                    @foreach($posts as $key => $post)
                    <tr class="hover:bg-yellow-100">
                        <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                        <td class="border border-gray-300 px-2 py-3">
                            <a href="{{ route('client.posts.show', $post->id) }}">
                                <img class="w-[100px] h-[100px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                            </a>
                        </td>
                        <td class="border border-gray-300 px-2 post-title">{{ $post->title }}</td>
                        <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                        <td class="border border-gray-300 px-2 text-center">
                            <button class="bg-blue-400 py-2 px-2 rounded-md text-white">Đã được duyệt</button>
                        </td>
                        <td class="border border-gray-300 px-2">
                            <div class="flex gap-2 justify-center items-center">
                                <form action="{{ route('client.posts.post_destroy', $post->id ) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('delete')     
                                    <button type="submit" class="delete" onclick="return confirm('Bạn muốn xóa bài viết?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>  
                                    </button>                    
                                </form>
                            </div>
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

