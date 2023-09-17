@extends('admin_main')
@section('content')

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
                  <td>{{$user->name}}</td>
                  <td>{{number_format($user->sodu)}} đ</td>
                  <td>
                      <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="las la-lock"></i> Khóa
                        </button>
                        <ul class="dropdown-menu p-2 text-center">
                          <form action="/admin/user/block?id={{$user->id}}" method="POST">
                            <div class="mb-2">
                              <label for="reason" class="text-sm font-medium mb-1 inline-block">Lý do</label>
                              <textarea name="reason" id="reason" class="input-form w-full px-3 py-2 border border-gray-300 text-sm" cols="30" rows="2">{{ old('description') }}</textarea>
                            </div>
                            {{ csrf_field() }}
                            <input type="submit" name="block" value="Khóa" class="btn btn-success">
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