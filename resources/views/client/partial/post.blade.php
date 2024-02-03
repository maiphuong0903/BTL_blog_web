@foreach ($posts as $post)
    <a href="{{ route('client.post.detail', ['post' => $post->id]) }}" class="mb-10 bg-white rounded-lg overflow-hidden shadow-md">
        <img class="w-full h-[210px] object-cover" src="{{ $post->image }}" alt="Image">
        <div class="flex flex-col h-[130px] px-2.5 pb-3">
            <div class="py-2 font-semibold text-gray-800 h-[60px] overflow-hidden">{{ $post->title }}</div>
            <div class="flex 2xl:pr-1 mt-auto items-center mb-2">
                <div class="text-[13px] text-white px-3 py-0.5 rounded-full bg-[#292c45] capitalize">
                    {{ $post->author->name ?? "unknown"}}
                </div>
                <div class="flex flex-1 justify-end">
                    <button class="toggle-favorite" data-post-id="{{ $post->id }}" data-is-like="{{ $post->is_liked ? 'true' : 'false' }}">
                        @if ($post->is_liked)
                            UNLIKE
                        @else
                           LIKE        
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </a>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            button.html('UNLIKE')
                        } else {
                            button.html('LIKE')
                        }
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
    });
</script>

