@extends('main')

@section('content')
<div class="home w-full py-10">
    <div class="banner-content w-[700px] mx-auto p-10">
        <h1 class="font-extrabold">Website kết nối<br> người thuê và chủ phòng trọ, căn hộ</h1>
        <p class="mb-10">Kết nối bạn với hàng vạn phòng trọ tiện nghi theo nhu cầu</p>
        <form action="/post/list" method="GET">
            <div class="search-box text-center">
                <div class="search-input mb-4">
                    <input type="text" name="title" placeholder="Cổng chính CNTT">
                </div>
                <div class="mb-4 text-left">
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
                <button type="submit" class="btn-type-2 inline-block px-4 py-2 text-white hover:text-white font-medium text-sm bg-[#E03C31] inline-flex items-center"><svg width="20px" class="mr-1" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_15_152)"> <rect width="24" height="24" fill="transparent"></rect> <circle cx="10.5" cy="10.5" r="6.5" stroke="#ffffff" stroke-linejoin="round"></circle> <path d="M19.6464 20.3536C19.8417 20.5488 20.1583 20.5488 20.3536 20.3536C20.5488 20.1583 20.5488 19.8417 20.3536 19.6464L19.6464 20.3536ZM20.3536 19.6464L15.3536 14.6464L14.6464 15.3536L19.6464 20.3536L20.3536 19.6464Z" fill="#ffffff"></path> </g> <defs> <clipPath id="clip0_15_152"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
<div class="container mx-auto 2xl:w-[1200px] py-14 district-motel grid grid-cols-4 grid-rows-2 gap-5">
    <div class="rounded col-span-2 row-span-2 tpthainguyen relative">
        <div class="absolute top-5 left-5 text-white z-10">
            <p class="font-bold text-xl">TP. Thái Nguyên</p>
            <p>{{ $tptn }} tin đăng</p>
        </div>
        <a href="post/list?dt=1" class="absolute w-full h-full top-0 left-0 z-10"></a>
    </div>
    <div class="rounded relative phoyen">
        <div class="absolute top-3 left-3 text-white z-10">
            <p class="font-bold text-xl">Phổ Yên</p>
            <p>{{ $tppy }} tin đăng</p>
        </div>
        <a href="post/list?dt=8" class="absolute w-full h-full top-0 left-0 z-10"></a>
    </div>
    <div class="rounded relative songcong">
        <div class="absolute top-3 left-3 text-white z-10">
            <p class="font-bold text-xl">Sông Công</p>
            <p>{{ $tpsc }} tin đăng</p>
        </div>
        <a href="post/list?dt=2" class="absolute w-full h-full top-0 left-0 z-10"></a>
    </div>
    <div class="rounded relative phubinh">
        <div class="absolute top-3 left-3 text-white z-10">
            <p class="font-bold text-xl">Phú Bình</p>
            <p>{{ $hpb }} tin đăng</p>
        </div>
        <a href="post/list?dt=9" class="absolute w-full h-full top-0 left-0 z-10"></a>
    </div>
    <div class="rounded relative daitu">
        <div class="absolute top-3 left-3 text-white z-10">
            <p class="font-bold text-xl">Đại Từ</p>
            <p>{{ $hdt }} tin đăng</p>
        </div>
        <a href="post/list?dt=7" class="absolute w-full h-full top-0 left-0 z-10"></a>
    </div>
</div>

