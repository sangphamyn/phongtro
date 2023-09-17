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
                <td>2.846</td>
                <td>
                    <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                    <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection