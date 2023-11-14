@extends('client.layouts.account')

@section('title', 'Quản lý tài khoản')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết Yêu Thích</h1>

    <table class="w-full">
        <thead>
            <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                <th class="border border-gray-300 py-3 text-center">STT</th>
                <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                <th class="border border-gray-300 px-2">NGƯỜI VIẾT</th>
                <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                <th class="border border-gray-300 px-2"></th>
            </tr>
        </thead>
        <tbody class="cursor-pointer">
            @if($likedPosts->count() > 0)
                <ul>
                    @foreach($likedPosts as $key => $like)
                    <tr class="hover:bg-yellow-100">
                        <td class="border border-gray-300 py-3 text-center">{{($likedPosts->currentPage() - 1) * $likedPosts->perPage() + $key+1}}</td>
                        <td class="border border-gray-300 px-2 py-3">
                            <img class="w-[100px] h-[100px] object-cover mx-auto" src="{{ $like->post->image }}" alt="Image">
                        </td>
                        <td class="border border-gray-300 px-2 post-title">{{ $like->post->title }}</td>
                        <td class="border border-gray-300 px-2">{{ $like->post->author->name ?? "unknow"}}</td>
                        <td class="border border-gray-300 px-2">{{ $like->post->created_at }}</td>
                        <td class="border border-gray-300 px-2 text-center">
                            <button class="toggle-favorite" data-post-id="{{ $like->post->id }}" data-is-like="{{ $like->post->is_like ? 'true' : 'false' }}">
                                @if ($like->post->is_like)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg> 
                                @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>          
                            </button>                                                                                   
                        </td>
                    </tr>
                    @endforeach
                </ul>
            @else
                <p>No liked posts found.</p>
            @endif
            
        </tbody>
    </table>
    <div class="absolute bottom-6 right-6">
        {{ $likedPosts->links() }}
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.toggle-favorite').on('click', function (event) {
            event.preventDefault();

            var button = $(this);
            var postId = button.data('post-id');
            var isLike = button.data('is-like');

            var postTitle = button.closest('tr').find('.post-title').text();
            var confirmUnfavorite = window.confirm('Bạn muốn bỏ yêu thích bài viết "' + postTitle + '"?');

            if (confirmUnfavorite) {
                $.ajax({
                    url: '{{ route('client.like.toggle', ['post' => ':postId']) }}'.replace(':postId', postId),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (response) {
                        if (response.is_like) {
                            button.closest('tr').remove();
                        } else {
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>


@stop

