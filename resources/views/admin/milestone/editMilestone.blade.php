<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Milestone</title>
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
        
        <div class="card shadow p-3 m-0">
            <form action="{{route('updateMilestone')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2">
                    <input class="form-control" type="text" name="mID" id="mID" value="{{$mlst->id}}" readonly hidden required>

                    <div class="row p-3">
                        <div class="col-md-6">
                            <label for="mheading">Heading: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mheading" id="mheading" value="{{$mlst->heading}}" placeholder="Enter a heading" required>
                        </div>
    
                        @php
                            $currentDate = new DateTime(); 
                            $year = $currentDate->format("Y");
                        @endphp
    
                        <div class="col-md-6">
                            <label for="myear">Year: <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="myear" id="myear" min="1900" max="2099" step="1" value="{{$mlst->year}}" required>
                        </div>
    
                        <div class="col-md-12">
                            <label for="mdetails">Details: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="mdetails" id="mdetails" rows="5" placeholder="Enter details" required>{{$mlst->details}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center p-2">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Update">
                    <br>
                    <a class="mt-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>