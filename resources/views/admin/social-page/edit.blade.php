<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add Social Page</title>
</head>

<body>
	<div>
		@include('layouts.admin_heading')
	</div>

	<div class="mt-5 content">
		<div>
			<a class="btn btn-dark" href="{{route('viewSocialPage')}}">View All</a>
		</div>

		<br>

		<div class="m-0 shadow">
			@if(Session::has('sess'))
			<p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
			@endif
		</div>

		<div class="m-0 card shadow">
			<form action="{{route('updateSocialPage', $pageGroup->id)}}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="row p-3">

					<div class="mb-4 col-md-12">
						<label for="name">Social Name: <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="name" id="name" placeholder="Enter a social name" value="{{ $pageGroup->name }}" required>
					</div>

					<div class="mb-4 col-md-12">
						<label for="page">Social Link: <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="page" id="page" placeholder="Enter a social page" value="{{ $pageGroup->page }}" required>
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