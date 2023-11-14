<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900">Thông tin tài khoản</h2>
        <p class="mt-1 text-sm text-gray-600">Cập nhật thông tin hồ sơ và địa chỉ email của tài khoản của bạn.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Tên tài khoản')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex gap-4 justify-between">
            <div>
                <x-input-label for="profile_image" :value="__('Hình ảnh')" />
                <input id="avatar" name="avatar" type="file" class="mt-1 block w-full" accept="image/*" onchange="previewAvatar(this)"/>
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            </div>   
            <div>
                <img id="avatar-preview" src="{{ $user->avatar ? $user->avatar : '' }}" alt="Avatar Preview" class="w-[80px] h-[80px] rounded-full object-cover mx-auto @if(!$user->avatar) hidden @endif">
            </div>      
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Lưu') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Lưu thành công') }}</p>
            @endif
        </div>
    </form>


    <script>
        function previewAvatar(input) {
            var preview = document.getElementById('avatar-preview');
            var file = input.files[0];
            var reader = new FileReader();
    
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
    
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

</section>
