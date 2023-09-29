@extends('client.layouts.master')

@section('title', 'Liên Hệ')


@section('content')
<div class="xl:px-28 md:px-9 py-10">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-600 text-center pb-1">HAVE SOME QUESTIONS?</h1>
    <div class="flex gap-10 justify-center items-center font-thin text-gray-500 text-[15px]">
        <div class="flex gap-1 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
            </svg>          
            <p>0987321456</p>
        </div>
        <div class="flex gap-2 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>          
            <p>số 3 cầu giấy hà nội</p>
        </div>
    </div>
    <div class="my-8 xl:mx-24 md:mx-3">
        <form class="pb-3" action="" method="post">
            <div class="grid grid-cols-2 py-5 gap-x-7 px-14">
                <div>
                    <label for="">User Name</label> <br>
                    <input class="border-gray-300 rounded-md w-full mt-2" type="text" name="username">
                </div>

            <div>
                    <label for="">Email</label> <br>
                    <input class="border-gray-300 rounded-md w-full mt-2" type="text" name="email">
            </div>
            </div>
            <div class="px-14">
                    <label for="">Content</label>
                    <textarea class="w-full border-gray-300 rounded-md mt-2" name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="flex flex-1 justify-end px-14">
                <button class="bg-[#292c45] px-4 py-2 rounded-md text-white mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop