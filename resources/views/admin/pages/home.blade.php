@extends('admin.layouts.master')

@section('title', 'Blog')


@section('content')
<div class="mx-5">
   <div class="grid grid-cols-2 gap-6 xl:grid-cols-4 xl:gap-8 2xl:gap-10">
      <div class="bg-white px-6 py-5 rounded-md shadow-sm">      
         <div class="flex flex-1 justify-between py-4 items-center">
           <div>
               <h1 class="text-[18px]">BÀI VIẾT</h1>
               <p class="text-xl pt-3 font-bold">{{ $postInMonth }}</p>
           </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
             </svg>
         </div>
      </div>
      <div class="bg-white px-6 py-5 rounded-md shadow-sm">
         <div class="flex flex-1 justify-between py-4 items-center">
            <div>
               <h1 class="text-[18px]">Tài Khoản</h1>
                <p class="text-xl pt-3 font-bold">{{ $totalUsers }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>             
          </div>    
      </div>

      <div class="bg-white px-6 py-5 rounded-md shadow-sm">
         <div class="flex flex-1 justify-between py-4 items-center">
            <div>
               <h1 class="text-[18px]">BÌNH LUẬN</h1>
                <p class="text-xl pt-3 font-bold">{{ $totalComments }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
            </svg>                        
          </div> 
      </div>

      <div class="bg-white px-6 py-5 rounded-md shadow-sm">
         <div class="flex flex-1 justify-between py-4 items-center">
            <div>
               <h1 class="text-[18px]">YÊU THÍCH</h1>
                <p class="text-xl pt-3 font-bold">{{ $totalLikes }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
               <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>                                     
          </div> 
      </div>

   </div>
   <div class="grid grid-cols-2">
      <div class="">
         <h1>Hình ảnh</h1>
      </div>
      <div class="mt-10 px-7 py-5 bg-white shadow-lg">
         <h1 class="text-xl mb-5 font-medium text-gray-500">List 10 bài viết được yêu thích nhiều nhất trong tháng</h1>
         @foreach ($posts as $post)
             <div class="flex gap-5 items-center py-2">
                 <img class="h-[80px] w-[150px] object-cover rounded-md" src="{{$post->image}}" alt="">
                 <div>
                     <h1 class="text-[18px]">{{$post->title}}</h1>
                     <div class="flex gap-4 text-gray-400">
                         <p>{{ $post->likes_count }} Yêu thích</p>
                         <p class="text-md">{{ $post->comments_count }} Comment</p>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
   </div>
  
</div>
@stop
