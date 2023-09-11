<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="topDiv">
        <div class="d-flex align-items-center justify-content-center row">
            <div class="col-md-6 row card shadow m-2 p-3">
                <div class="col-md-12">
                    <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" type="text" name="id" id="id" value="{{$getUser->id}}" required hidden readonly>

                        <div class="m-1">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$getUser->name}}" required>
                        </div>
                        <div class="m-1">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{$getUser->email}}" required>
                        </div>

                        <div class="mt-2 d-flex align-items-center justify-content-end">
                            <a class="btn btn-secondary m-1" href="{{url()->previous()}}">Back</a>
                            <button type="submit" class="btn btn-primary m-1">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    #topDiv{
        margin: 120px 25px 25px 25px;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
    }
</style>
</html>