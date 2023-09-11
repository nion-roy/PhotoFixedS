<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>



	<script>
		$(document).ready(function() {
			$('.ratings').each(function() {
				var ratingValue = parseFloat($(this).data('rating'));
				$(this).rateYo({
					rating: ratingValue,
					starWidth: "25px",
					onSet: function(rating, rateYoInstance) {
						$('#ratingInput').val(rating); // Update the hidden input with the selected rating
					},
				});
			});
		});
	</script>

	<div>
		@if($isAdmin->is_admin == 1)
		<script>
			console.log("Admin logged in.");
		</script>
		@else
		@php
		header("Location: " . URL::to('/home'), true, 302);
		exit();
		@endphp
		@endif
	</div>

	<div id="app">
		<div id="header" class="bg-white shadow" style="position: fixed; width: 100%; z-index: 100; backdrop-filter: blur(10px); padding-left: 20px; padding-right: 20px;">
			<nav class="navbar navbar-expand-lg navbar-light m-0 p-1">
				<a class="navbar-brand" href="{{route('adminPanel')}}"><img src="{{asset('favicon.ico')}}" alt="logo" height="50px" width="50px"></a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{route('home')}}">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('adminPanel')}}">Admin Panels</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('changeFavicon')}}">Favicon Settings</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewServices')}}">View All Services</a>
								<a class="nav-link" href="{{route('addService')}}">Add New Services</a>
								<a class="nav-link" href="{{route('viewExamples')}}">View All Examples</a>
								<a class="nav-link" href="{{route('addExample')}}">Add New Example</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Packages Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewPackages')}}">View All Packages</a>
								<a class="nav-link" href="{{route('addPackage')}}">Add New package</a>
								<a class="nav-link" href="{{route('packReq')}}">User Requests</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewCategories')}}">View All Categories</a>
								<a class="nav-link" href="{{route('addCategory')}}">Add New Category</a>
								<a class="nav-link" href="{{route('viewItems')}}">View All Items</a>
								<a class="nav-link" href="{{route('addItem')}}">Add New Items</a>
								<a class="nav-link" href="{{route('viewItemReq')}}">Item Requests</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Orders Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewPendingOrders')}}">Pending Orders</a>
								<a class="nav-link" href="{{route('viewCompletedOrders')}}">Completed Orders</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('ViewBlogs')}}">View All Blogs</a>
								<a class="nav-link" href="{{route('AddBlogs')}}">Add New Blog</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewAboutText')}}">View About Text</a>
								<a class="nav-link" href="{{route('viewMilestone')}}">View Milestone List</a>
								<a class="nav-link" href="{{route('addMilestone')}}">Add New Milestone</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Other Settings</a>

							<div class="dropdown-menu pl-2 pr-2" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="{{route('viewReviews')}}">Review Settings</a>
								<a class="nav-link" href="{{route('galleryAllPhotos')}}">Gallery Settings</a>
								<a class="nav-link" href="{{route('videoSettings')}}">Video Settings</a>
								<a class="nav-link" href="{{route('viewSliders')}}">Slider Settings</a>
							</div>
						</li>

						<li class="nav-item dropdown" id="lgout">
							<a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
						</li>
					</ul>
				</div>

				<div class="collapse navbar-collapse" id="navbarSupportedContentUser" style="display: flex; justify-content: flex-end;">
					<div class="form-inline my-2 my-lg-0">
						<div class="collapse navbar-collapse" id="navbarSupportedContentUser">
							<ul class="navbar-nav mr-auto">
								@guest
								@if (Route::has('login'))
								{{ Redirect::to('/home') }}
								@endif

								@if (Route::has('register'))
								{{ Redirect::to('/home') }}
								@endif
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
								@endguest
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>

		<br>

		<div>
			<div class="shadow sidebar pt-5 bg-white" id="leftbar">
				<br>
				<li class="nav-link">
					<a class="pl-4" href="{{route('home')}}" class="nav-link align-middle px-0">Home</a>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="{{route('adminPanel')}}" class="nav-link align-middle px-0">Admin Panel</a>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="{{route('changeFavicon')}}" class="nav-link align-middle px-0">Favicon Settings</a>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Services Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu1" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewServices')}}" class="nav-link px-2">View All Services</a>
						</li>
						<li>
							<a href="{{route('addService')}}" class="nav-link px-2">Add New Service</a>
						</li>
						<li>
							<a href="{{route('viewExamples')}}" class="nav-link px-2">View All Examples</a>
						</li>
						<li>
							<a href="{{route('addExample')}}" class="nav-link px-2">Add New Example</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Packages Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu4" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewPackages')}}" class="nav-link px-2">View All Packages</a>
						</li>
						<li>
							<a href="{{route('addPackage')}}" class="nav-link px-2">Add New Package</a>
						</li>
						<li>
							<a href="{{route('packReq')}}" class="nav-link px-2">User Requests</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Shop Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu2" data-bs-parent="#menu">
						<li>
							<a href="{{route('viewCategories')}}" class="nav-link px-2">View All Category</a>
						</li>
						<li>
							<a href="{{route('addCategory')}}" class="nav-link px-2">Add New Category</a>
						</li>
						<li class="w-100">
							<a href="{{route('viewItems')}}" class="nav-link px-2">View All Items</a>
						</li>
						<li class="w-100">
							<a href="{{route('addItem')}}" class="nav-link px-2">Add New Items</a>
						</li>
						<li class="w-100">
							<a href="{{route('viewItemReq')}}" class="nav-link px-2">Item Requests</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Orders Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu3" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewPendingOrders')}}" class="nav-link px-2">Pending Orders</a>
						</li>
						<li>
							<a href="{{route('viewCompletedOrders')}}" class="nav-link px-2">Completed Orders</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu9" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Blogs Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu9" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('ViewBlogs')}}" class="nav-link px-2">View All Blogs</a>
						</li>
						<li>
							<a href="{{route('AddBlogs')}}" class="nav-link px-2">Add New Blog</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu7" data-bs-toggle="collapse" class="nav-link px-0 align-middle">About Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu7" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewAboutText')}}" class="nav-link px-2">View About Text</a>
						</li>
						<li class="w-100">
							<a href="{{route('viewMilestone')}}" class="nav-link px-2">View Milestone List</a>
						</li>
						<li>
							<a href="{{route('addMilestone')}}" class="nav-link px-2">Add New Milestone</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu10" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Other Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu10" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewReviews')}}" class="nav-link px-2">Review Settings</a>
						</li>

						<li class="w-100">
							<a href="{{route('galleryAllPhotos')}}" class="nav-link px-2">Gallery Settings</a>
						</li>

						<li class="w-100">
							<a href="{{route('videoSettings')}}" class="nav-link px-2">Video Settings</a>
						</li>

						<li class="w-100">
							<a href="{{route('viewSliders')}}" class="nav-link px-2">Slider Settings</a>
						</li>

						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="#submenu8" data-bs-toggle="collapse" class="nav-link px-0 align-middle">Social Settings</a>
					<ul class="collapse nav flex-column ms-1 pl-4" id="submenu8" data-bs-parent="#menu">
						<li class="w-100">
							<a href="{{route('viewSocial')}}" class="nav-link px-2">Social Links Settings</a>
						</li>
						<li class="w-100">
							<a href="{{ route('viewSocialPage') }}" class="nav-link px-2">Social Group or Page</a>
						</li>
						<br>
					</ul>
				</li>

				<li class="nav-link">
					<a class="pl-4" href="{{route('viewAddress')}}" class="nav-link px-0 align-middle">Contact Settings</a>
				</li>


			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
            $('#myTable').DataTable();
        });
	</script>
