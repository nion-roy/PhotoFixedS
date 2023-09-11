<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Example</title>
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
        
        <div class="card shadow p-3 m-0">
            <form action="{{route('updateExample')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2">
                    <input class="form-control" type="text" name="xID" id="xID" value="{{$xmpl->id}}" readonly hidden required>

                    <div class="mb-4 col-md-12">
                        <label for="xService">Service:</label>
                        <select class="form-control" name="xService" id="xService" required>
                            <option value="{{$xmpl->service}}" selected hidden>{{$xmpl->service}}</option>
                            @foreach ($services as $service)
                                <option value="{{$service->name}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="">Previous Image Before Edit:</label>
                        <img src="{{asset($xmpl->before)}}" alt="" height="auto" width="100%">
                        <input class="mt-2 form-control" type="file" name="xBefore" id="xBefore">
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="">Previous Image After Edit:</label>
                        <img src="{{asset($xmpl->after)}}" alt="" height="auto" width="100%">
                        <input class="mt-2 form-control" type="file" name="xAfter" id="xAfter">
                    </div>

                    <div class="mb-2 col-md-12">
                        <label for="xDes">Description:</label>
                        <textarea class="form-control" name="xDes" id="xDes" rows="5">{{$xmpl->description}}</textarea>
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
<style>
    img{
        border-radius: 5px;
    }
</style>
</html>