<div class="bg-white min-h-[calc(100vh-100px)] px-4 py-3 cursor-pointer text-gray-700 w-[330px] 2xl:w-[340px] lg:w-[280px] hidden md:block 2xl:text-lg">
    <h1 class="text-2xl text-center font-semibold py-3 text-blue-300 pb-6">InsightHub</h1>
    <div class="flex gap-5 py-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <a href="{{ route('admin.home') }}">Trang chủ</a>
    </div>
    <div class="flex gap-5 py-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
        <a href="{{ route('admin.posts.index') }}">Quản lý bài viết</a>
    </div>
    <div class="flex gap-5 py-5">
        <div class="inline-block text-left">
            <div class="flex gap-12 cursor-pointer" id="dropdown-trigger">
                <div class="flex gap-5 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg> 
                    <a>Quản lý bài đăng</a>
                </div>
                
                <div class="flex flex-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" id="icon-chevron"></path>
                    </svg>
                </div>
            </div>
            <div class="hidden pl-10 pt-2" id="dropdown-menu">
                <a href="{{ route('admin.posts.post_approve') }}" class="block py-2 px-2 text-md text-gray-700 hover:bg-gray-100">Bài đăng đã duyệt</a>
                <a href="{{ route('admin.posts.getPost') }}" class="block py-2 px-2 text-md text-gray-700 hover:bg-gray-100">Bài đăng chờ duyệt</a>
            </div>
        </div>    
    </div>
    <div class="flex gap-5 py-5">
        <svg xmlns="http://www.w3.org/200a0/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
        </svg>
        <a href="{{ route('admin.tutorials.index') }}">Quản lý danh mục</a>
    </div>
    <div class="flex gap-5 py-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
        </svg>
        <a href="{{ route('admin.tags.index') }}">Quản lý tags</a>
    </div>
    <div class="flex gap-5 py-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        <a href="{{ route('admin.users.index') }}">Quản lý tài khoản</a>
    </div>
</div>
<script>
    const iconChevron = document.getElementById('icon-chevron');
    const dropdownMenu = document.getElementById('dropdown-menu');

    document.getElementById('dropdown-trigger').addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');

        if (dropdownMenu.classList.contains('hidden')) {
            iconChevron.setAttribute('d', 'M8.25 4.5l7.5 7.5-7.5 7.5');
        } else {
            iconChevron.setAttribute('d', 'M19.5 8.25l-7.5 7.5-7.5-7.5');
        }
    });
</script>