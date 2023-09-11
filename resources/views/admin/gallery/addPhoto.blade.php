<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Photo</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('galleryAllPhotos')}}">All Photos</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('galleryAddingPhotos')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">
                    <div class="mb-4 col-md-6">
                        <label for="service">Service: <span class="text-danger">*</span></label>
                        <select class="form-control" name="service" id="service" required>
                            <option value="" selected none hidden>Select a service</option>
                            @foreach ($services as $serv)
                                <option value="{{$serv->name}}">{{$serv->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="photo">Photo: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="photo" id="photo" required>
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