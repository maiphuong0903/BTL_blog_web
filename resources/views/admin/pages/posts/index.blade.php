@extends('admin.layouts.master')

@section('title', 'Quản lý bài viết')


@section('content')
<div class="bg-white shadow-md rounded-md px-7 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết</h1>
    <table class="w-full mb-7">
        <thead>
            <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                <th class="border border-gray-300 py-3 text-center">STT</th>
                <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                <th class="border border-gray-300 px-2">NGƯỜI TẠO</th>
                <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                <th class="border border-gray-300 px-2 text-center">THAO TÁC</th>
            </tr>
        </thead>
        <tbody class="cursor-pointer">
            @foreach ($posts as $key => $post)
                <tr class="hover:bg-yellow-100">
                    <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                    <td class="border border-gray-300 px-2 py-3">
                        <a href="{{ route('admin.posts.show', $post->id) }}">
                            <img class="w-[80px] h-[80px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                        </a>
                    </td>
                    <td class="border border-gray-300 px-2">{{ $post->title }}</td>
                    <td class="border border-gray-300 px-2">{{ $post->name ?? "unknow"}}</td>
                    <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                    <td class="border border-gray-300 px-2">
                        <div class="flex gap-2 justify-center items-center">
                            <a href="{{ route('admin.posts.edit', $post->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id ) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('delete')     
                                <button type="submit" class="delete" onclick="return confirm('Bạn có muốn xóa không')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>  
                                </button>                    
                            </form>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

     {{-- phân trang --}}
     <div class="absolute bottom-6 right-6">
        {{$posts->links()}}
    </div>
</div>
@stop
