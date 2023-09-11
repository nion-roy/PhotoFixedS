{{-- <div class="p-1 h-100 w-100 bg-dark bg-gradiant text-white">
	<div class="row m-5 p-5">
		<div class="p-4 d-flex flex-column col-md-4 row">
			<div class="col-md-12">
				<form action="" method="POST" enctype="multipart/form-data">
					@csrf
					<input class="m-1 form-control border-0 rounded w-60" type="name" name="name" id="name" placeholder="Your Name" style="background-color: rgba(240, 248, 255, 0.719);" required>
					<input class="m-1 form-control border-0 rounded w-60" type="email" name="email" id="email" placeholder="Your Email" style="background-color: rgba(240, 248, 255, 0.719);" required>
					<textarea class="m-1 form-control border-0 rounded w-60" name="msg" id="msg" cols="" rows="3" placeholder="Your Message" style="background-color: rgba(240, 248, 255, 0.719);" required></textarea>
					<input class="m-1 form-control btn btn-primary w-60" type="submit" name="send" id="send" value="Send">
				</form>
			</div>
		</div>

		<div class="p-4 d-flex flex-column col-md-4 text-center">
			<h4>Services</h4>
			<div class="text-center d-flex flex-column align-items-center justify-content-center">
				@php
				$x = 1;
				@endphp
				@foreach ($services as $service)
				@if ($x <= 5) <a class="text-secondary" href="{{url('/service/'.$service->id)}}" style="width: max-content;">{{$service->name}}</a>
					@endif
					@php
					$x = $x+1;
					@endphp
					@endforeach
			</div>
		</div>


		<div class="p-4 d-flex flex-column align-items-center justify-content-start col-md-4 text-center">
			<p class="text-white">71/A, Road-2, Banani, Dhaka, Bangladesh.</p>
			<a class="text-white mt-1 mb-1 d-flex flex-row" href="https://facebook.com/" target="_blank"><img src="{{asset('asset/icon/facebook-icon.svg')}}" alt="facebook" title="Facebook" height="30px" width="30px">
				<p class="ml-2">Facebook</p>
			</a>
			<a class="text-white mt-1 mb-1 d-flex flex-row" href="https://instagram.com/" target="_blank"><img src="{{asset('asset/icon/instagram-icon.svg')}}" alt="facebook" title="Facebook" height="30px" width="30px">
				<p class="ml-2">Instagram</p>
			</a>
		</div>
	</div>
</div> --}}

<style>
	a {
		text-decoration: none;
		color: gray;
	}
</style>


<div class="bg-dark bg-gradiant text-white p-5">

	<div class="row px-5">
		<div class="col-lg-4 col-md-6 col-12">

			<form action="" method="POST" enctype="multipart/form-data">
				@csrf
				<input class="m-1 form-control border-0 rounded w-60" type="name" name="name" id="name" placeholder="Your Name" style="background-color: rgba(240, 248, 255, 0.719);" required>
				<input class="m-1 form-control border-0 rounded w-60" type="email" name="email" id="email" placeholder="Your Email" style="background-color: rgba(240, 248, 255, 0.719);" required>
				<textarea class="m-1 form-control border-0 rounded w-60" name="msg" id="msg" cols="" rows="3" placeholder="Your Message" style="background-color: rgba(240, 248, 255, 0.719);" required></textarea>
				<input class="m-1 form-control btn btn-primary w-60" type="submit" name="send" id="send" value="Send">
			</form>

		</div>

		{{-- <div class="col-lg-4 col-md-6 col-12 social">
			<h4 class="mb-4">Social Links</h4>



		</div> --}}

		<div class="col-lg-4 col-md-6 col-12">
			<h4 class="mb-4">Company</h4>

			<ul class="navbar-nav">
				<li class="nav-item mb-2"><i class="fa-solid fa-location-dot me-2"></i> Address: {{ $contacts->address }}</li>
				<li class="nav-item mb-2"><i class="fa-solid fa-phone me-2"></i> Contact: {{ $contacts->number }}</li>
				<li class="nav-item"><i class="fa-solid fa-envelope me-2"></i> Email: {{ $contacts->email }}</li>
			</ul>
			<ul class="p-0 m-0 d-flex">
				@foreach ($socials as $social)
				<a class="nav-link " style="padding-right: 15px" href="{{ $social->link }}" target="_blank"><i class="{{ $social->icon }}"></i> {{ $social->name }}</a>
				@endforeach
			</ul>
		</div>


		<div class="col-lg-4 col-md-6 col-12">
			<h4 class="mb-4">Social Page</h4>

			<iframe src="{{ $socialsPage->page }}" frameborder="0"></iframe>

		</div>

	</div>


</div>

<style>
	.social i {
		font-size: 28px;
	}
</style>