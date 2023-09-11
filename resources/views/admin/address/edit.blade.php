<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Address</title>
</head>

<body>
	<div>
		@include('layouts.admin_heading')
	</div>

	<div class="mt-5 content">
		<div>
			<a class="btn btn-dark" href="{{route('viewAddress')}}">View All</a>
		</div>

		<br>

		<div class="m-0 shadow">
			@if(Session::has('sess'))
			<p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
			@endif
		</div>

		<div class="m-0 card shadow">
			<form action="{{route('updateAddress', $contacts->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row p-3">

					<div class="mb-4 col-md-12">
						<label for="number">Contact: <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="number" id="number" placeholder="Enter a contact number" value="{{ $contacts->number }}" required>
					</div>

					<div class="mb-4 col-md-12">
						<label for="email">Email: <span class="text-danger">*</span></label>
						<input class="form-control" type="email" name="email" id="email" placeholder="Enter a email" value="{{ $contacts->email }}" required>
					</div>

					<div class="mb-4 col-md-12">
						<label for="address">Address: <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="address" id="address" placeholder="Enter a address" value="{{ $contacts->address }}" required>
					</div>

					<div class="mb-4 col-md-12">
						<label for="iframe">Map: <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="iframe" id="iframe" placeholder="Enter a location with iframe" value="{{ $contacts->iframe }}" required>
					</div>



				</div>

				<div class="text-center pb-4">
					<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</body>

</html>