@extends('client.layouts.account')

@section('title', 'Sửa bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <form action="{{ route('client.posts.post_update', $post->id) }}" method="post" enctype="multipart/form-data">
        <h1 class="text-[30px] text-center my-3 font-medium">Sửa Bài Viết</h1>
        @method('PUT')
        @csrf
        <div>
            <strong>Tiêu đề:</strong> <br>
            <input type="text" name="title" class="border border-gray-300 rounded-md w-full" placeholder="Title" value="{{ $post->title }}">
        </div>

        <div class="mt-6">
            <strong>Danh mục:</strong> <br>
            <select name="tutorial_id" class="border border-gray-300 rounded-md w-full">
                @foreach ($tutorials as $tutorial)
                    <option value="{{ $tutorial->id }}" {{ $tutorial->id == $post->tutorial_id ? 'selected' : '' }}>
                        {{ $tutorial->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-6">
            <strong>Tags:</strong><br>
            <div class="flex">
                @foreach ($tags as $tag)
                    <label class="block mr-6">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <strong>Ảnh bài viết:</strong> <br>
            <input type="file" name="image" id="image" class="rounded-md">
            <img id="image-preview" src="{{ $post->image}}" alt="Hình ảnh hiện tại" class="w-[250px] h-[230px] object-cover mt-2">    
      </div> 

        <div class="mt-6">
            <strong class="mb-2">Nội dung:</strong>
            <textarea name="content" id="editor">{{ $post->content }}</textarea>
        </div>
        <div class="float-right">
            <button class="bg-blue-400 px-3 py-2 text-white mt-6 rounded-lg" type="submit">Sửa bài viết</button>
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

<script>
  const imageInput = document.getElementById('image');
  const imagePreview = document.getElementById('image-preview');

  imageInput.addEventListener('change', function() {
    const file = imageInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
    }
  });
</script>
@stop
