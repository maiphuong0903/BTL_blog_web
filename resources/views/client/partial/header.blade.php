<header class="sticky top-0">
    <div class="bg-[#fff] xl:px-24 py-3 flex md:gap-12 px-4 sm:px-6 items-center">
        <h1 class="lg:text-[25px] font-semibold text-[40px]">Blog</h1>

        {{-- nav --}}
        <nav class="mr-20 xl:mr-10 lg:mr-3">
            <ul class="lg:flex 2xl:gap-10 xl:ml-8 lg:gap-6 hidden">
                <li><a href="{{ route('client.home') }}">Home</a></li>
                <li><a href="{{ route('client.posts') }}">Bài Viết</a></li>
                <li>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" text-center inline-flex items-center" type="button">Danh Mục<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[120px] xl:w-[140px] 2xl:w-[160px]">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                            @foreach ($tutorials as $tutorial)
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{ $tutorial->name }}</a>
                              </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li><a href="{{ route('client.contact') }}">Liên hệ</a></li>
            </ul>              
        </nav>

        {{-- nav mobile --}}
        {{-- <nav class="lg:hidden cursor-pointer flex flex-1 justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14" name ="menu" onclick="Menu(this)">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <div>
                <ul class="bg-blue-400 opacity-0">
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="">Tìm Kiếm</a></li>
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="">Sản Phẩm</a></li>
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="">Liên Hệ</a></li>
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="">Đăng Nhập</a></li>
                </ul>
            </div>   
        </nav> --}}

        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 lg:block hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="lg:block w-[300px] xl:w-[400px] hidden p-2 pl-10 text-sm text-gray-900 border border-gray-200 rounded-2xl focus:ring-gray-300 focus:border-gray-300" placeholder="Nhập tên ..." required>
        </div>
        
        <div class="lg:flex lg:flex-1 lg:justify-end hidden">
            <a href="#" class="bg-[#292c45] text-white px-4 py-2 rounded-lg">Log in </a>
        </div>   
    </div>  
</header>
<script> 

    function Menu(e){
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name === "close" list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = 'menu' ,list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'));
    }
</script>