<header>
    <div class="md:flex py-4 items-center justify-center w-full hidden px-9">
        <p class="text-2xl font-medium text-gray-600">Quản lý bài viết</p>
        <div class="flex gap-4 flex-1 items-center justify-end">
            <div>
                <h1 class="text-gray-700 font-medium text-right capitalize">{{ Auth::user()->name }}</h1>
                <p class="text-[12px] text-gray-600 font-normal text-right">Admin</p>
           </div>  
           <div>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                        <div class="ml-1">
                            <img class="h-12 w-12 rounded-full" src="https://vnw-img-cdn.popsww.com/api/v2/containers/file2/cms_topic/doraemons9_05_seriesdetailimagemobile-80424f74d030-1609395371290-iZgELVcX.png?v=0" alt="">   
                        </div>
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

