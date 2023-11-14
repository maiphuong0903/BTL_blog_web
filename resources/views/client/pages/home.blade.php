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
            @include('client.partial.post')
        </div>
    </div>
</div>
@stop
