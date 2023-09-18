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
              <th scope="col">Lý do khóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $user)
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{number_format($user->sodu)}} đ</td>
                  <td>{{$user->banned->reason}}</td>
                  <td>
                    <a type="button" href="/admin/user/unblock?id={{$user->id}}" class="btn btn-success" style="background-color: #28a745"><i class="fas fa-edit"></i>Bỏ khóa</a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection