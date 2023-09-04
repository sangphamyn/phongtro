@extends('main')
@section('content')
<div class="container min-h-screen">
    <div class="w-[500px] mx-auto p-[50px]">
        <h2 class="register-title text-3xl font-semibold text-center mb-6">Thông tin cá nhân</h2>
        <form class="register-form bg-white border border-gray-300 p-10 rounded-md border-t-4 " method="POST" action="">
            <div id="image_show">
                @if (Auth::user()->avatar != '')
                <img src="{{ Auth::user()->avatar }}" alt="" class="w-[100px] h-[100px] rounded-full object-cover mx-auto" style="box-shadow: 0 0 2px 2px rgba(0,0,0,0.2)">
                @else
                <img src="/template/imgs/avatar-default.png" alt="" class="w-[100px] h-[100px] rounded-full object-cover mx-auto">
                @endif
            </div>
            <div class="mb-4">
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
            <input type="submit" name="signup" value="Update" class="btn-type-2 block px-7 py-2 cursor-pointer mx-auto text-white hover:text-white font-medium">
        </form>
        <h1>Sang</h1>
    </div>
</div>
@endsection