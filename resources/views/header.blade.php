<div class="header w-full mx-auto py-4 px-3">
    <div class="header-inner container mx-auto flex items-center">
        <nav class="navigation">
            <ul class="nav-main flex items-center">
                <a href="/" class="mb-2 flex"><svg width="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#69d100"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.5315 11.5857L20.75 10.9605V21.25H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4143 22.4142 22.75 22 22.75H2.00003C1.58581 22.75 1.25003 22.4143 1.25003 22C1.25003 21.5858 1.58581 21.25 2.00003 21.25H3.25003V10.9605L2.46855 11.5857C2.1451 11.8445 1.67313 11.792 1.41438 11.4686C1.15562 11.1451 1.20806 10.6731 1.53151 10.4144L9.65742 3.91366C11.027 2.818 12.9731 2.818 14.3426 3.91366L22.4685 10.4144C22.792 10.6731 22.8444 11.1451 22.5857 11.4686C22.3269 11.792 21.855 11.8445 21.5315 11.5857ZM12 6.75004C10.4812 6.75004 9.25003 7.98126 9.25003 9.50004C9.25003 11.0188 10.4812 12.25 12 12.25C13.5188 12.25 14.75 11.0188 14.75 9.50004C14.75 7.98126 13.5188 6.75004 12 6.75004ZM13.7459 13.3116C13.2871 13.25 12.7143 13.25 12.0494 13.25H11.9507C11.2858 13.25 10.7129 13.25 10.2542 13.3116C9.76255 13.3777 9.29128 13.5268 8.90904 13.9091C8.52679 14.2913 8.37773 14.7626 8.31163 15.2542C8.24996 15.7129 8.24999 16.2858 8.25003 16.9507L8.25003 21.25H9.75003H14.25H15.75L15.75 16.9507L15.75 16.8271C15.7498 16.2146 15.7462 15.6843 15.6884 15.2542C15.6223 14.7626 15.4733 14.2913 15.091 13.9091C14.7088 13.5268 14.2375 13.3777 13.7459 13.3116Z" fill="#297a3d"></path> <g opacity="0.5"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 9.5C10.75 8.80964 11.3096 8.25 12 8.25C12.6904 8.25 13.25 8.80964 13.25 9.5C13.25 10.1904 12.6904 10.75 12 10.75C11.3096 10.75 10.75 10.1904 10.75 9.5Z" fill="#297a3d"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 9.5C10.75 8.80964 11.3096 8.25 12 8.25C12.6904 8.25 13.25 8.80964 13.25 9.5C13.25 10.1904 12.6904 10.75 12 10.75C11.3096 10.75 10.75 10.1904 10.75 9.5Z" fill="#297a3d"></path> </g> <path opacity="0.5" d="M12.0494 13.25C12.7142 13.25 13.2871 13.2499 13.7458 13.3116C14.2375 13.3777 14.7087 13.5268 15.091 13.909C15.4732 14.2913 15.6223 14.7625 15.6884 15.2542C15.7462 15.6842 15.7498 16.2146 15.75 16.827L15.75 21.25H8.25L8.25 16.9506C8.24997 16.2858 8.24993 15.7129 8.31161 15.2542C8.37771 14.7625 8.52677 14.2913 8.90901 13.909C9.29126 13.5268 9.76252 13.3777 10.2542 13.3116C10.7129 13.2499 11.2858 13.25 11.9506 13.25H12.0494Z" fill="#297a3d"></path> <path opacity="0.5" d="M16 3H18.5C18.7761 3 19 3.22386 19 3.5L19 7.63955L15.5 4.83955V3.5C15.5 3.22386 15.7239 3 16 3Z" fill="#297a3d"></path> </g></svg></a>
                <li>
                    <a href="/" class="font-semibold px-6 py-4">Trang chủ</a>
                </li>
                <li>
                    <a href="/post/create" class="font-semibold px-6 py-4">Tạo bài đăng</a>
                </li>
                <li>
                    <a href="/post/list" class="font-semibold px-6 py-4">Danh sách bài đăng</a>
                </li>
            </ul>
        </nav>
        <div class="ml-auto">
            @if(Auth::check())
            <div id="user" class="relative">
                <button id="trigger" class="trigger btn-type-2 inline-block px-4 py-2 text-white mb-1 hover:text-white font-medium text-sm">
                    <span class="user flex items-center">
                        @if (Auth::user()->avatar != '')
                            <img src="{{ Auth::user()->avatar }}" alt="" class="w-[30px] h-[30px] rounded-full object-cover mr-2 pointer-events-none">
                        @else
                            <img src="/template/imgs/avatar-default.png" alt="" class="w-[30px] h-[30px] rounded-full object-cover mr-2 pointer-events-none">
                        @endif
                        <div class="flex flex-col">{{ Auth::user()->name }}
                            <span style="font-size: 13px" class="flex">
                                <svg class="m-0" style="width: auto" fill="#ffffff" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M21,14.571C21,16.465,18.538,18,15.5,18S10,16.465,10,14.571s2.462-3.428,5.5-3.428S21,12.678,21,14.571Zm-5.5,5.286c-3.038,0-5.5-1.535-5.5-3.428v2.142C10,20.465,12.462,22,15.5,22S21,20.465,21,18.571V16.429C21,18.322,18.538,19.857,15.5,19.857Zm-7-11c3.038,0,5.5-1.535,5.5-3.428S11.538,2,8.5,2,3,3.535,3,5.429,5.462,8.857,8.5,8.857Zm-.125,4a5.58,5.58,0,0,1,2.181-2.389,8.44,8.44,0,0,1-2.056.25C5.462,10.714,3,9.179,3,7.286V9.428C3,11.3,5.4,12.811,8.375,12.853ZM8.5,22a8.83,8.83,0,0,0,1.079-.067,4.917,4.917,0,0,1-1.37-2.085C5.307,19.753,3,18.261,3,16.429v2.142C3,20.465,5.462,22,8.5,22ZM8,17.556V15.4c-2.8-.16-5-1.613-5-3.4v2.143C3,15.931,5.2,17.4,8,17.556Z"></path></g></svg>
                                {{ number_format(Auth::user()->sodu) }} đ</span></div>
                    </span>
                </button>
                <ul id="menu" class="trigger-dropdown closed absolute top-full min-w-full w-max px-4 py-2 text-sm right-0 rounded bg-white" style="box-shadow: 0 0 2px 1px rgba(0,0,0,0.2)">
                    <li>
                      <a href="/profile" class="py-1 flex items-center"><i class="fa-regular fa-address-card mr-2"></i> Thông tin cá nhân</a>
                    </li>
                    <li >
                      <a href="/logout" class="py-1 flex items-center"><i class="fa-solid fa-right-from-bracket mr-2"></i> Đăng xuất</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="btn-group">
                <a href="/register" class="inline-block px-4 py-2 font-medium text-sm">Đăng ký</a>
                <a href="/login" class="btn-type-2 inline-block px-4 py-2 text-white hover:text-white font-medium text-sm">Đăng nhập</a>
            </div>
        @endif
        </div>
    </div>
</div>