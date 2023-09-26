@extends('main')
@section('content')
<div class="w-full py-10">
    <div class="container 2xl:w-[1200px] mx-auto flex">
        @include('profile.info_box')
        <div class="w-3/4 p-5 border">
            <div class="container min-h-screen">
                <div class="">
                    <h2 class="register-title text-3xl font-semibold text-center mb-6">Thông tin cá nhân</h2>
                    <form class="register-form p-10" method="POST" action="">
                        <div id="image_show" class=" relative cursor-pointer  w-fit mb-5"  onclick="document.getElementById('avatar_upload').click();">
                            @if (Auth::user()->avatar != '')
                            <img src="{{ Auth::user()->avatar }}" alt="" class=" w-[100px] h-[100px] rounded-full object-cover mx-auto" style="box-shadow: 0 0 2px 2px rgba(0,0,0,0.2)">
                            @else
                            <img src="/template/imgs/avatar-default.png" alt=""  class="inline w-[100px] h-[100px] rounded-full object-cover mx-auto">
                            @endif
                            <span class="absolute top-1 left-[100px]"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.15" d="M8 16H12L18 10L14 6L8 12V16Z" fill="#000000"></path> <path d="M14 6L8 12V16H12L18 10M14 6L17 3L21 7L18 10M14 6L18 10M10 4L4 4L4 20L20 20V14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></span>
                        </div>
                        <div class="mb-4 hidden">
                            <label for="avatar_upload" class="text-sm font-medium mb-1 inline-block">Avatar</label>
                            <input type="file" name="avatar[]" id="avatar_upload" class="input-form w-full px-3 px py-2 border border-gray-300 text-sm ">
                            <input type="hidden" name="avatar" id="avatar">
                        </div>
                        <div class="mb-4">
                            <label for="name" class="text-sm font-medium mb-1 inline-block">Tên đầy đủ</label>
                            <input type="text" name="name" id="name" class="input-form w-full px-3 px py-2 border border-gray-300 text-sm " value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="ngaysinh" class="text-sm font-medium mb-1 inline-block">Ngày sinh</label>
                            <input type="date" name="ngaysinh" id="ngaysinh" value="{{ Auth::user()->ngaysinh }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="text-sm font-medium mb-1 inline-block">Số điện thoại</label>
                            <input type="text" name="email" id="email" class="input-form w-full px-3 py-2 text-sm" value="{{ Auth::user()->phone }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="text-sm font-medium mb-1 inline-block">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" value="{{ Auth::user()->diachi }}">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="text-sm font-medium mb-1 inline-block">Mật khẩu mới</label>
                            <input type="text" name="password" id="password" class="input-form w-full px-3 py-2 border border-gray-300 text-sm">
                        </div>
                        <div class="mb-8">
                            <label for="password1" class="text-sm font-medium mb-1 inline-block">Xác nhận mật khẩu</label>
                            <input type="text" name="password1" id="password1" class="input-form w-full px-3 py-2 border border-gray-300 text-sm">
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" name="signup" value="Cập nhật" class="btn-type-2 block px-7 py-2 cursor-pointer mx-auto text-white hover:text-white font-medium">
                        @include('../alert')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .user-box svg {
        transition: 0.25s;
    }
    .user-box a:hover svg {
        fill: #ffffff;
    }
</style>
@endsection