<div class="hot-motel mb-10 container 2xl:w-[1200px] mx-auto">
    <h4 class="mb-7 text-xl font-bold">Phòng trọ được quan tâm</h4>
    <div class="hot-motel-list">
        @foreach($wishlist_posts as $post)
        <div class="motel-item px-3 py-3 w-1/5 my-4">
            <a href="/post/{{ $post->id }}">
            <div class="thumb mb-2">
                <img src="{{$post->images[0]->url}}" alt="" class="h-full w-full object-cover">
            </div>
            <div class="motel-info">
                <h3 class="font-semibold mb-1">{{Str::of($post->title)->words(10, '...')}}</h3>
                <div class="post-tag flex-wrap text-[#383838] flex mb-1">
                    <div class="flex items-center w-max text-xs mr-3"><svg version="1.1" class="mr-1" width="16px" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M150.932,218.624c10.84,3.192,23.58,4.988,37.258,4.996c18.245-0.023,34.79-3.17,47.434-8.668 c6.318-2.771,11.72-6.126,15.866-10.39c4.108-4.204,7.071-9.718,7.064-15.939c0.007-6.222-2.956-11.742-7.064-15.94 c-6.237-6.362-15.216-10.825-26.048-14.062c-10.833-3.192-23.572-4.995-37.251-4.995c-18.244,0.014-34.79,3.162-47.441,8.668 c-6.318,2.771-11.72,6.125-15.865,10.389c-4.108,4.198-7.072,9.718-7.065,15.94c-0.007,6.221,2.956,11.734,7.065,15.939 C131.12,210.917,140.106,215.387,150.932,218.624z M135.754,183.213c3.303-3.495,10.249-7.404,19.464-10.079 c9.207-2.72,20.64-4.382,32.972-4.374c16.434-0.023,31.288,2.97,41.374,7.404c5.04,2.187,8.846,4.744,11.048,7.05 c2.246,2.357,2.8,4.05,2.808,5.41c-0.008,1.352-0.562,3.052-2.808,5.409c-3.296,3.488-10.242,7.404-19.457,10.079 c-9.207,2.72-20.632,4.375-32.965,4.375c-16.441,0.014-31.294-2.971-41.381-7.404c-5.04-2.188-8.846-4.744-11.054-7.05 c-2.246-2.357-2.794-4.057-2.801-5.409C132.96,187.263,133.508,185.57,135.754,183.213z"></path> <path class="st0" d="M288.2,109.155c0.044,0.015,0.096,0.029,0.14,0.044l0.584,0.17L288.2,109.155z"></path> <path class="st0" d="M88.172,402.845c-0.059-0.014-0.119-0.037-0.178-0.059l-0.732-0.214L88.172,402.845z"></path> <path class="st0" d="M376.372,243.659v-55.037c0.008-8.114-1.929-15.888-5.224-22.922c-3.304-7.05-7.929-13.397-13.42-19.043 c-16.412-16.766-40.488-28.812-69.388-37.458l-0.155-0.044c-29.041-8.564-63.262-13.397-99.996-13.405 c-48.993,0.044-93.448,8.528-127.262,23.24l-0.015,0.008c-16.885,7.404-31.316,16.405-42.276,27.666 C13.154,152.303,8.528,158.65,5.225,165.7C1.929,172.735-0.008,180.509,0,188.623v134.756c-0.008,8.113,1.929,15.88,5.225,22.915 c3.303,7.05,7.929,13.397,13.412,19.043c16.413,16.766,40.472,28.812,69.358,37.45l0.192,0.059 c29.049,8.565,63.262,13.39,100.003,13.405H512v-172.59H376.372z M37.658,165.101c11.38-11.838,31.82-22.856,58.03-30.548 c26.204-7.737,58.119-12.326,92.502-12.319c45.838-0.022,87.308,8.18,116.659,21.031c14.676,6.399,26.27,13.966,33.866,21.836 c7.634,7.929,11.166,15.739,11.174,23.521c-0.008,7.773-3.54,15.592-11.174,23.521c-11.38,11.83-31.819,22.848-58.03,30.541 c-26.204,7.744-58.112,12.326-92.496,12.326c-45.845,0.015-87.314-8.187-116.666-21.031c-14.676-6.399-26.27-13.966-33.866-21.836 c-7.634-7.929-11.166-15.748-11.174-23.521C26.492,180.841,30.024,173.03,37.658,165.101z M349.888,222.341v32.669h-58.23 c6.746-2.202,13.256-4.552,19.249-7.168c15.954-6.983,29.145-15.348,38.684-25.176L349.888,222.341z M485.516,389.766h-45.402 v-66.854h-15.134v66.854h-33.416v-36.209h-15.134v36.209h-33.423v-66.854h-15.134v66.854h-33.423v-36.209h-15.134v36.209h-33.415 v-66.854h-15.134v66.854h-33.415v-36.209h-15.134v36.076c-11.491-0.177-22.657-0.857-33.423-2.01v-64.711h-15.134v62.76 c-23.772-3.621-45.054-9.459-62.138-16.937c-14.676-6.399-26.27-13.966-33.866-21.836c-7.634-7.93-11.166-15.748-11.174-23.521 V222.341l0.296,0.325c14.314,14.706,36.8,26.277,64.621,34.532c27.83,8.217,61.053,12.939,96.788,12.946h297.326V389.766z"></path> </g> </g></svg>
                        {{ $post->dientich }} m²</div>
                        @foreach($post->services as $service)
                        <div class="flex items-center w-max text-xs mr-3">
                            {!! $service->icon !!}
                            {{ $service->name }}
                        </div>
                    @endforeach      
                </div>
                <div class="text-[#c90927] font-medium flex"><svg viewBox="0 0 24 24" class="mr-1" width="16px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17V17.5V18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 6V6.5V7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    {{ number_format($post->giaphong) }} đ/tháng</div>
                <div class="post-address flex text-[#383838] text-sm">
                    <svg viewBox="0 0 1024 1024" class="mr-2" width="18px" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z" fill=""></path></g></svg>
                    {{ $post->xa->name }}, {{ $post->huyen->name }}
                </div>
            </div>
            </a>
        </div>
        @endforeach
      </div>
