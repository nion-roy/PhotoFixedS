<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Favicon</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>
    

    <div class="mt-5 content">
        <div class="card shadow p-3 m-0">
            <form action="{{route('updateFavicon')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2 d-flex align-items-center justify-content-center">
                    <div class="mb-4 col-md-4 text-center">
                        <img src="{{asset('favicon.ico')}}" alt="favicon" height="auto" width="50%">
                        <input class="mt-2 form-control" type="file" name="favi" id="favi">
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