@extends('client.layouts.account')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    @if($posts->count() > 0)
        <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết Bị Từ Chối Duyệt</h1>
        <table class="w-full">
            <thead>
                <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                    <th class="border border-gray-300 py-3 text-center">STT</th>
                    <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                    <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                    <th class="border border-gray-300 px-2">NGƯỜI VIẾT</th>
                    <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                    <th class="border border-gray-300 px-2 text-center w-[180px]">THAO TÁC</th>
                </tr>
            </thead>
            <tbody class="cursor-pointer">
                <ul>
                    @foreach($posts as $key => $post)
                    <tr class="hover:bg-yellow-100" id="post_{{ $post->id }}">
                        <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                        <td class="border border-gray-300 px-2 py-3">
                            <a href="{{ route('client.posts.show', $post->id) }}">
                                <img class="w-[100px] h-[100px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                            </a>
                        </td>
                        <td class="border border-gray-300 px-2 post-title">{{ $post->title }}</td>
                        <td class="border border-gray-300 px-2">{{ $post->author->name ?? "unknow"}}</td>
                        <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                        <td class="border border-gray-300 px-2 text-center">
                            <div class="flex gap-3 flex-1 items-center justify-center">
                                <button class="bg-blue-500 py-2 px-2 rounded-md text-white action-button" data-post-id="{{ $post->id }}">
                                    <a href="{{ route('client.posts.pending', $post->id) }}">Đăng bài</a>
                                </button>
                                <button class="bg-red-500 py-2 px-2 rounded-md text-white">
                                    <a href="{{ route('client.posts.post_edit', $post->id) }}">
                                        Sửa
                                    </a>
                                </button> 
                            </div>                            
                        </td>
                    </tr>
                    @endforeach
                </ul>                      
            </tbody>
        </table>
    @else
        <p class="py-5 text-2xl font-medium px-5 text-center">Bạn chưa có bài viết nào bị từ chối duyệt</p>
    @endif 
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.action-button').click(function() {
        event.preventDefault();
        var postId = $(this).attr('data-post-id');
        
        $.ajax({
                url: '{{ route('client.posts.pending', ['postId' => ':postId']) }}'.replace(':postId', postId),
                method: 'POST',
                data: {_token: '{{ csrf_token() }}'},
                success: function(response) {
                    alert('Bài viết sẽ chuyển sang chờ duyệt!');
                    $('#post_' + postId).remove();
                    console.log(postId);
                },
                error: function(err) {
                    alert('Đã xảy ra lỗi trong quá trình duyệt bài viết.');
                }
            });
    });

</script>
@stop

