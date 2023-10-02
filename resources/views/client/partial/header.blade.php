<header class="sticky top-0">
    <div class="bg-[#fff] xl:px-24 py-3 flex lg:grid 2xl:grid-cols-7 lg:grid-cols-9 px-4 sm:px-6">
        <h1 class="lg:text-[25px] font-semibold text-[35px]">Blog</h1>

        {{-- nav --}}
        <div class="2xl:col-span-5 col-span-7 flex gap-8 items-center justify-center">
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
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 lg:block hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="lg:block w-[300px] xl:w-[400px] hidden p-2 pl-10 text-sm text-gray-900 border border-gray-200 rounded-2xl focus:ring-gray-300 focus:border-gray-300" placeholder="Nhập tên ..." required>
            </div>
        </div>

        {{-- button login --}}
        <div class="lg:flex lg:flex-1 lg:justify-end hidden">
            <a href="{{ route('login') }}" class="bg-[#292c45] text-white px-4 py-2 rounded-lg">Log in </a>
        </div> 
        
        {{-- icon mobile --}}
        <div class="flex flex-1 items-center justify-end lg:hidden">
            <button class="outline-none mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:w-12 md:h-12 w-9 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
          
    </div>  
    <!-- mobile menu -->
        <div class="hidden mobile-menu bg-blue-300">
            <ul class="py-3">
                <li><a href="{{ route('client.home') }}" class="block text-md px-2 py-2 font-semibold">HOME</a></li>
                <li><a href="{{ route('client.posts') }}" class="block text-md font-bold px-2 py-2">BÀI VIẾT</a></li>
                <li><a href="{{ route('client.contact') }}" class="block text-md font-semibold px-2 py-2">LIÊN HỆ</a></li>
                <li><a href="#" class="block text-md font-semibold px-2 py-2">ĐĂNG NHẬP</a></li>
            </ul>
        </div>
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>
        
        
       
</header>