</body>
<style>
	* {
		box-sizing: border-box;
		transition: ease-in-out 300ms;
		margin: 0;
		padding: 0;
		/* word-break: break-all; */
	}

	body {
		margin: 0;
	}

	.sidebar {
		margin: 0;
		padding: 0;
		width: 220px;
		background-color: rgb(248, 248, 250);
		position: fixed;
		height: 100%;
		overflow: auto;
	}

	.sidebar a {
		width: 100%;
		display: block;
		color: black;
		padding: 8px 5px 8px 10px;
		text-decoration: none;
	}

	/* .sidebar a.active {
        background-color: #04AA6D;
        color: white;
    } */

	.content {
		margin: 20px 30px 0 250px;
		padding: 25px 0 25px 0;
		height: max-content;
	}

	#navbarSupportedContent {
		visibility: hidden;
	}

	#lgout {
		display: none;
		visibility: hidden;
	}

	.btn-primary {
		background-color: #07a6ca;
		border: 1px solid #07a6ca;
		color: white;
	}

	.btn-primary:hover {
		background-color: #0b7891;
		border: 1px solid #0b7891;
		color: white;
	}

	.btn-outline-primary {
		background-color: white;
		border: 1px solid #07a6ca;
		color: #07a6ca;
	}

	.btn-outline-primary:hover {
		background-color: #0b7891;
		border: 1px solid #0b7891;
		color: white;
	}


	@media screen and (max-width: 700px) {
		.sidebar {
			width: 100%;
			height: auto;
			position: relative;
		}

		.sidebar a {
			float: left;
		}

		.content {
			margin: 10px;
			padding: 30px 20px 30px 20px;
			height: max-content;
		}

		#navbarSupportedContent {
			visibility: visible;
		}

		#leftbar {
			display: none;
			visibility: hidden;
		}

		#lgout {
			display: block;
			visibility: visible;
		}
	}

	@media screen and (max-width: 400px) {
		.sidebar a {
			text-align: center;
			float: none;
		}


	}
</style>

</html>