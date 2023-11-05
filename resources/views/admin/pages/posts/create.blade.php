@extends('admin.layouts.master')

@section('title', 'Thêm bài viết')


@section('content')
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div>
            <strong>Tiêu đề:</strong> <br>
            <input type="text" name="title" class="border border-gray-300 rounded-md w-full" placeholder="Title" value="{{ old('title') }}">
        </div>

        <div class="mt-6">
            <strong>Tiêu đề:</strong> <br>

            <select name="tutorial_id" class="border border-gray-300 rounded-md w-full">
                @foreach ($tutorials as $tutorial)
                    <option value="{{ $tutorial->id }}">{{ $tutorial->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-6">
            <strong class="mb-2">Nội dung:</strong>
            <textarea name="content" id="editor"></textarea>
        </div>
        <div class="float-right">
            <button class="bg-blue-400 px-3 py-2 text-white mt-6 rounded-lg" type="submit">Tạo bài viết</button>
        </div>
    </form>
</div>
<script>
    ClassicEditor.create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: '{{route('admin.posts.upload_image').'?_token='.csrf_token()}}',
        },

    })
    .catch(error => {
        console.log(error);
    });
</script>
@stop
