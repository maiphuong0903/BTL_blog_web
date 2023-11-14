<header>
    <div class="md:flex py-3 items-center w-full hidden px-9 bg-white shadow-md">
        <div class="flex gap-1 items-center border border-blue-400 rounded-md cursor-pointer px-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>  
            <button class="py-2 text-blue-400">                
                <a href="{{ route('admin.posts.create') }}" >Thêm Bài Viết</a>
            </button>   
        </div>
        {{-- <p class="text-2xl font-medium text-gray-600">Quản lý bài viết</p> --}}
        <div class="flex gap-4 flex-1 items-center justify-end">
            <div>
                <h1 class="text-gray-700 font-medium text-right capitalize text-[18px]">{{ Auth::user()->name }}</h1>
                <p class="text-[15px] text-gray-600 font-normal text-right">  {{ auth()->user()->role == 1 ? 'Admin' : 'Member' }}</p>
           </div>  
           <div>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button>
                        @if(auth()->user()->avatar)
                            <img class="h-12 w-12 rounded-full object-cover cursor-pointer" src="{{ auth()->user()->avatar }}" alt="">
                        @else
                            <img class="h-12 w-12 rounded-full object-cover cursor-pointer" src="https://vnw-img-cdn.popsww.com/api/v2/containers/file2/cms_topic/doraemons9_05_seriesdetailimagemobile-80424f74d030-1609395371290-iZgELVcX.png?v=0" alt="">
                        @endif
                    </button>

                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
           </div>
        </div>
    </div>
    
    
    {{-- nav mobile --}}
    <div class="flex gap-5 items-center py-5 px-9 md:hidden">
        <button class="border border-gray-300 px-2 py-2 rounded-md mobile-menu-button" onclick="menuMoblie()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg> 
        </button>     
        <div class="text-center flex-grow"> 
            <h1 class="text-blue-300 text-2xl">BLOG</h1>
        </div>
        <img class="w-12 h-12 rounded-full object-cover" src="https://i.pinimg.com/originals/10/86/62/108662abb572c2d5862ce09fff373ba3.jpg" alt="">
    </div>
</header>
<script> 
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });

</script>

