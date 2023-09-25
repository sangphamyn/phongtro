@extends('admin_main')
@section('content')
<style>
  .btn.btn-danger.dropdown-toggle::after,
  .btn.btn-success.dropdown-toggle::after {
    display: none;
  }
</style>
<div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên</th>
              <th scope="col">Số dư</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $user)
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td class="align-middle">
                    <div class="flex items-center">
                      @if ($user->avatar != '')
                        <img src="{{ $user->avatar }}" alt="" class="w-[30px] h-[30px] rounded-full mr-3 object-cover pointer-events-none">
                      @else
                          <img src="/template/imgs/avatar-default.png" alt="" class="w-[30px] h-[30px] rounded-full mr-3 object-cover pointer-events-none">
                      @endif
                      {{$user->name}}</td>
                    </div>
                  <td class="align-middle">{{number_format($user->sodu)}} đ</td>
                  <td>
                    <div class="dropdown inline" style="display: inline">
                      <button class="btn btn-success dropdown-toggle" style="background-color: #28a745" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="las la-money-bill"></i> Nạp tiền
                      </button>
                      <ul class="dropdown-menu p-2 text-center">
                        <form action="/admin/user/topup?id={{$user->id}}" method="POST">
                          <div class="mb-2">
                            <label for="money" class="text-sm font-medium mb-1 inline-block">Số tiền</label>
                            <input name="money" id="money" min='0' class="input-form w-full px-3 py-2 border border-gray-300 text-sm" type="number" required/>
                          </div>
                          {{ csrf_field() }}
                          <input type="submit" name="block" value="Nạp" class="btn btn-success" style="background-color: #28a745">
                        </form>
                      </ul> 
                    </div>
                    <div class="dropdown inline" style="display: inline">
                      <button class="btn btn-danger dropdown-toggle" type="button" style="background-color: #dc3545" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="las la-lock"></i> Khóa
                      </button>
                      <ul class="dropdown-menu p-2 text-center">
                        <form action="/admin/user/block?id={{$user->id}}" method="POST">
                          <div class="mb-2">
                            <label for="reason" class="text-sm font-medium mb-1 inline-block">Lý do</label>
                            <textarea name="reason" id="reason" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" required cols="30" rows="2">{{ old('description') }}</textarea>
                          </div>
                          {{ csrf_field() }}
                          <input type="submit" name="block" value="Khóa" class="btn btn-success" style="background-color: #dc3545">
                        </form>
                      </ul>
                    </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection