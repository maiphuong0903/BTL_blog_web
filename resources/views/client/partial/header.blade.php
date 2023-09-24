<header>
    <div class="bg-[#fff] xl:px-24 py-3 flex md:gap-12 px-2 sm:px-12 items-center">
        <h1 class="text-[25px] font-semibold">Blog</h1>
        <nav class="mr-20 xl:mr-10 lg:mr-3">
            <ul class="lg:flex 2xl:gap-10 2xl:ml-12 xl:ml-8 lg:gap-6 hidden">
                <li><a href="">Home</a></li>
                <li><a href="">Sản Phẩm</a></li>
                <li>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" text-center inline-flex items-center" type="button">Danh Mục<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[120px] xl:w-[140px] 2xl:w-[160px]">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">PHP</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Laravel</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">VueJS</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">ReactJS</a>
                          </li>
                        </ul>
                    </div>
                </li>
                <li><a href="">Liên hệ</a></li>
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
        
        <div class="sm:flex sm:flex-1 sm:justify-end flex flex-1 justify-end">
            <a href="#" class="bg-[#292c45] text-white px-4 py-2 rounded-lg">Log in </a>
        </div>              
    </div>  
</header>