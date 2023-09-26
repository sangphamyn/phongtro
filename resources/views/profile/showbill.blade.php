@extends('main')
@section('content')
<div class="w-full py-10">
    <div class="container 2xl:w-[1200px] mx-auto flex">
        @include('profile.info_box')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="w-3/4 p-5 border">
            @if($bill->trangthai == 0) 
                <h2 class="font-bold text-4xl text-center mb-8">ĐƠN NẠP</h2>
                <div id="countdown" class="text-center"></div>
                <div class="payment-cta text-center mt-5 mb-4">
                    <h1>Quét mã QR chuyển tiền</h1>
                    <a>Sử dụng <b> App MoMo </b> hoặc ứng dụng camera hỗ trợ QR code để quét mã</a>
                </div>
                <img class="mx-auto" src="/template/imgs/momo100k.png" alt="">
                <div class="info-content text-center mt-4">
                    <div class="payment-info payment-info-bottom">
                        <div class="payment-title">
                            <h1 class="font-bold text-xl"> Thông tin giao dịch</h1>
                        </div>
                        <div class="payment-detail">
                            <div class="box-detail">
                                <h4>Người nhận</h4>
                                <div class="two-box">
                                    <p class="merchant-name">DANG THI YEN</p>
                                </div>
                            </div>
                            <div>
                                <div class="line-detail"></div>
                                <div class="box-detail">
                                    <h4>Số tiền</h4>
                                    <h3>{{ number_format($bill->sotien)}} đ</h3>
                                </div>
                                <div class="box-detail">
                                    <h4>Nội dung chuyển</h4>
                                    <h3>NAP {{ $bill->author->phone }} {{ $bill->id}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <h2 class="font-bold text-4xl text-center mb-8">ĐƠN NẠP</h2>
                
                <div class="payment-cta text-center mt-5 mb-4">
                    <h1>Đã nạp thành công</h1>
                </div>
                @endif
        </div>
    </div>
</div>
<script>
    function updateCountdown() {
        var currentTime = new Date();
        
        var endTime = new Date('{{$bill->created_at}}');

        endTime.setMilliseconds(endTime.getMilliseconds() + 10*60*1000);

        var diff = Math.max(0, endTime - currentTime);
        var seconds = Math.floor(diff / 1000) % 60;
        var minutes = Math.floor(diff / 1000 / 60) % 60;

        var countdownText = minutes + ' phút ' + seconds + ' giây';
        document.getElementById('countdown').innerText = 'Thời gian còn lại: ' + countdownText;
        if(diff == 0)
            document.getElementById('countdown').innerText = 'Hết thời gian';
    }

    $(document).ready(function() {
        setInterval(updateCountdown, 1000);
    });
</script>
@endsection