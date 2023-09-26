@extends('main')
@section('content')
<div class="w-full py-10">
    <div class="container 2xl:w-[1200px] mx-auto flex">
        @include('profile.info_box')
        <div class="w-3/4 p-5 border">
            <div class="post-counter mb-8">
                <div class="wrapper flex">
                    <div class="counter col_fourth w-1/3">
                        <a href="dadang" class="flex justify-center items-center">
                            <svg width="60px" height="60px" class="mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <path id="check-a" d="M4.29289322,0.292893219 C4.68341751,-0.0976310729 5.31658249,-0.0976310729 5.70710678,0.292893219 C6.09763107,0.683417511 6.09763107,1.31658249 5.70710678,1.70710678 L1.90917969,5.46118164 C1.5186554,5.85170593 0.885490417,5.85170593 0.494966125,5.46118164 C0.104441833,5.07065735 0.104441833,4.43749237 0.494966125,4.04696808 L4.29289322,0.292893219 Z"></path> <path id="check-c" d="M10.7071068,13.2928932 C11.0976311,13.6834175 11.0976311,14.3165825 10.7071068,14.7071068 C10.3165825,15.0976311 9.68341751,15.0976311 9.29289322,14.7071068 L0.292893219,5.70710678 C-0.0976310729,5.31658249 -0.0976310729,4.68341751 0.292893219,4.29289322 L4.29289322,0.292893219 C4.68341751,-0.0976310729 5.31658249,-0.0976310729 5.70710678,0.292893219 C6.09763107,0.683417511 6.09763107,1.31658249 5.70710678,1.70710678 L2.41421356,5 L10.7071068,13.2928932 Z"></path> </defs> <g fill="none" fill-rule="evenodd" transform="rotate(-90 11 7)"> <g transform="translate(1 1)"> <mask id="check-b" fill="#ffffff"> <use xlink:href="#check-a"></use> </mask> <use fill="#D8D8D8" fill-rule="nonzero" xlink:href="#check-a"></use> <g fill="#d7ff47" mask="url(#check-b)"> <rect width="24" height="24" transform="translate(-7 -5)"></rect> </g> </g> <mask id="check-d" fill="#ffffff"> <use xlink:href="#check-c"></use> </mask> <use fill="#000000" fill-rule="nonzero" xlink:href="#check-c"></use> <g fill="#0cb800" mask="url(#check-d)"> <rect width="24" height="24" transform="translate(-6 -4)"></rect> </g> </g> </g></svg>
							<div>
                                <h2 class="timer count-title count-number">{{ $dad }}</h2>
                                <p class="count-text font-bold text-lg">Tin đã đăng</p>
                            </div>
                        </a>
                    </div>
                
                    <div class="counter col_fourth w-1/3">
                        <a href="chuaduyet" class="flex justify-center items-center">
                            <svg fill="#005875" height="60px" width="40px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297" xml:space="preserve" stroke="#005875"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M251.01,277.015h-17.683l-0.002-31.558c0-31.639-17.358-60.726-48.876-81.901c-3.988-2.682-6.466-8.45-6.466-15.055 s2.478-12.373,6.464-15.053c31.52-21.178,48.878-50.264,48.88-81.904V19.985h17.683c5.518,0,9.992-4.475,9.992-9.993 c0-5.518-4.475-9.992-9.992-9.992H45.99c-5.518,0-9.992,4.475-9.992,9.992c0,5.519,4.475,9.993,9.992,9.993h17.683v31.558 c0,31.642,17.357,60.728,48.875,81.903c3.989,2.681,6.467,8.448,6.467,15.054s-2.478,12.373-6.466,15.053 c-31.519,21.177-48.876,50.263-48.876,81.903v31.558H45.99c-5.518,0-9.992,4.475-9.992,9.993c0,5.519,4.475,9.992,9.992,9.992 h205.02c5.518,0,9.992-4.474,9.992-9.992C261.002,281.489,256.527,277.015,251.01,277.015z M83.657,245.456 c0-33.425,25.085-55.269,40.038-65.314c9.583-6.441,15.304-18.269,15.304-31.642s-5.721-25.2-15.305-31.642 c-14.952-10.046-40.037-31.89-40.037-65.315V19.985h129.686l-0.002,31.558c0,33.424-25.086,55.269-40.041,65.317 c-9.581,6.441-15.301,18.269-15.301,31.64s5.72,25.198,15.303,31.642c14.953,10.047,40.039,31.892,40.041,65.314v31.558h-3.312 c-8.215-30.879-50.138-64.441-55.377-68.537c-3.616-2.828-8.694-2.826-12.309,0c-5.239,4.095-47.163,37.658-55.378,68.537h-3.311 V245.456z M189.033,277.015h-81.067c6.584-15.391,25.383-34.873,40.534-47.76C163.652,242.142,182.45,261.624,189.033,277.015z"></path> <path d="M148.497,191.014c2.628,0,5.206-1.069,7.064-2.928c1.868-1.858,2.928-4.437,2.928-7.064s-1.06-5.206-2.928-7.065 c-1.858-1.857-4.436-2.927-7.064-2.927c-2.628,0-5.206,1.069-7.064,2.927c-1.859,1.859-2.928,4.438-2.928,7.065 s1.068,5.206,2.928,7.064C143.291,189.944,145.869,191.014,148.497,191.014z"></path> <path d="M148.5,138.019c5.519,0,9.992-4.474,9.992-9.992v-17.664c0-5.518-4.474-9.993-9.992-9.993s-9.992,4.475-9.992,9.993v17.664 C138.508,133.545,142.981,138.019,148.5,138.019z"></path> </g> </g></svg>
                            <div>
                                <h2 class="timer count-title count-number text-red-800 underline">{{ $doid }}</h2>
                                <p class="count-text font-bold text-lg">Đợi duyệt</p>
                            </div>
                        </a>
                    </div>
                
                    <div class="counter col_fourth w-1/3">
                        <a href="tuchoi" class="flex justify-center items-center">
                            <svg width="40px" height="60px" class="mr-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#ff9d2e;}.cls-2{fill:#db0000;}</style> </defs> <g data-name="6. Box Denied" id="_6._Box_Denied"> <path class="cls-1" d="M10,1h6a0,0,0,0,1,0,0V6.13a.87.87,0,0,1-.87.87H10.87A.87.87,0,0,1,10,6.13V1A0,0,0,0,1,10,1Z"></path> <path class="cls-2" d="M11,26H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H23a3,3,0,0,1,3,3v8a1,1,0,0,1-2,0V3a1,1,0,0,0-1-1H3A1,1,0,0,0,2,3V23a1,1,0,0,0,1,1h8a1,1,0,0,1,0,2Z"></path> <path class="cls-2" d="M7,22H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path> <path class="cls-2" d="M23,32a9,9,0,1,1,9-9A9,9,0,0,1,23,32Zm0-16a7,7,0,1,0,7,7A7,7,0,0,0,23,16Z"></path> <circle class="cls-1" cx="23" cy="23" r="5"></circle> <path class="cls-2" d="M24.41,23l1.3-1.29a1,1,0,0,0-1.42-1.42L23,21.59l-1.29-1.3a1,1,0,0,0-1.42,1.42L21.59,23l-1.3,1.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L23,24.41l1.29,1.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path> </g> </g></svg>
                            <div>
                                <h2 class="timer count-title count-number">{{ $tc }}</h2>
                                <p class="count-text font-bold text-lg">Từ chối</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @foreach ($posts as $post)
                <div class="post-item border flex px-5 py-4 mb-4">
                    <div class="post-img w-[150px] flex-shrink-0">
                        <img src="{{$post->images[0]->url}}" alt="">
                    </div>
                    <div class="post-info ml-5">
                        <a href="/post/{{ $post->id }}"><h1 class="post-title font-semibold mb-1 text-lg">{{Str::of($post->title)->words(20, '...')}}</h1></a>
                        <div class="post-tag text-sm flex mb-1 text-[#383838]">
                            <div class="flex mr-3">
                                <svg version="1.1" width="18px" class="mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#383838"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M150.932,218.624c10.84,3.192,23.58,4.988,37.258,4.996c18.245-0.023,34.79-3.17,47.434-8.668 c6.318-2.771,11.72-6.126,15.866-10.39c4.108-4.204,7.071-9.718,7.064-15.939c0.007-6.222-2.956-11.742-7.064-15.94 c-6.237-6.362-15.216-10.825-26.048-14.062c-10.833-3.192-23.572-4.995-37.251-4.995c-18.244,0.014-34.79,3.162-47.441,8.668 c-6.318,2.771-11.72,6.125-15.865,10.389c-4.108,4.198-7.072,9.718-7.065,15.94c-0.007,6.221,2.956,11.734,7.065,15.939 C131.12,210.917,140.106,215.387,150.932,218.624z M135.754,183.213c3.303-3.495,10.249-7.404,19.464-10.079 c9.207-2.72,20.64-4.382,32.972-4.374c16.434-0.023,31.288,2.97,41.374,7.404c5.04,2.187,8.846,4.744,11.048,7.05 c2.246,2.357,2.8,4.05,2.808,5.41c-0.008,1.352-0.562,3.052-2.808,5.409c-3.296,3.488-10.242,7.404-19.457,10.079 c-9.207,2.72-20.632,4.375-32.965,4.375c-16.441,0.014-31.294-2.971-41.381-7.404c-5.04-2.188-8.846-4.744-11.054-7.05 c-2.246-2.357-2.794-4.057-2.801-5.409C132.96,187.263,133.508,185.57,135.754,183.213z"></path> <path class="st0" d="M288.2,109.155c0.044,0.015,0.096,0.029,0.14,0.044l0.584,0.17L288.2,109.155z"></path> <path class="st0" d="M88.172,402.845c-0.059-0.014-0.119-0.037-0.178-0.059l-0.732-0.214L88.172,402.845z"></path> <path class="st0" d="M376.372,243.659v-55.037c0.008-8.114-1.929-15.888-5.224-22.922c-3.304-7.05-7.929-13.397-13.42-19.043 c-16.412-16.766-40.488-28.812-69.388-37.458l-0.155-0.044c-29.041-8.564-63.262-13.397-99.996-13.405 c-48.993,0.044-93.448,8.528-127.262,23.24l-0.015,0.008c-16.885,7.404-31.316,16.405-42.276,27.666 C13.154,152.303,8.528,158.65,5.225,165.7C1.929,172.735-0.008,180.509,0,188.623v134.756c-0.008,8.113,1.929,15.88,5.225,22.915 c3.303,7.05,7.929,13.397,13.412,19.043c16.413,16.766,40.472,28.812,69.358,37.45l0.192,0.059 c29.049,8.565,63.262,13.39,100.003,13.405H512v-172.59H376.372z M37.658,165.101c11.38-11.838,31.82-22.856,58.03-30.548 c26.204-7.737,58.119-12.326,92.502-12.319c45.838-0.022,87.308,8.18,116.659,21.031c14.676,6.399,26.27,13.966,33.866,21.836 c7.634,7.929,11.166,15.739,11.174,23.521c-0.008,7.773-3.54,15.592-11.174,23.521c-11.38,11.83-31.819,22.848-58.03,30.541 c-26.204,7.744-58.112,12.326-92.496,12.326c-45.845,0.015-87.314-8.187-116.666-21.031c-14.676-6.399-26.27-13.966-33.866-21.836 c-7.634-7.929-11.166-15.748-11.174-23.521C26.492,180.841,30.024,173.03,37.658,165.101z M349.888,222.341v32.669h-58.23 c6.746-2.202,13.256-4.552,19.249-7.168c15.954-6.983,29.145-15.348,38.684-25.176L349.888,222.341z M485.516,389.766h-45.402 v-66.854h-15.134v66.854h-33.416v-36.209h-15.134v36.209h-33.423v-66.854h-15.134v66.854h-33.423v-36.209h-15.134v36.209h-33.415 v-66.854h-15.134v66.854h-33.415v-36.209h-15.134v36.076c-11.491-0.177-22.657-0.857-33.423-2.01v-64.711h-15.134v62.76 c-23.772-3.621-45.054-9.459-62.138-16.937c-14.676-6.399-26.27-13.966-33.866-21.836c-7.634-7.93-11.166-15.748-11.174-23.521 V222.341l0.296,0.325c14.314,14.706,36.8,26.277,64.621,34.532c27.83,8.217,61.053,12.939,96.788,12.946h297.326V389.766z"></path> </g> </g></svg>
                                {{ $post->dientich }} m²
                            </div>
                            @foreach($post->services as $service)
                                <div class="flex mr-3">
                                    {!! $service->icon !!}
                                    {{ $service->name }}
                                </div>
                            @endforeach            
                        </div>
                        <div class="post-price mb-3 font-semibold text-[#c90927]">{{ number_format($post->giaphong) }} vnd/tháng</div>
                        <div class="post-description text-gray-500 mb-3 leading-tight">{{ Str::of($post->description)->words(25, '...') }}</div>
                        <div class="post-address text-sm flex text-[#383838]">
                            <svg viewBox="0 0 1024 1024" fill="#383838" width="20px" class="mr-1" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 1012.8c-253.6 0-511.2-54.4-511.2-158.4 0-92.8 198.4-131.2 283.2-143.2h3.2c12 0 22.4 8.8 24 20.8 0.8 6.4-0.8 12.8-4.8 17.6-4 4.8-9.6 8.8-16 9.6-176.8 25.6-242.4 72-242.4 96 0 44.8 180.8 110.4 463.2 110.4s463.2-65.6 463.2-110.4c0-24-66.4-70.4-244.8-96-6.4-0.8-12-4-16-9.6-4-4.8-5.6-11.2-4.8-17.6 1.6-12 12-20.8 24-20.8h3.2c85.6 12 285.6 50.4 285.6 143.2 0.8 103.2-256 158.4-509.6 158.4z m-16.8-169.6c-12-11.2-288.8-272.8-288.8-529.6 0-168 136.8-304.8 304.8-304.8S816 145.6 816 313.6c0 249.6-276.8 517.6-288.8 528.8l-16 16-16-15.2zM512 56.8c-141.6 0-256.8 115.2-256.8 256.8 0 200.8 196 416 256.8 477.6 61.6-63.2 257.6-282.4 257.6-477.6C768.8 172.8 653.6 56.8 512 56.8z m0 392.8c-80 0-144.8-64.8-144.8-144.8S432 160 512 160c80 0 144.8 64.8 144.8 144.8 0 80-64.8 144.8-144.8 144.8zM512 208c-53.6 0-96.8 43.2-96.8 96.8S458.4 401.6 512 401.6c53.6 0 96.8-43.2 96.8-96.8S564.8 208 512 208z" fill=""></path></g></svg>
                            {{ $post->xa->name }}, {{ $post->huyen->name }}
                        </div>     
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</div>
<style>
    .user-box svg {
        transition: 0.25s;
    }
    .user-box a:hover svg {
        fill: #ffffff;
    }
    .wrapper {   position: relative;}
    .counter { background-color: #ffffff; border-radius: 5px;}
    .count-title { font-size: 40px; font-weight: normal; text-align: center; }
    .count-text { margin-bottom: 0; text-align: center; }
    .fa-2x { margin: 0 auto; float: none; display: table; color: #4ad1e5; }
</style>
<script>
   
</script>
@endsection