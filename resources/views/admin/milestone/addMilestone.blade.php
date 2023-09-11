<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Milestone</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewMilestone')}}">View List</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingMilestone')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row p-3">
                    <div class="col-md-6 mb-2">
                        <label for="heading">Heading: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="heading" id="heading" placeholder="Enter a heading" required>
                    </div>

                    @php
                        $currentDate = new DateTime(); 
                        $year = $currentDate->format("Y");
                    @endphp

                    <div class="col-md-6 mb-2">
                        <label for="year">Year: <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="year" id="year" min="1900" max="2099" step="1" value="{{$year;}}" required>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="year">Details: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="details" id="details" rows="5" placeholder="Enter details" required></textarea>
                    </div>
                </div>

                <div class="text-center pb-4">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>