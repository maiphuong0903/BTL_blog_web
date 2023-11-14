@extends('client.layouts.master')

@section('title', 'Blog - Trang chủ')

@section('content')
<div>
    <div class="pb-10 pt-10 lg:mx-8 mx-4">
        <h1 class="text-center font-bold text-2xl text-[#92d3f9]">Kết quả tìm kiếm cho từ khóa "{{$keyWord}}"</h1>
        <hr class="mx-auto w-28 border-[#92d3f9] mt-2 mb-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-7 xl:mx-24">
            @include('client.partial.post')
        </div>
    </div>
</div>
@stop
