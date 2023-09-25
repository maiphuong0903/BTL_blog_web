@extends('client.layouts.master')

@section('title', 'Blog - Trang chủ')


@section('content')
<div>
    @include('client.components.home.banner')

    @foreach ($data as $tutorial)
    <p>{{ $tutorial->name }}</p>
    @endforeach
</div>
@stop