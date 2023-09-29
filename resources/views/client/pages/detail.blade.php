@extends('client.layouts.master')

@section('title', 'Detail')


@section('content')
<div class="xl:px-24 py-10 px-6">
    <h1 class="text-2xl text-white bg-[#292c45] px-5 py-5 rounded-lg w-full">{{ $post->title}}</h1>
    <div class="flex flex-1 gap-4 justify-end my-5 mx-5">
        <p>{{$post->created_at}}</p>
        <div class="flex gap-1 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>              
            <p>0</p>
        </div>

        <div class="flex gap-1 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg> 
            <p>0</p>
        </div>  
    </div>

    <p>{{$post->content}}</p>

    {{-- comment --}}
    <div class="mt-20 mb-8 rounded-lg px-5 py-5">
        <h1 class="text-2xl font-medium">Bình luận</h1>
        <div class="flex gap-4 my-3 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-14 h-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>       
            <input class="w-full border-gray-300 rounded-md mr-5" type="text" placeholder="Viết bình luận...">  
            <button class="bg-[#292c45] px-6 h-[40px] rounded-md text-white">Submit</button>   
        </div>     
    </div>

    {{-- show comment --}}
    <div class="flex gap-5">
        <img class="w-[70px] h-[70px] rounded-full object-cover cursor-pointer" src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/avatar-doremon-cute-1.jpg" alt="">
        <div>
            <h1 class="font-medium text-xl cursor-pointer text-[#385898] capitalize">{{$post->author->name}}</h1>
            <p class="text-gray-800 text-justify">Doraemon là nhân vật chính hư cấu trong loạt Manga cùng tên của họa sĩ Fujiko F. Fujio. Trong truyện lấy bối cảnh ở thế kỷ 22, Doraemon là chú mèo robot của tương lai do xưởng Matsushiba — công xưởng chuyên sản xuất robot vốn dĩ nhằm mục đích chăm sóc trẻ nhỏ. Wikipedia</p>
            <div class="flex md:gap-5 gap-3 py-3">
                <p class="cursor-pointer text-[#4d6fb5]">Thích</p>
                <p class="cursor-pointer text-[#4d6fb5]">Phản hồi</p>
                <div class="flex gap-1 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                    </svg>     
                    <p>0</p>                 
                </div>  
                <p class="text-gray-400">1 tuần</p>
            </div>
        </div>
    </div>

    {{-- reply --}}
    <div class="mb-8 rounded-lg px-5 py-5 ml-[60px]">
        <div class="flex gap-4 my-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-14 h-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>       
            <input class="w-full border-gray-300 rounded-md" type="text" placeholder="Thêm phản hồi...">     
        </div>
        <div class="flex flex-1 justify-end gap-2">
            <button class="bg-gray-300 px-3 py-2 font-normal rounded-md">Hủy</button>
            <button class="bg-[#292c45] px-3 py-2 rounded-md text-white">Submit</button>
        </div>      
    </div>

    <h1 class="text-2xl font-semibold text-gray-500 mt-10 mb-5">Một số bài viết liên quan</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-x-7">
        <div class="bg-white shadow-md rounded-lg mb-14 overflow-hidden">
            <img class="w-full h-[210px] object-cover" src="https://source.unsplash.com/random" alt="">
            <div class="flex flex-col h-[180px] px-2.5 pb-3">
                <div class="py-2 font-semibold text-gray-800 h-[60px] overflow-hidden">{{ $post->title }}</div>
                <div class="h-[60px] overflow-hidden mt-1">
                    <p class="text-sm text-gray-500">
                        {!! $post->content !!}
                    </p>
                </div>
             
                <div class="flex 2xl:pr-1 mt-auto items-center">
                    <div class="text-[12px] text-white px-3 py-0.5 rounded-full bg-[#292c45]">
                        {{ $post->author->name}}
                    </div>
                    <div class="flex flex-1 justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg> 
                    </div>                  
                </div>
            </div>
        </div> 

        <div class="bg-white shadow-md rounded-lg mb-14 overflow-hidden">
            <img class="w-full h-[210px] object-cover" src="https://source.unsplash.com/random" alt="">
            <div class="flex flex-col h-[180px] px-2.5 pb-3">
                <div class="py-2 font-semibold text-gray-800 h-[60px] overflow-hidden">{{ $post->title }}</div>
                <div class="h-[60px] overflow-hidden mt-1">
                    <p class="text-sm text-gray-500">
                        {!! $post->content !!}
                    </p>
                </div>
             
                <div class="flex 2xl:pr-1 mt-auto items-center">
                    <div class="text-[12px] text-white px-3 py-0.5 rounded-full bg-[#292c45]">
                        {{ $post->author->name}}
                    </div>
                    <div class="flex flex-1 justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg> 
                    </div>                  
                </div>
            </div>
        </div> 

        <div class="bg-white shadow-md rounded-lg mb-14 overflow-hidden">
            <img class="w-full h-[210px] object-cover" src="https://source.unsplash.com/random" alt="">
            <div class="flex flex-col h-[180px] px-2.5 pb-3">
                <div class="py-2 font-semibold text-gray-800 h-[60px] overflow-hidden">{{ $post->title }}</div>
                <div class="h-[60px] overflow-hidden mt-1">
                    <p class="text-sm text-gray-500">
                        {!! $post->content !!}
                    </p>
                </div>
             
                <div class="flex 2xl:pr-1 mt-auto items-center">
                    <div class="text-[12px] text-white px-3 py-0.5 rounded-full bg-[#292c45]">
                        {{ $post->author->name}}
                    </div>
                    <div class="flex flex-1 justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg> 
                    </div>                  
                </div>
            </div>
        </div>

    </div>
</div>

@stop   
