<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Social Page</title>
</head>

<body>
	<div>
		@include('layouts.admin_heading')
	</div>

	<div class="mt-5 content">
		<div>
			<a class="btn btn-primary" href="{{ route('addSocialPage') }}">Add New</a>
		</div>

		<br>

		<div class="m-0">
			@if(Session::has('sess'))
			<p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
			<br>
			@endif
		</div>

		<div class="m-0 p-3 card shadow">

			<table class="table text-center" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Page Link</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pages as $key => $sv)
					<tr>
						<td class="text-break"><b><i>{{ $key + 1 }}</i></b></td>
						<td class="text-break">{{$sv->name}}</td>
						<td class="text-break">{{$sv->page}}</td>
						<td>
							<a class="m-1 btn btn-secondary" href="{{url('/edit-social-page/'.$sv->id)}}">Edit</a>
							<a class="m-1 btn btn-danger" href="{{url('/delete-social-page/'.$sv->id)}}" onclick="return confirm('Delete the page link?')">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>

	<script>
		$(document).ready(function(){
            $('#myTable').DataTable();
        });
	</script>
</body>

</html>