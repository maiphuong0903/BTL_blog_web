@extends('client.layouts.account')

@section('title', 'Quản lý tài khoản')


@section('content')
<div class="bg-white shadow-md pt-10 px-10 min-h-[calc(100vh-145px)] pb-14 relative">
    <header>
        <h2 class="text-2xl font-medium text-gray-900">Thông tin tài khoản</h2>
        <p class="mt-1 text-md text-gray-600">Cập nhật thông tin hồ sơ và địa chỉ email của tài khoản của bạn.</p>
    </header>

    <form method="post" action="{{ route('client.account.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
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

        <div class="flex items-center gap-4 absolute bottom-7 right-10">
            <x-primary-button>{{ __('Lưu') }}</x-primary-button>
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

</div>

@stop
