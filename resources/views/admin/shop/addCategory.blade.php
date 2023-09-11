<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Shop Category</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewCategories')}}">View All</a>
        </div>
        
        <br>

        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingCategory')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">
                    <div class="mb-4 col-md-6">
                        <label for="sName">Shop Category Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="cName" id="cName" placeholder="Enter a shop category name" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="sImg">Upload Image/Icon/Logo: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="cImg" id="cImg" required>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>