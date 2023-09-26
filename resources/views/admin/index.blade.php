@extends('admin_main')
@section('content')
    <div class="contaner mx-auto">
        <h3>TỔNG SỐ TIỀN ĐÃ NẠP: {{ number_format($tongtiennap) }} đ</h3>
        <h3>TỔNG SỐ TIỀN ĐÃ SỬ DỤNG: {{ number_format($tongtiensudung) }} đ</h3>
    </div>
@endsection