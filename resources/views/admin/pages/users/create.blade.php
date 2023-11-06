@extends('admin.layouts.master')

@section('title', 'Thêm Tài Khoản')


@section('content')
<div class="bg-white shadow-md rounded-md px-5 pt-3 pb-20 relative min-h-[calc(100vh-145px)]">
    <form action="{{ route('admin.users.store') }}" method="post" class="px-7 py-6" enctype="multipart/form-data">
      <h1 class="text-[30px] text-center mb-7 font-medium">Thêm Tài Khoản</h1>
       @csrf
       <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  User Name
              </label>
              <input class="w-full rounded-md border border-gray-300" type="text" name="name" placeholder="Nhập tên tài khoản">

              <p @error('name') class="error" @enderror>
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </p>
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Email
              </label>
              <input class="w-full rounded-md border border-gray-300" type="text" name="email" placeholder="Nhập email">
              
              <p @error('email') class="error" @enderror>
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </p>
            </div>
      </div>
      
      <div class="w-full mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Password
          </label>
          <input class="w-full rounded-md border border-gray-300" type="password" name="password" placeholder="************">
          
          <p @error('password') class="error" @enderror>
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
          </p>
      </div>
     
    <div class="w-full my-5 flex">
      <div>
        <input type="file" name="avatar" id="avatar" class="rounded-md">
        <p @error('avatar') class="error" @enderror>
          @error('avatar')
              <span class="text-red-500">{{ $message }}</span>
          @enderror
        </p>
      </div>
      <div>
        <img id="avatar-preview" src="" alt="Avatar Preview" class="w-[250px] h-[230px] object-cover mx-auto hidden">
      </div>
    </div>
    
      <div class="flex justify-end absolute bottom-6 right-6 items-center gap-5 px-3 py-1 cursor-pointer ">
        <button type="submit" class="bg-[#292c45] text-white px-3 py-2 rounded-md my-5">Submit</button>
      </div>
    </form>
</div>

<script>
  const avatarInput = document.getElementById('avatar');
  const avatarPreview = document.getElementById('avatar-preview');

  avatarInput.addEventListener('change', function() {
    const file = avatarInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        avatarPreview.src = e.target.result;
        avatarPreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      avatarPreview.src = '';
      avatarPreview.style.display = 'none';
    }
  });
</script>

@stop
