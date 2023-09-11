<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Package</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewPackages')}}">View All</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingPackage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">
                    <div class="mb-4 col-md-6">
                        <label for="packName">Package Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="packName" id="packName" placeholder="Enter a package name" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="packPrice">Price Range: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="packPrice" id="packPrice" placeholder="Enter price range for the package (i.e., USD 500-800)" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="pServices">Include Services: <span class="text-danger">*</span></label>
                        @foreach ($services as $serv)
                            <div class="ml-5">
                                <input value="{{$serv->name}}" type="checkbox" name="pServices[]">
                                <label for="{{$serv->name}}">{{$serv->name}}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="packDes">Description: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="packDes" id="packDes" rows="10" placeholder="Write description"></textarea>
                    </div>
                </div>

                <div class="text-center pb-4">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>