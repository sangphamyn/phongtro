@extends('admin_main')
@section('content')
<style>
  .btn.btn-danger.dropdown-toggle::after,
  .btn.btn-success.dropdown-toggle::after {
    display: none;
  }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">ID</th>
              <th scope="col">Tên</th>
              <th scope="col">Số dư</th>
              <th scope="col">Số tiền nạp</th>
              <th scope="col">Thời gian tạo đơn</th>
              @if($trangthai != 2)
              <th scope="col">Thời gian còn lại</th>
              <th scope="col"></th>
              @else
              <th scope="col">Thời gian duyệt</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @php
              $endTimes = array();   
            @endphp
            @foreach ($bills as $key => $bill)
                <tr>
                  <th scope="row" class="align-middle">{{$key + 1}}</th>
                  <td class="align-middle">{{ $bill->id }}</td>
                    
                  <td class="align-middle">{{ $bill->author->name}}</td>
                  <td class="align-middle">{{number_format($bill->author->sodu)}} đ</td>
                  <td class="align-middle">{{number_format($bill->sotien)}} đ</td>
                  <td class="align-middle">{{$bill->created_at}}</td>
                  @if($trangthai != 2)
                  <td class="align-middle" id="countdown{{$key}}"></td>
                  <td>
                    <a href="/admin/user/topup?id={{$bill->id_user}}&money={{$bill->sotien}}&bill_id={{$bill->id}}" class="button-5">Phê duyệt</a>
                  </td>
                  @else
                  <td class="align-middle">{{$bill->updated_at}}</td>
                  @endif
                </tr>
                @php
                  array_push($endTimes, $bill->created_at);
                @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@php
function calculateTimeDifference($endTime) {
    // Lấy thời gian hiện tại
    $currentTime = time();
    
    // Chuyển đổi chuỗi thời gian kết thúc thành timestamp
    $endTimestamp = strtotime($endTime);

    // Tính khoảng thời gian (thời gian còn lại)
    $difference = $endTimestamp - $currentTime + 600;
    return max(0, $difference); // Đảm bảo không âm
}

// Tính khoảng thời gian cho từng mốc thời gian và lưu vào mảng
$timeDifferences = [];
foreach ($endTimes as $endTime) {
    $difference = calculateTimeDifference($endTime);
    $timeDifferences[] = max(0, $difference); // Đảm bảo không âm
}

@endphp
<script>
  function updateCountdowns(endTimes) {
      for (var i = 0; i < endTimes.length; i++) {
          var remainingTime = Math.max(0, endTimes[i] - 1);
          // Tính số giờ, phút và giây còn lại
          var hours = Math.floor(remainingTime / 3600);
          var minutes = Math.floor((remainingTime % 3600) / 60);
          var seconds = remainingTime % 60;
          // console.log(endTimes[i]);
          // Cập nhật nội dung thẻ hiển thị thời gian còn lại
          var countdownDiv = document.getElementById('countdown' + (i));
          countdownDiv.innerText = minutes + ' phút ' + seconds + ' giây';
          if(remainingTime == 0)
          countdownDiv.innerText = 'Hết thời gian';
          endTimes[i]--;
        }
  }

  // Thời gian kết thúc (timestamp) cho mỗi mốc thời gian
  var endTimes = <?php echo json_encode($timeDifferences); ?>;
  // Gọi hàm và cập nhật thời gian còn lại cho các thẻ đã có
  updateCountdowns(endTimes);
  
  // Cập nhật thời gian mỗi giây
  setInterval(function() {
      updateCountdowns(endTimes);
  }, 1000);
</script>
@endsection