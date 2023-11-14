<div class="bg-white min-h-[calc(100vh-100px)] pl-4 py-3 cursor-pointer text-gray-700 w-[330px] 2xl:w-[350px] lg:w-[280px] hidden md:block 2xl:text-lg">
    <h1 class="text-2xl text-center font-semibold py-3 text-blue-300 pb-6"><a href="{{ route('client.home') }}">InsightHub </a></h1>
    <div class="flex gap-5 py-5 hover:px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
        </svg>                   
        <a href="{{ route('client.account') }}">Thông tin cá nhân</a>
    </div>
    <div class="flex gap-5 py-5 hover:px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
        </svg>          
        <a href="{{ route('client.pass') }}">Đổi mật khẩu</a>
    </div>
    <div class="flex gap-5 py-5 hover:px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
          </svg>          
        <a href="{{ route('client.list_like') }}">Bài viết yêu thích</a>
    </div>


    <div class="inline-block text-left">
        <div class="flex gap-12 py-5 hover:px-2 cursor-pointer" id="dropdown-trigger">
            <div class="flex gap-5 hover:px-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                </svg>
                <a>Quản lý bài đăng</a>
            </div>
            
            <div class="flex flex-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" id="icon-chevron"></path>
                </svg>
            </div>
        </div>
        <div class="hidden pt-2 pl-10" id="dropdown-menu">
            <a href="{{ route('client.account.posts') }}" class="block py-2 px-2 text-md text-gray-700 hover:bg-gray-100">Bài đăng đã duyệt</a>
            <a href="{{ route('client.account.post_pending') }}" class="block py-2 px-2 text-md text-gray-700 hover:bg-gray-100">Bài đăng chờ duyệt</a>
            <a href="{{ route('client.account.post_refuse') }}" class="block py-2 px-2 text-md text-gray-700 hover:bg-gray-100">Bài đăng từ chối duyệt</a>
        </div>
    </div>
    
</div>
<script>
    const iconChevron = document.getElementById('icon-chevron');
    const dropdownMenu = document.getElementById('dropdown-menu');

    document.getElementById('dropdown-trigger').addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');

        // Toggle the icon between two states
        if (dropdownMenu.classList.contains('hidden')) {
            iconChevron.setAttribute('d', 'M8.25 4.5l7.5 7.5-7.5 7.5');
        } else {
            iconChevron.setAttribute('d', 'M19.5 8.25l-7.5 7.5-7.5-7.5');
        }
    });
</script>