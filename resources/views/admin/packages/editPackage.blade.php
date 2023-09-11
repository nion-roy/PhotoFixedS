<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Package</title>
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
        
        <div class="card shadow p-3 m-0">
            <form action="{{url('/update-package/'.$pack->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2">
                    <input class="form-control" type="text" name="pID" id="pID" value="{{$pack->id}}" readonly hidden required>

                    <div class="p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-2 col-md-6">
                            <label for="pName">Service Name:</label>
                            <input class="form-control" type="text" name="pName" id="pName" value="{{$pack->name}}" placeholder="Enter a package name" required>
                        </div>

                        <div class="mb-1 col-md-6">
                            <label for="pPrice">Price:</label>
                            <input class="form-control" type="text" name="pPrice" id="pPrice" value="{{$pack->price}}" placeholder="Enter price range for the package (i.e., USD 500-800)" required>
                        </div>
                    </div>

                    <div class="p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-1 col-md-6">
                            @php
                                $pServ = json_decode($pack->services);
                            @endphp

                            <label>Services:</label>
                            @foreach ($services as $service)
                            <div class="ml-5">
                                <input value="{{$service->name}}" type="checkbox" name="" {{in_array($service->name, $pServ)?'checked':''}}>
                                <label for="{{$service->name}}">{{$service->name}}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="mb-1 col-md-6">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="pDes" id="pDes" rows="10">{{$pack->description}}</textarea>
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