<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/adminlibrary/css/style.css">
	<link rel="stylesheet" href="/template/css/admin_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		.collapse{
			visibility: visible !important;
		}
	</style>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="p-4 pt-5">
			<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(/adminlibrary/images/logo.jpg);"></a>
		<ul class="list-unstyled components mb-5">
			<li class="active">
			<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý người dùng</a>
			<ul class="collapse list-unstyled @if($active == 'qlnd') show @endif" id="homeSubmenu">
				<li><a href="/admin/user">Danh sách</a></li>
				<li><a href="/admin/banned_user">Danh sách bị khóa</a></li>
			</ul>
			</li>
			<li>
				<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý bài đăng</a>
				<ul class="collapse list-unstyled @if($active == 'qlbd') show @endif" id="homeSubmenu1">
					<li><a href="/admin/post?trangthai=1">Danh sách đã duyệt</a></li>
					<li><a href="/admin/post?trangthai=0">Danh sách chưa duyệt</a></li>
					<li><a href="/admin/post?trangthai=2">Danh sách từ chối</a></li>
				</ul>
			</li>
			<li>
				<a href="#">About</a>
			</li>
		</ul>
		</div>
	</nav>

	<!-- Page Content  -->
	<div id="content" class="p-4 p-md-5">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">

		<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
		</button>
		<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars"></i>
		</button>
		<h5 class="font-semibold mb-0 ml-2">{{$title}}</h5>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Portfolio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/logout">Đăng xuất</a>
			</li>
			</ul>
		</div>
		</div>
	</nav>

	@yield('content')

	</div>
</div>
</body>
<script src="/adminlibrary/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="/adminlibrary/js/popper.js"></script>
<script src="/adminlibrary/js/bootstrap.min.js"></script>
<script src="/adminlibrary/js/main.js"></script>
</html>