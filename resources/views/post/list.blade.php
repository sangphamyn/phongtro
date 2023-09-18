@extends('main')
@section('content')
<div class="mx-auto px-10 py-5 bg-[#3d3d3d]">
    <form action="/post/list" method="GET">
        <div class="search-box text-center flex">
            <div class="search-input w-full">
                <input type="text" name="title" placeholder="Cổng chính CNTT">
            </div>
            <div class="text-left shrink-0">
                <div class="flex flex-wrap">
                    <div class="custom-select custom-select-district mr-2">
                        <select class="hidden" name="dt">
                            <option value="none">Quận/Huyện: </option>
                            @foreach($districts as $key => $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-select custom-select-xa mr-2">
                        <select class="hidden" id="xa" name="xa">
                            <option value="none">Phường/Xã: </option>
                        </select>
                    </div>
                    <div class="search-filter flex justify-between items-center relative">
                        Mức giá <svg viewBox="0 0 32 32" width="30px" stroke="#ffffff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="#ffffff"> </path> </g></svg>
                        <div class="dropdown">
                            <div class="input-group flex justify-between items-center">
                                <input type="number" class="mr-3 input-price" name="min_price" min="0" placeholder="500.000 đ">
                                <svg width="24px" class="  input-price" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" class="  input-price" stroke-width="0"></g><g class="  input-price" id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g class="  input-price" id="SVGRepo_iconCarrier"> <path d="M4 12H20M20 12L16 8M20 12L16 16" stroke="#000000" class="  input-price" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                <input type="number" class="ml-3 input-price" name="max_price" placeholder="1.600.000 đ">
                            </div>
                        </div>
                    </div>
                    <div class="search-filter search-dientich flex justify-between items-center relative mr-2">
                        Diện tích <svg viewBox="0 0 32 32" width="30px" stroke="#ffffff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="#ffffff"> </path> </g></svg>
                        <div class="dropdown">
                            <div class="input-group flex justify-between items-center">
                                <input type="number" class="input-price mr-1" name="min_area" min="0" placeholder="12"> m²
                                <svg width="24px" class=" ml-3 input-price" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" class="  input-price" stroke-width="0"></g><g class="  input-price" id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g class="  input-price" id="SVGRepo_iconCarrier"> <path d="M4 12H20M20 12L16 8M20 12L16 16" stroke="#000000" class="  input-price" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                <input type="number" class="mr-1 ml-3 input-price" name="max_area" placeholder="26"> m²
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn-type-2 shrink-0 px-4 py-2 text-white hover:text-white font-medium text-sm bg-[#E03C31] inline-flex items-center"><svg width="20px" class="mr-1" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_15_152)"> <rect width="24" height="24" fill="transparent"></rect> <circle cx="10.5" cy="10.5" r="6.5" stroke="#ffffff" stroke-linejoin="round"></circle> <path d="M19.6464 20.3536C19.8417 20.5488 20.1583 20.5488 20.3536 20.3536C20.5488 20.1583 20.5488 19.8417 20.3536 19.6464L19.6464 20.3536ZM20.3536 19.6464L15.3536 14.6464L14.6464 15.3536L19.6464 20.3536L20.3536 19.6464Z" fill="#ffffff"></path> </g> <defs> <clipPath id="clip0_15_152"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>Tìm kiếm</button>
        </div>
    </form>
</div>
<div class="w-[1200px] mx-auto mb-8 mt-5">
    <div class="cf-title-09 mb-8">
        <h3>Danh sách bài đăng
            <p class="text-base italic" style="text-transform: initial">{{$title_search}}</p>
            <span>Khám phá {{$total}} bài đăng</span>
        </h3>
    </div>
</div>
<div class="flex container mx-auto px-10 2xl:w-[1200px]">
    <div class="filter w-[250px]">
        <div class="filter-price mb-3 border px-3 py-4">
            <h4 class="font-bold text-lg mb-2">Tìm theo khoảng giá</h4>
            <ul class="pl-4">
                <li>
                    <a href="/post/list?min_price=500000&max_price=800000" class="py-1 inline-block">500,000đ - 800,000đ</a>
                </li>
                <li>
                    <a href="/post/list?min_price=800000&max_price=1000000" class="py-1 inline-block">800,000đ - 1,000,000đ</a>
                </li>
                <li>
                    <a href="/post/list?min_price=1000000&max_price=1300000" class="py-1 inline-block">1,000,000đ - 1,300,000đ</a>
                </li>
                <li>
                    <a href="/post/list?min_price=1300000&max_price=1600000" class="py-1 inline-block">1,300,000đ - 1,600,000đ</a>
                </li>
                <li>
                    <a href="/post/list?min_price=1600000&max_price=2000000" class="py-1 inline-block">1,600,000đ - 2,000,000đ</a>
                </li>
            </ul>
        </div>
        <div class="filter-price border px-3 py-4">
            <h4 class="font-bold text-lg mb-2">Tìm theo diện tích</h4>
            <ul class="pl-4">
                <li>
                    <a href="/post/list?min_area=0&max_area=15" class="py-1 inline-block">Dưới 15m²</a>
                </li>
                <li>
                    <a href="/post/list?min_area=15&max_area=30" class="py-1 inline-block">15m² - 30m²</a>
                </li>
                <li>
                    <a href="/post/list?min_area=30&max_area=380" class="py-1 inline-block">30m² trở lên</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="post-list w-[700px] mx-auto mb-14">
        @if(count($posts) == 0)
            <div class="p-5 text-center mb-8">
            <img src="/template/imgs/emptybox.png" class="mx-auto w-[150px]" alt="" srcset="">
                Không có bài đăng nào phù hợp
            </div>
        @endif
        <div class="filter relative w-fit mb-3">
            <button class="py-2 flex items-center border-b">
                <svg fill="#000000" width="20px" height="20px" class="mr-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12,25l6.67,6.67a1,1,0,0,0,.7.29.91.91,0,0,0,.39-.08,1,1,0,0,0,.61-.92V13.08L31.71,1.71A1,1,0,0,0,31.92.62,1,1,0,0,0,31,0H1A1,1,0,0,0,.08.62,1,1,0,0,0,.29,1.71L11.67,13.08V24.33A1,1,0,0,0,12,25ZM3.41,2H28.59l-10,10a1,1,0,0,0-.3.71V28.59l-4.66-4.67V12.67a1,1,0,0,0-.3-.71Z"></path> </g></svg>
              Sắp xếp
            </button>
            <ul class="dropdown-menu absolute w-max px-1 py-2 bg-white border top-full right-1/2 translate-x-1/2">
              <li><a class="px-3 py-1 inline-block" href="/post/list?orderby=new">Mới nhất</a></li>
              <li><a class="px-3 py-1 inline-block" href="/post/list?orderby=hot">Được quan tâm</a></li>
              <li><a class="px-3 py-1 inline-block" href="/post/list?orderby=view">Xem nhiều</a></li>
            </ul>
          </div>
        @foreach ($posts as $post)
            <div class="post-item border flex px-5 py-4 mb-4">
                <div class="post-img w-[150px] flex-shrink-0">
                    <img src="{{$post->images[0]->url}}" alt="">
                </div>
                <div class="post-info ml-5">
                    <a href="/post/{{ $post->id }}"><h1 class="post-title font-semibold mb-1 text-lg">{{Str::of($post->title)->words(20, '...')}}</h1></a>
                    @if(Auth::check())
                    @php
                        $from_date = new DateTime($post->created_at);
                        $to_date = new DateTime(); 
                        $interval = $from_date->diff($to_date);
                        $hours = $interval->h + ($interval->days * 24);
                        $minutes = $interval->i;
                        if ($hours > 0) {
                            $result = "$hours giờ trước";
                        } else {
                            $result = "$minutes phút trước";
                        }
                        echo $result;  
                    @endphp
                    <div class="post-tag text-sm flex mb-1 text-[#383838]">
                        <div class="flex mr-3">
                            <svg viewBox="0 0 24 24" fill="none"  width="16px" class="mr-1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5"></path> </g></svg>
                            {{ $post->luotxem }} lượt xem
                        </div>
                        <div class="flex mr-3">
                            <svg version="1.1" width="16px" class="mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#383838"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M150.932,218.624c10.84,3.192,23.58,4.988,37.258,4.996c18.245-0.023,34.79-3.17,47.434-8.668 c6.318-2.771,11.72-6.126,15.866-10.39c4.108-4.204,7.071-9.718,7.064-15.939c0.007-6.222-2.956-11.742-7.064-15.94 c-6.237-6.362-15.216-10.825-26.048-14.062c-10.833-3.192-23.572-4.995-37.251-4.995c-18.244,0.014-34.79,3.162-47.441,8.668 c-6.318,2.771-11.72,6.125-15.865,10.389c-4.108,4.198-7.072,9.718-7.065,15.94c-0.007,6.221,2.956,11.734,7.065,15.939 C131.12,210.917,140.106,215.387,150.932,218.624z M135.754,183.213c3.303-3.495,10.249-7.404,19.464-10.079 c9.207-2.72,20.64-4.382,32.972-4.374c16.434-0.023,31.288,2.97,41.374,7.404c5.04,2.187,8.846,4.744,11.048,7.05 c2.246,2.357,2.8,4.05,2.808,5.41c-0.008,1.352-0.562,3.052-2.808,5.409c-3.296,3.488-10.242,7.404-19.457,10.079 c-9.207,2.72-20.632,4.375-32.965,4.375c-16.441,0.014-31.294-2.971-41.381-7.404c-5.04-2.188-8.846-4.744-11.054-7.05 c-2.246-2.357-2.794-4.057-2.801-5.409C132.96,187.263,133.508,185.57,135.754,183.213z"></path> <path class="st0" d="M288.2,109.155c0.044,0.015,0.096,0.029,0.14,0.044l0.584,0.17L288.2,109.155z"></path> <path class="st0" d="M88.172,402.845c-0.059-0.014-0.119-0.037-0.178-0.059l-0.732-0.214L88.172,402.845z"></path> <path class="st0" d="M376.372,243.659v-55.037c0.008-8.114-1.929-15.888-5.224-22.922c-3.304-7.05-7.929-13.397-13.42-19.043 c-16.412-16.766-40.488-28.812-69.388-37.458l-0.155-0.044c-29.041-8.564-63.262-13.397-99.996-13.405 c-48.993,0.044-93.448,8.528-127.262,23.24l-0.015,0.008c-16.885,7.404-31.316,16.405-42.276,27.666 C13.154,152.303,8.528,158.65,5.225,165.7C1.929,172.735-0.008,180.509,0,188.623v134.756c-0.008,8.113,1.929,15.88,5.225,22.915 c3.303,7.05,7.929,13.397,13.412,19.043c16.413,16.766,40.472,28.812,69.358,37.45l0.192,0.059 c29.049,8.565,63.262,13.39,100.003,13.405H512v-172.59H376.372z M37.658,165.101c11.38-11.838,31.82-22.856,58.03-30.548 c26.204-7.737,58.119-12.326,92.502-12.319c45.838-0.022,87.308,8.18,116.659,21.031c14.676,6.399,26.27,13.966,33.866,21.836 c7.634,7.929,11.166,15.739,11.174,23.521c-0.008,7.773-3.54,15.592-11.174,23.521c-11.38,11.83-31.819,22.848-58.03,30.541 c-26.204,7.744-58.112,12.326-92.496,12.326c-45.845,0.015-87.314-8.187-116.666-21.031c-14.676-6.399-26.27-13.966-33.866-21.836 c-7.634-7.929-11.166-15.748-11.174-23.521C26.492,180.841,30.024,173.03,37.658,165.101z M349.888,222.341v32.669h-58.23 c6.746-2.202,13.256-4.552,19.249-7.168c15.954-6.983,29.145-15.348,38.684-25.176L349.888,222.341z M485.516,389.766h-45.402 v-66.854h-15.134v66.854h-33.416v-36.209h-15.134v36.209h-33.423v-66.854h-15.134v66.854h-33.423v-36.209h-15.134v36.209h-33.415 v-66.854h-15.134v66.854h-33.415v-36.209h-15.134v36.076c-11.491-0.177-22.657-0.857-33.423-2.01v-64.711h-15.134v62.76 c-23.772-3.621-45.054-9.459-62.138-16.937c-14.676-6.399-26.27-13.966-33.866-21.836c-7.634-7.93-11.166-15.748-11.174-23.521 V222.341l0.296,0.325c14.314,14.706,36.8,26.277,64.621,34.532c27.83,8.217,61.053,12.939,96.788,12.946h297.326V389.766z"></path> </g> </g></svg>
                            {{ $post->dientich }} m²
                        </div>
                        @foreach($post->services as $service)
                            <div class="flex mr-3">
                                {!! $service->icon !!}
                                {{ $service->name }}
                            </div>
                        @endforeach            
                    </div>
                    <div class="text-[#c90927] font-medium flex"><svg viewBox="0 0 24 24" class="mr-1" width="16px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17V17.5V18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 6V6.5V7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    {{ number_format($post->giaphong) }} đ/tháng</div>
                    {{-- <div class="post-price mb-1 font-semibold text-[#c90927]">{{ number_format($post->giaphong) }} đ/tháng</div> --}}
                    @endif
                    <div class="post-description text-gray-500 mb-1 leading-tight">{{ Str::of($post->description)->words(25, '...') }}</div>
                    <div class="post-address text-sm flex text-[#383838]">
                        <svg viewBox="0 0 1024 1024" fill="#383838" width="16px" class="mr-1" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z" fill=""></path></g></svg>
                        {{ $post->xa->name }}, {{ $post->huyen->name }}
                    </div>     
                </div>
            </div> 
        @endforeach
        {{ $posts->links()}}
    </div>
</div>
@endsection