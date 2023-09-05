@extends('main')
@section('content')
<div class="container bg-gray-50 min-h-screen">
    <div class="w-[700px] mx-auto p-[50px]">
        <h2 class="register-title text-3xl font-semibold text-center">Tạo bài đăng</h2>
        <p class="text-center mb-5 text-gray-700 text-sm">Điền các trường dưới đây để tạo bài.</p>
        <form class="register-form bg-white border border-gray-300 p-10 rounded-md border-t-4 " method="POST" action="">
            <div class="mb-4">
                <label for="title" class="text-sm font-medium mb-1 inline-block">Tiêu đề</label>
                <textarea name="title" id="title" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" cols="30" rows="1">{{ old('title') }}</textarea>
                <span class="text-sm text-red-600">{{ $errors->first('title') }}</span>
            </div>
            <div class="mb-4">
                <label for="description" class="text-sm font-medium mb-1 inline-block">Mô tả</label>
                <textarea name="description" id="description" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" cols="30" rows="2">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <div class="center">
                    <div id="preview">
                    </div>
                    <div class="form-input">
                      <label for="file-ip-1"><svg viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 22H3C2.72 22 2.5 21.6517 2.5 21.2083V3.79167C2.5 3.34833 2.72 3 3 3H21C21.28 3 21.5 3.34833 21.5 3.79167V21.2083C21.5 21.6517 21.28 22 21 22Z" stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4.5 19.1875L9.66 12.6875C9.86 12.4375 10.24 12.4375 10.44 12.6875L15.6 19.1875" stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16.2 16.6975L16.4599 16.3275C16.6599 16.0775 17.0399 16.0775 17.2399 16.3275L19.4999 19.1875" stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.2046 9.54315C17.2046 10.4294 16.4862 11.1478 15.6 11.1478C14.7138 11.1478 13.9954 10.4294 13.9954 9.54315C13.9954 8.65695 14.7138 7.93854 15.6 7.93854C16.4862 7.93854 17.2046 8.65695 17.2046 9.54315Z" stroke="#0F0F0F"></path> </g></svg>
                        Tải ảnh lên
                    </label>
                      <input type="file" id="file-ip-1" name="image" accept="image/*" multiple>
                      
                    </div>
                </div> 
                <span class="text-sm text-red-600">{{ $errors->first('images') }}</span>
            </div>
            <div class="mb-4">
                <label for="content" class="text-sm font-medium mb-1 inline-block">Địa chỉ</label>
                <div class="flex">
                    <div class="custom-select custom-select-district mr-2">
                        <select name="id_dt" id="district">
                          <option>Quận/Huyện: </option>
                          @foreach($districts as $key => $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="custom-select custom-select-xa">
                        <select name="id_w" id="xa">
                          <option>Phường/Xã: </option>
                        </select>
                    </div>
                </div>
            <div class="mb-4">
              <label for="" class="text-sm font-medium mb-1 inline-block">Dịch vụ</label>
              @foreach($services as $key => $service)
                <label class="ba">{{ $service->name }}
                  <input type="checkbox" name="services[]" value="{{ $service->id }}">
                  <span class="checkmark"></span>
                </label>
              @endforeach
            </div>
            <div class="mb-4">
                <label for="dientich" class="text-sm font-medium mb-1 inline-block">Diện tích (m²)</label>
                <input type="number" name="dientich" id="dientich" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" value="{{ old('dientich') }}">
                <span class="text-sm text-red-600">{{ $errors->first('dientich') }}</span>
            </div>
            <div class="mb-4">
                <label for="giaphong" class="text-sm font-medium mb-1 inline-block">Giá (VNĐ/Tháng)</label>
                <input type="number" name="giaphong" id="giaphong" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" value="{{ old('giaphong') }}">
                <span class="text-sm text-red-600">{{ $errors->first('giaphong') }}</span>
            </div>
            <div class="mb-4 flex">
                <div class="a-group mr-10">
                    <label for="giadien" class="text-sm font-medium mb-1 inline-block">Giá điện (VNĐ/Số)</label>
                    <input type="number" name="giadien" id="giadien" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" value="{{ old('giadien') }}">
                    <span class="text-sm text-red-600">{{ $errors->first('giadien') }}</span>
                </div>
                <div class="a-group">
                    <label for="gianuoc" class="text-sm font-medium mb-1 inline-block">Giá nước (VNĐ/Khối)</label>
                    <input type="number" name="gianuoc" id="gianuoc" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" value="{{ old('gianuoc') }}">
                    <span class="text-sm text-red-600">{{ $errors->first('gianuoc') }}</span>
                </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" name="signup" value="Đăng" class="btn-type-2 block px-7 py-2 cursor-pointer mx-auto text-white hover:text-white font-medium">
        </form>
    </div>
</div>
@endsection