<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Example</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewExamples')}}">View All</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingExample')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-4">
                    <div class="col-md-6 row">
                        <div class="col-md-12 mb-2">
                            <label for="">Service: <span class="text-danger">*</span></label>
                            <select class="form-control" name="service" id="service" required>
                                <option value="" selected hidden>Choose service</option>
                                @foreach ($services as $service)
                                    <option value="{{$service->name}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="imgBefore">Image Before Edit: <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="imgBefore" id="imgBefore" required>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="imgAfter">Image After Edit: <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" accept="image/png, image/jpeg" name="imgAfter" id="imgAfter" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="des">Description: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="des" id="des" rows="8"></textarea>
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