</div>
<div class="w-full py-6 my-10 bg-slate-200">
    <div class="features container mx-auto 2xl:w-[1200px] flex">
        <div class="feature-item rounded-md mr-5 w-1/3 p-3 bg-white">
            <a href="/" class="pl-3 block">
                <svg width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M33 11.8c0 .5-.5 1-1 1s-1-.5-1-1V1c0-.6.5-1 1-1s1 .4 1 1v10.8" fill="#b2c1c0"> </path> <path fill="#e5dec1" d="M4 28h56v32H4z"> </path> <path d="M60.5 19.8c-.5-1-1.8-1.8-3-1.8H6.4c-1.1 0-2.5.8-3 1.8L.1 26.2c-.5 1 0 1.8 1.1 1.8h61.4c1.1 0 1.6-.8 1.1-1.8l-3.2-6.4" fill="#d33b23"> </path> <g fill="#d6eef0"> <path d="M15 45c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4"> </path> <path d="M15 35c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4"> </path> </g> <g fill="#dbb471"> <path d="M14 36.5H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8"> </path> <path d="M10.5 30h1v6h-1z"> </path> <path d="M14 47H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8"> </path> <path d="M10.5 40.5h1v6h-1z"> </path> </g> <path d="M15 55c0 .5-.4 1-1 1H8c-.6 0-1-.5-1-1v-4c0-.5.4-1 1-1h6c.6 0 1 .5 1 1v4" fill="#d6eef0"> </path> <g fill="#dbb471"> <path d="M14 57H8c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5H8"> </path> <path d="M10.5 50.5h1v6h-1z"> </path> </g> <g fill="#d6eef0"> <path d="M57 45c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4"> </path> <path d="M57 35c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4"> </path> </g> <g fill="#dbb471"> <path d="M56 36.5h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6"> </path> <path d="M52.5 30h1v6h-1z"> </path> <path d="M56 47h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6"> </path> <path d="M52.5 40.5h1v6h-1z"> </path> </g> <path d="M57 55c0 .5-.5 1-1 1h-6c-.5 0-1-.5-1-1v-4c0-.5.5-1 1-1h6c.5 0 1 .5 1 1v4" fill="#d6eef0"> </path> <g fill="#dbb471"> <path d="M56 57h-6c-.8 0-1.5-.7-1.5-1.5v-4c0-.8.7-1.5 1.5-1.5h6c.8 0 1.5.7 1.5 1.5v4c0 .8-.7 1.5-1.5 1.5m-6-6c-.3 0-.5.2-.5.5v4c0 .3.2.5.5.5h6c.3 0 .5-.2.5-.5v-4c0-.3-.2-.5-.5-.5h-6"> </path> <path d="M52.5 50.5h1v6h-1z"> </path> </g> <path d="M32.8 11.6c-.4-.3-1.1-.3-1.6 0L11.8 27.4c-.4.3-.4.6.2.6h40c.5 0 .7-.3.2-.6L32.8 11.6" fill="#f15744"> </path> <path d="M48.2 27.4L32.8 14.6c-.4-.4-1.1-.4-1.5 0L15.8 27.4c-.5.3-.4.6.2.6h2v32h28V28h2c.5 0 .7-.3.2-.6" fill="#f9f3d9"> </path> <path fill="#e5dec1" d="M24 45h16v15H24z"> </path> <path fill="#42ade2" d="M26 45h12v15H26z"> </path> <g fill="#89664c"> <path d="M20.2 38c.3.1.7.2 1.1.2c.5 0 .7-.2.7-.4s-.2-.4-.7-.5c-.7-.2-1.2-.6-1.2-1.1c0-.7.6-1.2 1.7-1.2c.5 0 .9.1 1.1.2l-.2.7c-.2-.1-.5-.2-.9-.2s-.6.2-.6.4s.2.4.8.5c.8.3 1.1.6 1.1 1.2s-.6 1.2-1.8 1.2c-.5 0-1-.1-1.2-.2l.1-.8"> </path> <path d="M26.9 38.8c-.2.1-.6.2-1.1.2c-1.5 0-2.3-.8-2.3-1.9c0-1.3 1.1-2.1 2.4-2.1c.5 0 .9.1 1.1.2l-.2.7c-.2-.1-.5-.1-.8-.1c-.8 0-1.4.4-1.4 1.3c0 .8.5 1.3 1.4 1.3c.3 0 .6-.1.8-.1l.1.5"> </path> <path d="M28.5 35.1v1.5h1.6v-1.5h1V39h-1v-1.6h-1.6V39h-1v-3.9h1"> </path> <path d="M36 37c0 1.3-.9 2-2.1 2c-1.3 0-2.1-.9-2.1-2c0-1.2.8-2 2.1-2s2.1.9 2.1 2m-3.2 0c0 .8.4 1.3 1.1 1.3c.7 0 1-.6 1-1.3c0-.7-.4-1.3-1.1-1.3c-.6 0-1 .6-1 1.3"> </path> <path d="M40.6 37c0 1.3-.9 2-2.1 2c-1.3 0-2.1-.9-2.1-2c0-1.2.8-2 2.1-2c1.4 0 2.1.9 2.1 2m-3.1 0c0 .8.4 1.3 1.1 1.3c.7 0 1-.6 1-1.3c0-.7-.4-1.3-1.1-1.3c-.6 0-1 .6-1 1.3"> </path> <path d="M41.3 35.1h1v3.1H44v.7h-2.7v-3.8"> </path> </g> <circle cx="32" cy="26" r="7" fill="#dbb471"> </circle> <circle cx="32" cy="26" r="5" fill="#ffffff"> </circle> <path fill="#e5dec1" d="M31.5 45h1v15h-1z"> </path> <path d="M32 22c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1s1-.5 1-1v-4c0-.5-.5-1-1-1" fill="#b2c1c0"> </path> <path d="M32 26h-2c-.5 0-1 .5-1 1s.5 1 1 1h2c.5 0 1-.5 1-1s-.5-1-1-1" fill="#f15744"> </path> <path d="M33 2v7.4c4 3.2 8-6.9 12-3.7C41 0 37 7.6 33 2z" fill="#b4d7ee"> </path> <path d="M32.9 40.3c-.5-.4-1.4-.4-1.9 0c-2.1 1.5-9 5.7-9 5.7v2h20v-2s-6.9-4.2-9.1-5.7" fill="#f15744"> </path> <path d="M63 60H1c-.6 0-1 .5-1 1v2c0 .5.4 1 1 1h62c.5 0 1-.5 1-1v-2c0-.5-.5-1-1-1" fill="#666"> </path> <path fill="#e8e8e8" d="M20 62h24v2H20z"> </path> <path fill="#d0d0d0" d="M22 60h20v2H22z"> </path> <g fill="#666"> <path d="M29.1 53.5h1.4v.7h-1.4z"> </path> <path d="M33.5 53.5h1.4v.7h-1.4z"> </path> </g> </g></svg>
                <div class="font-bold text-xl mt-3">Phòng trọ gần trường</div>
            </a>
        </div>
        <div class="feature-item rounded-md  mr-5 w-1/3 p-3 bg-white">
            <a href="/" class="pl-3 block">
                <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M663.4 736h192v167.5h-192z" fill="#A4A9AD"></path><path d="M681.2 790.3h82.3v39.6h-82.3zM773 843h82.3v39.6H773zM663.4 736h192v45h-192z" fill=""></path><path d="M872.4 720.3c0-5.2-4.3-9.5-9.5-9.5H655.8c-5.2 0-9.5 4.3-9.5 9.5v31.5c0 5.2 4.3 9.5 9.5 9.5h207.1c5.2 0 9.5-4.3 9.5-9.5v-31.5z" fill="#D68231"></path><path d="M738.6 82.1c-21.3 0-40.5 8.8-54.2 23-11.6-7.3-25.4-11.6-40.2-11.6-41.6 0-75.4 33.7-75.4 75.4v1c-43 6.6-76 43.7-76 88.6 0 49.5 40.1 89.6 89.6 89.6S672 308 672 258.5c0-6.5-0.7-12.7-2-18.8 10.8-4 20.5-10.3 28.3-18.5 11.6 7.3 25.4 11.6 40.2 11.6 41.6 0 75.4-33.7 75.4-75.4 0-41.6-33.7-75.3-75.3-75.3z" fill="#D1D3D3"></path><path d="M673 258.4H492l-39.8 645.1h260.5z" fill="#333E48"></path><path d="M679 357.2H485.9l-1.8 28.5h196.7l-1.8-28.5z m3.6 57.8H482.3l-1.8 28.5h203.8l-1.7-28.5z" fill="#D68231"></path><path d="M131.4 546.8h490.9v356.7H131.4z" fill="#A4A9AD"></path><path d="M540 773.2h82.3v39.6H540zM131.2 725.2h82.3v39.6h-82.3zM411 576.2h82.3v39.6H411zM233.2 546.8h82.3v39.6h-82.3zM201.8 829.9h82.3v39.6h-82.3zM573.6 664.3c0-10.4-8.5-19-19-19H199.1c-10.4 0-19 8.5-19 19v34.9c0 10.4 8.5 19 19 19h355.5c10.4 0 19-8.5 19-19v-34.9z" fill=""></path><path d="M573.6 634.8c0-10.4-8.5-19-19-19H199.1c-10.4 0-19 8.5-19 19v34.9c0 10.4 8.5 19 19 19h355.5c10.4 0 19-8.5 19-19v-34.9z" fill="#FFFFFF"></path><path d="M554.6 615.8H199.1c-10.4 0-19 8.5-19 19V659c0-10.4 8.5-19 19-19h355.5c10.4 0 19 8.5 19 19v-24.2c0-10.4-8.5-19-19-19z" fill=""></path><path d="M131.4 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM213.2 472.6v74.2H295l-74.3-74.3c-2.9-3-7.5-4.6-7.5 0.1zM295.1 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1z" fill="#D1D3D3"></path><path d="M376.9 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM458.7 472.6v74.2h81.8l-74.3-74.3c-3-3-7.5-4.6-7.5 0.1zM540.5 472.6v74.2h81.8L548 472.5c-2.9-3-7.5-4.6-7.5 0.1zM263.1 756.3h227.7v147.2H263.1z" fill="#D1D3D3"></path><path d="M263.1 786.7h227.7v28.5H263.1zM263.1 840.8h227.7v28.5H263.1z" fill=""></path><path d="M260.1 615.8h28.5v72.9h-28.5zM362.6 615.8h28.5v72.9h-28.5zM465.2 615.8h28.5v72.9h-28.5z" fill="#A4A9AD"></path><path d="M199.1 630.1c-2.6 0-4.7 2.2-4.7 4.7v34.9c0 2.6 2.2 4.7 4.7 4.7h355.5c2.6 0 4.7-2.2 4.7-4.7v-34.9c0-2.6-2.2-4.7-4.7-4.7H199.1zM554.6 703H199.1c-18.3 0-33.2-14.9-33.2-33.2v-34.9c0-18.3 14.9-33.2 33.2-33.2h355.5c18.3 0 33.2 14.9 33.2 33.2v34.9c0.1 18.3-14.8 33.2-33.2 33.2z" fill="#D68231"></path><path d="M957.9 933.3c0 4.2-3.5 7.7-7.7 7.7h-875c-4.2 0-7.7-3.5-7.7-7.7v-27.5c0-4.2 3.5-7.7 7.7-7.7h875.1c4.2 0 7.7 3.5 7.7 7.7v27.5z" fill="#333E48"></path></g></svg>
                <div class="font-bold text-xl mt-3">Phòng trọ gần khu công nghiệp</div>
            </a>
        </div>
        <div class="feature-item rounded-md w-1/3 p-3 bg-white">
            <a href="/" class="pl-3 block">
                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#F9EBB2" d="M56,60c0,1.104-0.896,2-2,2H38V47c0-0.553-0.447-1-1-1H27c-0.553,0-1,0.447-1,1v15H10c-1.104,0-2-0.896-2-2 V31.411L32.009,7.403L56,31.394V60z"></path> <polygon fill="#F76D57" points="14,6 18,6 18,12.601 14,16.593 "></polygon> <rect x="28" y="48" fill="#F9EBB2" width="8" height="14"></rect> <path fill="#F76D57" d="M61,33c-0.276,0-0.602-0.036-0.782-0.217L32.716,5.281c-0.195-0.195-0.451-0.293-0.707-0.293 s-0.512,0.098-0.707,0.293L3.791,32.793C3.61,32.974,3.276,33,3,33c-0.553,0-1-0.447-1-1c0-0.276,0.016-0.622,0.197-0.803 L31.035,2.41c0,0,0.373-0.41,0.974-0.41s0.982,0.398,0.982,0.398l28.806,28.805C61.978,31.384,62,31.724,62,32 C62,32.552,61.553,33,61,33z"></path> <g> <path fill="#394240" d="M63.211,29.789L34.438,1.015c0,0-0.937-1.015-2.43-1.015s-2.376,0.991-2.376,0.991L20,10.604V5 c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v13.589L0.783,29.783C0.24,30.326,0,31.172,0,32c0,1.656,1.343,3,3,3 c0.828,0,1.662-0.251,2.205-0.794L6,33.411V60c0,2.211,1.789,4,4,4h44c2.211,0,4-1.789,4-4V33.394l0.804,0.804 C59.347,34.739,60.172,35,61,35c1.657,0,3-1.343,3-3C64,31.171,63.754,30.332,63.211,29.789z M14,6h4v6.601l-4,3.992V6z M36,62h-8 V48h8V62z M56,60c0,1.104-0.896,2-2,2H38V47c0-0.553-0.447-1-1-1H27c-0.553,0-1,0.447-1,1v15H10c-1.104,0-2-0.896-2-2V31.411 L32.009,7.403L56,31.394V60z M61,33c-0.276,0-0.602-0.036-0.782-0.217L32.716,5.281c-0.195-0.195-0.451-0.293-0.707-0.293 s-0.512,0.098-0.707,0.293L3.791,32.793C3.61,32.974,3.276,33,3,33c-0.553,0-1-0.447-1-1c0-0.276,0.016-0.622,0.197-0.803 L31.035,2.41c0,0,0.373-0.41,0.974-0.41s0.982,0.398,0.982,0.398l28.806,28.805C61.978,31.384,62,31.724,62,32 C62,32.552,61.553,33,61,33z"></path> <path fill="#394240" d="M23,32h-8c-0.553,0-1,0.447-1,1v8c0,0.553,0.447,1,1,1h8c0.553,0,1-0.447,1-1v-8 C24,32.447,23.553,32,23,32z M22,40h-6v-6h6V40z"></path> <path fill="#394240" d="M41,42h8c0.553,0,1-0.447,1-1v-8c0-0.553-0.447-1-1-1h-8c-0.553,0-1,0.447-1,1v8 C40,41.553,40.447,42,41,42z M42,34h6v6h-6V34z"></path> </g> <rect x="28" y="48" fill="#506C7F" width="8" height="14"></rect> <g> <rect x="16" y="34" fill="#45AAB8" width="6" height="6"></rect> <rect x="42" y="34" fill="#45AAB8" width="6" height="6"></rect> </g> </g> </g></svg>
                <div class="font-bold text-xl mt-3">Căn hộ</div>
            </a>
        </div>
    </div>
