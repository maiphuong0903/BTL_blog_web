@extends('client.layouts.master')

@section('title', 'Blog - Trang chủ')

@section('content')
<div>
    <div class="pb-10 pt-20 lg:mx-8 mx-4">
        <h1 class="text-center font-bold text-2xl text-[#92d3f9]">{{ $tutorial->name }}</h1>
        <hr class="mx-auto w-28 border-[#92d3f9] mt-2 mb-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-7 xl:mx-24">
            @foreach ($posts as $post)
                <a  href="{{ route('client.post.detail', ['post' => $post->id]) }}" class="mb-10 bg-white rounded-lg overflow-hidden shadow-md">
                    <img class="w-full h-[210px] object-cover" src="{{ $post->image }}" alt="Image">
                    <div class="flex flex-col h-[130px] px-2.5 pb-3 mb-2">
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
