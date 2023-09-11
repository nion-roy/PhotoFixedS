<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$service->name}}</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="m-5 text-center">
        <div class="col-md-12 pb-2">
            <h1 class="display-4">{{$service->name}}</h1>
            <p style="font-size: 18px;">{{$service->description}}</p>
            <p style="font-size: 22px;">We are providing <b>{{$service->name}}</b> only in <b>USD {{$service->price}}</b> per photo.</p>
            @if ($service->discount > 0)
                <p style="font-size: 22px;">Also you'll get <b>USD {{$service->discount}}</b> discount for this service.</p>
            @endif
        </div>

        <hr>

        @if ($theUser == NULL)
            <div class="alert alert-dark">
                <p class="text-black">You need to be logged in to get this service.</p>
                <a class="btn btn-dark" href="{{route('login')}}">Login</a>
            </div>
        @elseif($service->freeOne == "Yes" AND $theUser->freeUsed == NULL)
            <div class="col-md-12 mt-2 pb-2 d-flex flex-column align-items-center justify-content-center">
                @if (Session::has('sess'))
                    <p class="alert alert-info" style="font-weight:bold;">{{ Session::get('sess') }}</p>
                @endif

                <div class="card shadow col-md-6 p-3">
                    <h2 class="display-6">Upload Your Photo</h2>
                    <p>Upload your image here. Write your preferences in the text-area. And submit the photo. Our photo editors will edit your photo according to your preferences. And we'll let you view the edited photo.</p>

                    <form action="{{route('uploadPhoto')}}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        
                        @error('title')
                          <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                        @enderror
                        
                        <input class="form-control" type="text" name="uid" id="uid" value="{{$theUser->id}}" readonly hidden required>
                        <input class="form-control" type="text" name="uemail" id="uemail" value="{{$theUser->email}}" readonly hidden required>
                        <input class="form-control" type="text" name="userviceID" id="userviceID" value="{{$service->id}}" readonly hidden required>
                        <input class="form-control" type="text" name="uservice" id="uservice" value="{{$service->name}}" readonly hidden required>
                        <input class="form-control" type="text" name="freeOrder" id="freeOrder" value="Yes" readonly hidden required>

                        <div class="col-md-12 mt-2">
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title (Max 20 characters)" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <input class="form-control" type="file" name="pic" id="pic" accept="image/png, image/jpeg" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <textarea class="form-control" name="pref" id="pref" cols="30" rows="5" placeholder="Enter your preferenceas" required></textarea>
                        </div>
                        
                        <div class="col-md-12 mt-2">
                            <button class="btn btn-primary mt-2 mb-1" type="submit" name="upload" id="upload">Upload</button>
                        </div>
                    </form>
                </div>

                <p class="m-4 alert alert-secondary text-black col-md-6" style="font-size: 18px;">You can have only one singe trial for the service.</p>
            </div>
        @else
            <div class="col-md-12 mt-2 pb-2 d-flex flex-column align-items-center justify-content-center">
                <p class="m-4 alert alert-info text-black col-md-6">Sorry, your free service has been expired.</p>
                <p></p>
            </div>
        @endif
    </div>
</body>
</html>