</div>
<div class="new-motel mb-10 container 2xl:w-[1200px] mx-auto">
    <h4 class="mb-7 text-xl font-bold">Phòng trọ mới</h4>
    <div class="new-motel-list flex flex-wrap">
        @foreach($new_posts as $post)
        <div class="motel-item mb-8 px-4 py-3 w-1/4">
            <a href="/post/{{ $post->id }}">
            <div class="thumb mb-2">
                <img src="{{$post->images[0]->url}}" alt="" class="h-full w-full object-cover">
            </div>
            <div class="motel-info">
                <h3 class="font-semibold mb-1">{{Str::of($post->title)->words(10, '...')}}</h3>
                <div class="post-tag flex-wrap text-[#383838] flex mb-1">
                    <div class="flex items-center w-max text-xs mr-3"><svg version="1.1" class="mr-1" width="16px" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M150.932,218.624c10.84,3.192,23.58,4.988,37.258,4.996c18.245-0.023,34.79-3.17,47.434-8.668 c6.318-2.771,11.72-6.126,15.866-10.39c4.108-4.204,7.071-9.718,7.064-15.939c0.007-6.222-2.956-11.742-7.064-15.94 c-6.237-6.362-15.216-10.825-26.048-14.062c-10.833-3.192-23.572-4.995-37.251-4.995c-18.244,0.014-34.79,3.162-47.441,8.668 c-6.318,2.771-11.72,6.125-15.865,10.389c-4.108,4.198-7.072,9.718-7.065,15.94c-0.007,6.221,2.956,11.734,7.065,15.939 C131.12,210.917,140.106,215.387,150.932,218.624z M135.754,183.213c3.303-3.495,10.249-7.404,19.464-10.079 c9.207-2.72,20.64-4.382,32.972-4.374c16.434-0.023,31.288,2.97,41.374,7.404c5.04,2.187,8.846,4.744,11.048,7.05 c2.246,2.357,2.8,4.05,2.808,5.41c-0.008,1.352-0.562,3.052-2.808,5.409c-3.296,3.488-10.242,7.404-19.457,10.079 c-9.207,2.72-20.632,4.375-32.965,4.375c-16.441,0.014-31.294-2.971-41.381-7.404c-5.04-2.188-8.846-4.744-11.054-7.05 c-2.246-2.357-2.794-4.057-2.801-5.409C132.96,187.263,133.508,185.57,135.754,183.213z"></path> <path class="st0" d="M288.2,109.155c0.044,0.015,0.096,0.029,0.14,0.044l0.584,0.17L288.2,109.155z"></path> <path class="st0" d="M88.172,402.845c-0.059-0.014-0.119-0.037-0.178-0.059l-0.732-0.214L88.172,402.845z"></path> <path class="st0" d="M376.372,243.659v-55.037c0.008-8.114-1.929-15.888-5.224-22.922c-3.304-7.05-7.929-13.397-13.42-19.043 c-16.412-16.766-40.488-28.812-69.388-37.458l-0.155-0.044c-29.041-8.564-63.262-13.397-99.996-13.405 c-48.993,0.044-93.448,8.528-127.262,23.24l-0.015,0.008c-16.885,7.404-31.316,16.405-42.276,27.666 C13.154,152.303,8.528,158.65,5.225,165.7C1.929,172.735-0.008,180.509,0,188.623v134.756c-0.008,8.113,1.929,15.88,5.225,22.915 c3.303,7.05,7.929,13.397,13.412,19.043c16.413,16.766,40.472,28.812,69.358,37.45l0.192,0.059 c29.049,8.565,63.262,13.39,100.003,13.405H512v-172.59H376.372z M37.658,165.101c11.38-11.838,31.82-22.856,58.03-30.548 c26.204-7.737,58.119-12.326,92.502-12.319c45.838-0.022,87.308,8.18,116.659,21.031c14.676,6.399,26.27,13.966,33.866,21.836 c7.634,7.929,11.166,15.739,11.174,23.521c-0.008,7.773-3.54,15.592-11.174,23.521c-11.38,11.83-31.819,22.848-58.03,30.541 c-26.204,7.744-58.112,12.326-92.496,12.326c-45.845,0.015-87.314-8.187-116.666-21.031c-14.676-6.399-26.27-13.966-33.866-21.836 c-7.634-7.929-11.166-15.748-11.174-23.521C26.492,180.841,30.024,173.03,37.658,165.101z M349.888,222.341v32.669h-58.23 c6.746-2.202,13.256-4.552,19.249-7.168c15.954-6.983,29.145-15.348,38.684-25.176L349.888,222.341z M485.516,389.766h-45.402 v-66.854h-15.134v66.854h-33.416v-36.209h-15.134v36.209h-33.423v-66.854h-15.134v66.854h-33.423v-36.209h-15.134v36.209h-33.415 v-66.854h-15.134v66.854h-33.415v-36.209h-15.134v36.076c-11.491-0.177-22.657-0.857-33.423-2.01v-64.711h-15.134v62.76 c-23.772-3.621-45.054-9.459-62.138-16.937c-14.676-6.399-26.27-13.966-33.866-21.836c-7.634-7.93-11.166-15.748-11.174-23.521 V222.341l0.296,0.325c14.314,14.706,36.8,26.277,64.621,34.532c27.83,8.217,61.053,12.939,96.788,12.946h297.326V389.766z"></path> </g> </g></svg>
                        {{ $post->dientich }} m²</div>
                        @foreach($post->services as $service)
                        <div class="flex items-center w-max text-xs mr-3">
                            {!! $service->icon !!}
                            {{ $service->name }}
                        </div>
                    @endforeach      
                </div>
                <div class="text-[#c90927] font-medium flex"><svg viewBox="0 0 24 24" class="mr-1" width="16px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17V17.5V18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 6V6.5V7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    {{ number_format($post->giaphong) }} đ/tháng</div>
                <div class="post-address flex text-[#383838] text-sm">
                    <svg viewBox="0 0 1024 1024" class="mr-2" width="18px" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z" fill=""></path></g></svg>
                    {{ $post->xa->name }}, {{ $post->huyen->name }}
                </div>
            </div>
            </a>
        </div>
        @endforeach
      </div>
</div>
@endsection