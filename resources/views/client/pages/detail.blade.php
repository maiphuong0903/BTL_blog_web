@extends('client.layouts.master')

@section('title', 'Detail')


@section('content')
<div class="px-5 md:px-10 lg:px-20 xl:px-52 py-10">
    <div class="bg-white shadow-md px-16 py-14">
        {{-- posts --}}
        <h1 class="text-4xl text-[#292c45] py-5 rounded-lg w-full font-bold">{{ $post->title}}</h1>
        <div class="flex items-center justify-between mb-20">
        {{-- tags --}}
        <div class="border-gray-400 flex gap-3 rounded-lg items-center">
            <div>
                <p class="text-lg font-medium text-gray-700">TAG: </p>
            </div>
            <div class="flex space-x-2">
                @foreach ($tags as $tag)
                    <button class="bg-[#292c45] text-white px-3 py-1 rounded-md">{{ $tag->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="flex gap-4">
            <p>{{$post->created_at}}</p>
            <div class="flex gap-1 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                </svg>
                <p>({{ optional($post->comments)->count() ?? 0 }})</p>
            </div>

            <div class="flex gap-1 items-center justify-center">
                <button class="toggle-favorite" data-post-id="{{ $post->id }}" data-is-like="{{ optional($post->like)->is_like ? 'true' : 'false' }}">
                    @if (optional($post->like)->is_like)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg> 
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>           
                    @endif
                </button>
                <p>( {{ optional($post->likes)->count() ?? 0 }} )</p>
            </div>
        </div>
    </div>

    {{-- content --}}
    <div class="text-xl leading-10">
        {!! htmlspecialchars_decode($post->content) !!}
    </div>



    {{-- comment --}}
    <h1 class="text-2xl font-medium mt-20 mb-2">Bình luận</h1>
    <hr class="border-[#c7c7c8]">
    @auth()
    <div class="rounded-lg py-5">
        <form action="{{ route('client.comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="flex gap-6 my-3">
                <img class="w-[50px] h-[50px] rounded-full object-cover cursor-pointer" src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/avatar-doremon-cute-1.jpg" alt="">
                <textarea class="w-full border-gray-300 rounded-md py-4" name="comment" rows="2" placeholder="{{ Auth::check() ? 'Nhập bình luận.....' : 'Vui lòng đăng nhập để bình luận' }}"></textarea>
            </div>
            <div class="flex flex-1 justify-end">
                <button class="bg-[#292c45] px-6 py-3 rounded-md text-white" type="submit">Submit</button>
            </div>
        </form>
    </div>
    @else
    <div class="mt-4 border border-gray-300 py-6 rounded-lg text-center flex items-center text-gray-400 gap-1 justify-center cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
        </svg>          
        <a href="{{ route('login') }}" class="text-lg">Đăng nhập để bình luận</a>
    </div>
    @endauth


    {{-- show comment --}}
    @foreach ($comments as $comment)
    <div class="flex gap-5 mt-4">
        @if ($comment->viewer->avatar)
            <img class="w-[35px] h-[35px] rounded-full object-cover cursor-pointer" src="{{ $comment->viewer->avatar }}" alt="Avatar">
        @else
            <img class="w-[35px] h-[35px] rounded-full object-cover cursor-pointer" src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/avatar-doremon-cute-1.jpg" alt="">
        @endif
        <div>
            <h1 class="font-medium text-lg cursor-pointer text-[#385898] capitalize mt-1.5">{{$comment->viewer->name ?? "unknow"}}</h1>
            <p class="text-gray-800 text-justify">{{ $comment->comment }}</p>
            <div class="flex md:gap-5 gap-3 py-2">
                <button class="cursor-pointer text-[#4d6fb5]">Thích</button>
                <button class="cursor-pointer text-[#4d6fb5] comment-reply-button" id="show">Phản hồi</button>
                <div class="flex gap-1 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                    </svg>
                    <p>0</p>
                </div>
                <p class="text-gray-400">{{ $comment->created_at }}</p>
            </div>
        </div>
    </div>

    {{-- show reply --}}
    @foreach ($comment->reply as $reply)
    <div class="flex gap-5 ml-12">
        @if ($reply->viewer->avatar)
            <img class="w-[35px] h-[35px] rounded-full object-cover cursor-pointer" src="{{ $comment->viewer->avatar }}" alt="Avatar">
        @else
        <img class="w-[35px] h-[35px] rounded-full object-cover cursor-pointer" src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/avatar-doremon-cute-1.jpg" alt="">
        @endif
        <div>
            <h1 class="font-medium text-lg cursor-pointer text-[#385898] capitalize mt-1.5">{{$reply->viewer->name ?? "unknow"}}</h1>
            <p class="text-gray-800 text-justify">{{ $reply->comment }}</p>
        </div>
    </div>
    @endforeach

    {{-- reply comment--}}
    <div class="rounded-lg px-5 py-2 ml-[30px] hidden comment-reply-form" id="hidden">
        <form action="{{ route('client.comments.store', $post->id) }}" method="POST">
        @csrf
            <div class="flex gap-4 my-3">
                <img class="w-[50px] h-[50px] rounded-full object-cover cursor-pointer" src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/avatar-doremon-cute-1.jpg" alt="">
                <input hidden name="reply_comment" value="{{ $comment->id }}">
                <input name="comment" class="w-full border-gray-300 rounded-md" type="text" placeholder="Thêm phản hồi...">
            </div>
            <div class="flex flex-1 justify-end gap-2">
                <button type="button" class="bg-gray-300 px-3 py-2 font-normal rounded-md">Hủy</button>
                <button type="submit" class="bg-[#292c45] px-3 py-2 rounded-md text-white">Submit</button>
            </div>
        </form>
    </div>

    @endforeach
    </div>
    
    {{-- posts liên quan --}}
    <h1 class="text-2xl font-semibold text-gray-500 mt-20 mb-5">Một số bài viết liên quan</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-7">
        @foreach ($relatedPosts as $relatedPost)
            <a  href="{{ route('client.post.detail', ['post' => $relatedPost->id]) }}" class="mb-10 bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-[210px] object-cover" src="{{ $relatedPost->image }}" alt="Image">
                <div class="flex flex-col h-[130px] px-2.5 pb-3 mb-2">
                    <div class="py-2 font-medium text-gray-500 h-[60px] overflow-hidden text-lg">{{ $relatedPost->title }}</div>
                    <div class="flex 2xl:pr-1 mt-auto items-center">
                        <div class="text-[13px] text-white px-3 py-0.5 rounded-full bg-[#292c45] capitalize">
                            {{ $relatedPost->author->name ?? "unknow"}}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Tìm tất cả các phần tử có lớp "comment-reply-button" và "comment-reply-form"
    const replyButtons = document.querySelectorAll('.comment-reply-button');
    const replyForms = document.querySelectorAll('.comment-reply-form');

    // Gán sự kiện click cho từng nút "Phản hồi"
    replyButtons.forEach((button, index) => {
        button.addEventListener('click', (event) => {
            // Ngăn chặn sự kiện click từ việc lan ra bên ngoài
            event.stopPropagation();

            // Hiển thị form phản hồi tương ứng với nút được nhấn
            replyForms[index].style.display = 'block';
        });
    });

    // Gán sự kiện click cho nút "Hủy" trong mỗi form
    const cancelButton = document.querySelectorAll('.comment-reply-form .bg-gray-300');
    cancelButton.forEach((button, index) => {
        button.addEventListener('click', (event) => {
            // Ngăn chặn sự kiện click từ việc lan ra bên ngoài
            event.stopPropagation();

            // Ẩn form phản hồi tương ứng với nút "Hủy"
            replyForms[index].style.display = 'none';
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.toggle-favorite').on('click', function (event) {
            event.preventDefault();

            @if (auth()->check())
                var button = $(this);
                var postId = button.data('post-id');
                var isLike = button.data('is-like');

                $.ajax({
                    url: '{{ route('client.like.toggle', ['post' => ':postId']) }}'.replace(':postId', postId),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (response) {
                        if (response.is_like) {
                            button.html('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
                        } else {
                            button.html('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
                        }

                        localStorage.setItem('post_' + postId, response.is_like);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            @else
                var confirmLogin = confirm('Vui lòng đăng nhập để thích bài viết. Bạn có muốn chuyển đến trang đăng nhập?');
                    if (confirmLogin) {
                        window.location.href = '{{ route('login') }}';
                    }
            @endif
        });

        $('.toggle-favorite').each(function () {
            var button = $(this);
            var postId = button.data('post-id');
            var isLike = localStorage.getItem('post_' + postId);

            if (isLike === 'true') {
                 button.html('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
            } else {
                button.html('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>');
            }
        });
    });

</script>


@stop
