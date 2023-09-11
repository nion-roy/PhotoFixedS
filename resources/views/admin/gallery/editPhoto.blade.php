<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Photo</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewServices')}}">View All</a>
        </div>

        <br>
        
        <div class="card shadow p-3 m-0">
            <form action="{{url('/update-photo/'.$thephoto->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2">
                    <input class="form-control" type="text" name="pID" id="pID" value="{{$thephoto->id}}" readonly hidden required>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column">
                            <div class="m-0 p-0 card form-control">
                                <img src="{{asset($thephoto->photoDir)}}" alt="" style="border-radius: 5px;" height="auto">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="pService">Service:</label>
                            <select class="form-control" name="pService" id="pService" required>
                                <option value="{{$thephoto->servName}}" selected hidden>{{$thephoto->servName}}</option>
                                @foreach ($services as $service)
                                    <option value="{{$service->name}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pPhoto">Change Photo:</label>
                            <input class="form-control" type="file" accept="image/png, image/jpeg" name="pPhoto" id="pPhoto">
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