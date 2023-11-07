@extends('client.layouts.master')

@section('title', 'Blog - Trang chủ')


@section('content')
<div>
    @include('client.components.home.banner')
    <div class="mb-10 pt-20 2xl:mx-32 mx-5 lg:mx-8">
        <h1 class="text-center font-bold text-2xl text-[#92d3f9]">FRAMEWORK PHỔ BIẾN NHẤT</h1>
        <hr class="mx-auto w-28 border-[#92d3f9] mt-2 mb-10">
        <div class="md:grid md:grid-cols-3 lg:gap-x-10 gap-x-6">
            <div class="px-4 lg:px-8 py-5 rounded-xl bg-[#292c45] h-[420px] xl:h-[500px] flex flex-col mb-6">
                <h1 class="text-2xl font-semibold my-2 text-center text-[#92d3f9]">Laravel</h1>
                <p class="text-justify text-white text-lg">Là Framework PHP cung cấp nhiều đặt tính tiện ích và giúp đơn giản hóa việc phát triển các ứng dụng phức tạp.</p>
                <div class="flex-grow"></div>
                <div class="grid grid-cols-2 items-center mt-auto">
                    <div>
                        <button class="bg-[#b7acde] px-4 py-2 rounded-xl text-white hover:text-black hover:bg-white">Học ngay</button>
                    </div>
                    <div>
                        <img class="xl:w-[200px] xl:h-[150px]" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="px-4 lg:px-8 py-5 rounded-xl bg-[#292c45] h-[420px] xl:h-[500px] flex flex-col mb-6">
                <h1 class="text-2xl font-semibold my-2 text-center text-[#92d3f9]">ReactJS</h1>
                <p class="text-justify text-white text-lg">Là Framework JavaScript mã nguồn mở được sử dụng để xây dựng các giao diện người dùng.</p>
                <div class="flex-grow"></div>
                <div class="grid grid-cols-2 items-center mt-auto">
                    <div>
                        <button class="bg-[#b7acde] px-4 py-2 rounded-xl text-white hover:text-black hover:bg-white">Học ngay</button>
                    </div>
                    <div>
                        <img class="xl:w-[200px] xl:h-[150px]" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1150px-React-icon.svg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="px-4 lg:px-8 py-5 rounded-xl bg-[#292c45] h-[420px] xl:h-[500px] flex flex-col mb-6">
                <h1 class="text-2xl font-semibold my-2 text-center text-[#92d3f9]">VueJS</h1>
                <p class="text-justify text-white text-lg">Là Framework JavaScript mã nguồn mở được sử dụng để xây dựng các giao diện người dùng và các ứng dụng web độc lập.</p>
                <div class="flex-grow"></div>
                <div class="grid grid-cols-2 items-center mt-auto">
                    <div>
                        <button class="bg-[#b7acde] px-4 py-2 rounded-xl text-white hover:text-black hover:bg-white">Học ngay</button>
                    </div>
                    <div>
                        <img class="xl:w-[200px] xl:h-[150px]" src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Vue.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-10 mt-20 2xl:mx-32 mx-5 lg:mx-8">
        <h1 class="text-center font-bold text-2xl text-[#92d3f9]">NGÔN NGỮ LẬP TRÌNH PHỔ BIẾN</h1>
        <hr class="mx-auto w-28 border-[#92d3f9] mt-2 mb-10">
        <div class="grid md:grid-cols-5 grid-cols-3 bg-[#292c45] rounded-3xl lg:px-24 px-5 py-9 text-center">
            <div class="flex items-center justify-center">
                <img class="w-[200px] h-[150px]" src="https://codevivu.com/wp-content/uploads/2016/12/elephpant.png" alt="">
            </div>
            <div class="flex items-center justify-center">
                <img class="w-[170px] h-[170px]" src="https://cdn.icon-icons.com/icons2/2415/PNG/512/csharp_original_logo_icon_146578.png" alt="">
            </div>
            <div class="flex items-center justify-center">
                <img class="w-[220px] h-[220px]" src="https://itplus-academy.edu.vn/upload/javalogo.png" alt="">
            </div>
            <div class="flex items-center justify-center">
                <img class="w-[200px] h-[150px]" src="https://www.freepnglogos.com/uploads/javascript-png/javascript-logo-transparent-logo-javascript-images-3.png" alt="">
            </div>
            <div class="flex items-center justify-center">
                <img class="w-[170px] h-[170px]" src="https://cdn.icon-icons.com/icons2/2699/PNG/512/python_vertical_logo_icon_168039.png" alt="">
            </div>
        </div>
    </div>
    {{-- Bài viết --}}
    <div class="pb-10 pt-20 lg:mx-8 mx-4">
        <h1 class="text-center font-bold text-2xl text-[#92d3f9]">BÀI VIẾT MỚI NHẤT</h1>
        <hr class="mx-auto w-28 border-[#92d3f9] mt-2 mb-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-7 xl:mx-24">
            @foreach ($posts as $post)
                <a  href="{{ route('client.post.detail', ['post' => $post->id]) }}" class="mb-10 bg-white rounded-lg overflow-hidden shadow-md">
                    <img class="w-full h-[210px] object-cover" src="{{ $post->image }}" alt="Image">
                    <div class="flex flex-col h-[130px] px-2.5 pb-3">
                        <div class="py-2 font-medium text-gray-500 h-[60px] overflow-hidden text-lg">{{ $post->title }}</div>
                        {{-- <div class="h-[50px] overflow-hidden mt-1">
                            <p class="text-sm text-gray-500">
                                {!! $post->content !!}
                            </p>
                        </div> --}}

                        <div class="flex 2xl:pr-1 mt-auto items-center">
                            <div class="text-[13px] text-white px-3 py-0.5 rounded-full bg-[#292c45] capitalize">
                                {{ $post->author->name ?? "unknow"}}
                            </div>
                            <div class="flex flex-1 justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@stop
