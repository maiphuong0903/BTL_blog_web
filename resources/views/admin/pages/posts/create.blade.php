@extends('admin.layouts.master')

@section('title', 'Thêm bài viết')


@section('content')
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div>
            <strong>Tiêu đề:</strong> <br>
            <input type="text" name="title" class="border border-gray-300 rounded-md w-full" placeholder="Title" value="{{ old('title') }}">
        </div><br>
        <div class="form-group">
            <strong class="mb-2">Nội dung:</strong>
            <textarea name="content" id="editor"></textarea>
        </div>
        <div class="form-group">
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
