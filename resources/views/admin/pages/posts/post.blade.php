@extends('admin.layouts.master')

@section('title', 'Quản lý bài đăng')


@section('content')
<div class="bg-white shadow-md rounded-md px-7 pt-3 relative min-h-[calc(100vh-145px)] pb-14">
    @if($posts->count() > 0)
        <h1 class="text-[25px] text-center mt-3 mb-5 font-medium">Danh Sách Bài Viết Chờ Duyệt</h1>
        <table class="w-full">
            <thead>
                <tr class="bg-[#f3f2f7] text-left text-gray-600 text-[15px]">
                    <th class="border border-gray-300 py-3 text-center">STT</th>
                    <th class="border border-gray-300 px-2">HÌNH ẢNH</th>
                    <th class="border border-gray-300 px-2">TÊN BÀI VIẾT</th>
                    <th class="border border-gray-300 px-2">NGƯỜI TẠO</th>
                    <th class="border border-gray-300 px-2">NGÀY TẠO</th>
                    <th class="border border-gray-300 px-2 text-center w-[190px]">THAO TÁC</th>
                </tr>
            </thead>
            <tbody class="cursor-pointer">
                
                <ul>
                    @foreach ($posts as $key => $post)
                    <tr class="hover:bg-yellow-100" id="post_{{ $post->id }}">
                        <td class="border border-gray-300 py-3 text-center">{{($posts->currentPage() - 1) * $posts->perPage() + $key+1}}</td>
                        <td class="border border-gray-300 px-2 py-3">
                            <a href="{{ route('admin.posts.show', $post->id) }}">
                                <img class="w-[80px] h-[80px] object-cover mx-auto" src="{{ $post->image }}" alt="Image">
                            </a>
                        </td>
                        <td class="border border-gray-300 px-2">{{ $post->title }}</td>
                        <td class="border border-gray-300 px-2">{{ $post->name ?? "unknow" }}</td>
                        <td class="border border-gray-300 px-2">{{ $post->created_at }}</td>
                        <td class="border border-gray-300 px-2">
                            <div class="flex gap-2 justify-center items-center">
                                <button class="bg-blue-500 px-2 py-2 rounded-md text-white action-button" data-action="approve" data-post-id="{{ $post->id }}">
                                    Duyệt
                                </button>                            
                                <button class="bg-red-400 px-2 py-2 rounded-md text-white action-button" data-action="refuse"  data-post-id="{{ $post->id }}">
                                    Từ chối
                                </button>
                            </div> 
                        </td>
                    </tr>
                @endforeach
                </ul>                   
            </tbody>
        </table>
    @else
        <p class="py-5 text-2xl font-medium px-5 text-center">Không có bài nào cần chờ duyệt</p>
    @endif
     {{-- phân trang --}}
     <div class="absolute bottom-6 right-6">
        {{$posts->links()}}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.action-button').click(function() {
    var postId = $(this).data('post-id');
    var action = $(this).data('action');
    
    if (action === 'approve') {
        $.ajax({
            url: '{{ route('admin.posts.approve', ['postId' => ':postId']) }}'.replace(':postId', postId),
            method: 'POST',
            data: {_token: '{{ csrf_token() }}'},
            success: function(response) {
                alert('Bài viết đã được duyệt!');
                $('#post_' + postId).remove(); 
            },
            error: function(err) {
                alert('Đã xảy ra lỗi trong quá trình duyệt bài viết.');
            }
        });
    } else if (action === 'refuse') {
        $.ajax({
            url: '{{ route('admin.posts.refuse', ['postId' => ':postId']) }}'.replace(':postId', postId),
            method: 'POST',
            data: {_token: '{{ csrf_token() }}'},
            success: function(response) {
                alert('Bài viết đã bị từ chối!');
                $('#post_' + postId).remove(); 
            },
            error: function(err) {
                alert('Đã xảy ra lỗi trong quá trình từ chối bài viết.');
            }
        });
    }
});

</script>
@stop
