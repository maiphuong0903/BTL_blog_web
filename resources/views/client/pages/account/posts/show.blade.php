@extends('client.layouts.account')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <div class="px-7 py-10">
        <h1 class="text-xl font-medium mb-3">Thông tin chung</h1>
        <hr>
        <div class="grid grid-cols-2 gap-5 mt-14 ml-10 text-gray-500 font-medium">
            <div>
                <form class="w-full max-w-sm">
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <h1 class="text-[18px]">Tên bài viết</h1>
                      </div>
                      <div class="md:w-2/3">
                        <p>{{ $post->title }}</p>
                      </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <h1 class="text-[18px]">Tác giả</h1>
                      </div>
                      <div class="md:w-2/3">
                        <p>{{ $post->author->name }}</p>
                      </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                          <h1 class="text-[18px]">Hình ảnh</h1>
                        </div>
                        <div class="md:w-2/3">
                            <img class="w-[100px] h-[100px] object-cover" src="{{ $post->image }}" alt="Image">
                        </div>
                    </div>
                </form>
            </div>
            <div class="ml-24">
                <form class="w-full max-w-sm">
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <h1 class="text-[18px]">Ngày tạo</h1>
                      </div>
                      <div class="md:w-2/3">
                        <p>{{ $post->created_at }}</p>
                      </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <h1 class="text-[18px]">Ngày sửa</h1>
                      </div>
                      <div class="md:w-2/3">
                        <p>{{ $post->updated_at }}</p>
                      </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                          <h1 class="text-[18px]">Tình trạng</h1>
                        </div>
                        <div class="md:w-2/3">
                          <p>
                            @if($post->status == 0)
                            <p>Chờ duyệt</p>
                            @elseif($post->status == 1)
                                <p>Đã duyệt</p>
                            @elseif($post->status == 2)
                                <p>Từ chối duyệt</p>
                            @endif
                        </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ml-10">
            <h1>Mô tả</h1>
            <p>{!! $post->content !!}</p>
        </div>
    </div>  
</div>
@stop
