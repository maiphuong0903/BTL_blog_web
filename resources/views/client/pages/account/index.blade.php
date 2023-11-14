@extends('client.layouts.account')

@section('title', 'Quản lý tài khoản')


@section('content')

   <div class="bg-white shadow-md py-4 px-6">
    <h2 class="text-xl font-semibold text-gray-500 pt-5 pb-8">Thông tin cá nhân</h2>
    <div class=" flex flex-1 gap-10 items-center">
        <div>
            @if(auth()->user()->avatar)
                <img class="h-24 w-24 rounded-full object-cover cursor-pointer" src="{{ auth()->user()->avatar }}" alt="">
            @else
                <img class="h-24 w-24 rounded-full object-cover cursor-pointer" src="https://vnw-img-cdn.popsww.com/api/v2/containers/file2/cms_topic/doraemons9_05_seriesdetailimagemobile-80424f74d030-1609395371290-iZgELVcX.png?v=0" alt="">
            @endif   
        </div>
        <div>          
            <p class="py-2">Tên tài khoản :  {{ $user->name }}</p>
            <p class="pb-2 pt-3">Email :  {{ $user->email }}</p> 
        </div>
    </div>
    <button class="bg-[#292c45] text-white p-3 rounded-lg mt-8 mb-3">
        <a href="{{ route('client.edit', $user->id) }}">
            Thay đổi thông tin
        </a>
    </button>
   </div>
@stop
