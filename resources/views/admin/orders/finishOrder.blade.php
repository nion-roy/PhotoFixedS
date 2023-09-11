<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finish Order</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{url('/view-order/'.$order->id)}}">Return</a>
        </div>

        <br>
        
        <div class="m-0 card shadow">
            <form action="{{route('submitOrder')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="prevorderid" id="prevorderid" value="{{$order->id}}" readonly hidden required>
                <input type="text" name="title" id="title" value="{{$order->title}}" readonly hidden required>
                <input type="text" name="service" id="service" value="{{$order->service}}" readonly hidden required>
                <input type="text" name="userPackID" id="userPackID" value="{{$order->userPackID}}" readonly hidden required>
                <input type="text" name="userPackName" id="userPackName" value="{{$order->userPackName}}" readonly hidden required>
                <input type="text" name="userid" id="userid" value="{{$order->userID}}" readonly hidden required>
                <input type="text" name="useremail" id="useremail" value="{{$order->userEmail}}" readonly hidden required>
                <input type="text" name="editorid" id="editorid" value="{{$isAdmin->id}}" readonly hidden required>
                <input type="text" name="editoremail" id="editoremail" value="{{$isAdmin->email}}" readonly hidden required>

                <div class="row p-3">
                    <div class="mb-2 col-md-6">
                        <p class="form-control"><b>Ordered ID: </b>{{$order->id}}</p>
                    </div>

                    <div class="mb-2 col-md-6">
                        <p class="form-control"><b>Title: </b>{{$order->title}}</p>
                    </div>

                    <div class="mb-2 col-md-6">
                        <p class="form-control"><b>Ordered Service: </b>{{$order->service}}</p>
                    </div>

                    <div class="mb-2 col-md-6">
                        <p class="form-control"><b>User Email: </b>{{$order->userEmail}}</p>
                    </div>

                    <div class="mb-2 col-md-12">
                        <label for="thePhoto"><b>Submit Photo: </b><span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg, .zip, .rar, .7z, .gz, .tar" name="thePhoto" id="thePhoto" required>
                    </div>
                </div>

                <div class="text-center pb-3">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>