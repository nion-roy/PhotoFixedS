<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>PhotoFixedS</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	{{-- Image Comparison Slider --}}
	<link rel="stylesheet" href="https://unpkg.com/img-comparison-slider@7/dist/styles.css" />

	<style>
		* {
			box-sizing: border-box;
			transition: ease-in-out 300ms;
			/* word-break: break-all; */
		}

		#serv a:hover {
			box-shadow: 0 0 2px gray;
		}

		#header {
			position: fixed;
			z-index: 100;
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

		@media(max-width:770px) {
			#header {
				position: static;
			}
		}
	</style>

	@stack('css')
</head>

<body>
	<div id="app">
		<div id="header" class="shadow w-100" style="background-color: white; backdrop-filter: blur(10px); padding-top: 8px; padding-Bottom: 8px;padding-left: 20px; padding-right: 20px;">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="p-0">
					<a class="navbar-brand p-0 mr-5" href="{{route('home')}}">
						<img src="{{asset('favicon.ico')}}" alt="logo" height="60px" width="auto">
					</a>
				</div>

				<button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent" style="font-size: 20px;">

					<ul class="navbar-nav mx-auto text-center">
						<li class="nav-item mx-4">
							<a class="nav-link" href="{{route('home')}}">Home</a>
						</li>

						<li class="nav-item dropdown mx-3">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>

							<div class="dropdown-menu text-center p-3" aria-labelledby="navbarDropdown">
								<div class="p-2 row d-flex flex-row text-center align-items-center justidy-content-center" style="min-width: 50vw;" id="serv">
									@foreach ($services as $s)
									<div class="col-md-3">
										<a class="p-2 dropdown-item d-flex flex-column align-items-center text-break" href="{{url('/service/'.$s->id)}}" style="border-radius: 5px;"><img src="{{asset($s->imgDir)}}" alt="" height="100px" width="auto" style="border-radius: 5px;">{{$s->name}}</a>
									</div>
									@endforeach
								</div>
							</div>
						</li>

						<li class="nav-item mx-4">
							<a class="nav-link" href="{{route('pricing')}}">Packages</a>
						</li>

						<li class="nav-item dropdown mx-3">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="row p-2" style="width: 40vw;">
									@foreach ($categories as $ct)
									<div class="col-md-4">
										<div class="p-2 d-flex flex-column">
											<div class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset($ct->imgDir)}}" alt="" height="35px" width="35px">
												<h5 class="pl-1">{{$ct->name}}</h5>
											</div>
											<div class="d-flex flex-column">
												@foreach ($items as $itm)
												@if ($itm->category == $ct->name)
												<a class="mb-1 mt-1" href="{{url('/get-the-item/'.$itm->id)}}">{{$itm->name}}</a>
												@endif
												@endforeach
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</li>

						<li class="nav-item mx-3">
							<a class="nav-link" href="{{route('examples')}}">Examples</a>
						</li>

						<li class="nav-item mx-3">
							<a class="nav-link" href="{{route('blogs')}}">Blogs</a>
						</li>

						<li class="nav-item mx-3">
							<a class="nav-link" href="{{route('contact')}}">Contact</a>
							{{-- <a class="nav-link" href="{{route('contact')}}">Contact</a> --}}
						</li>

					</ul>

					<div class="form-inline my-2 my-lg-0">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="mr-1 mb-1 btn btn-primary" href="{{route('photoUpload')}}" style="font-size: 20px;">Upload Photo</a>
								</li>

								<li class="nav-item">
									<a class="mr-1 mb-1 btn btn-outline-primary" href="{{route('tryFree')}}" style="font-size: 20px;">Try for Free</a>
								</li>

								@guest
								@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								@endif

								@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
								@endif
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
										@if(Auth::user()->is_admin == 1)
										<a class="dropdown-item" href="{{route('adminPanel')}}">Admin Panel</a>
										@endif

										<a class="dropdown-item" href="{{url('/user-profile/'.Auth::user()->id)}}">My Profile</a>

										<a class="dropdown-item" href="{{url('/my-completed-orders/'.Auth::user()->id)}}">My Orders</a>

										<a class="dropdown-item" href="{{url('/my-item-requests/'.Auth::user()->id)}}">My Items</a>

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

		<main class="py-1">
			@yield('content')
		</main>

	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
	<script defer src="https://unpkg.com/img-comparison-slider@7/dist/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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


	<script>
		// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
document.getElementById("header").style.paddingTop = "2px";
document.getElementById("header").style.paddingBottom = "2px";
document.getElementById("header").style.paddingLeft = "10px";
document.getElementById("header").style.paddingRight = "10px";
} else {
document.getElementById("header").style.paddingTop = "8px";
document.getElementById("header").style.paddingBottom = "8px";
document.getElementById("header").style.paddingLeft = "15px";
document.getElementById("header").style.paddingRight = "15px";
}
}
	</script>


	<script>
		$(document).ready(function(){
            $('#myTable').DataTable();
        });
	</script>

	<script>
		$(document).ready(function() {
  $(".promotions-carousel").slick({
    slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 639,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
});
	</script>

	<script>
		$(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 3,
	dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  pauseOnFocus: false,
  pauseOnHover: false,
  pauseOnDotsHover: false,
  });
});
	</script>


</body>

</html>