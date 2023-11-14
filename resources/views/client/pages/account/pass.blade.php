@extends('client.layouts.account')

@section('title', 'Quản lý tài khoản')


@section('content')
<div class="bg-white shadow-md pt-10 px-10 min-h-[calc(100vh-145px)] pb-14 relative">
   <header>
      <h2 class="text-2xl font-medium text-gray-900">Đổi mật khẩu</h2>
      <p class="mt-1 text-md text-gray-600">Đảm bảo tài khoản của bạn đang sử dụng mật khẩu dài, ngẫu nhiên để giữ an toàn.</p>
   </header>

   <form method="post" action="{{ route('client.updatePass') }}" class="mt-6 space-y-6">
      @csrf
      @method('put')
   
      <div>
          <x-input-label for="current_password" :value="__('Mật khẩu hiện tại')" />
          <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
          <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
      </div>
   
      <div>
          <x-input-label for="password" :value="__('Mât khẩu mới')" />
          <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
          <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
      </div>
   
      <div>
          <x-input-label for="password_confirmation" :value="__('Nhập lại mật khẩu')" />
          <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
          <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
      </div>
   
      <div class="flex items-center gap-4 absolute bottom-7 right-10">
          <x-primary-button>{{ __('Lưu') }}</x-primary-button>
      </div>
   </form>
</div>


@stop
