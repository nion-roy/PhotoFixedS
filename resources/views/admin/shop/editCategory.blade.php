<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
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

        <div class="m-0 card shadow">
            <form action="{{url('/update-category/'.$cate->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-3">
                    <input class="form-control" type="text" name="cID" id="cID" value="{{$cate->id}}" readonly hidden required>

                    <div class="mb-4 col-md-12">
                        <label for="cName">Category Name:</label>
                        <input class="card shadow form-control" type="text" name="cName" id="cName" value="{{$cate->name}}" placeholder="Enter a service name" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="cImg">Previous Image/Icon/Logo:</label>
                        <div class="m-0 p-0 card border-0 form-control">
                            <img src="{{asset($cate->imgDir)}}" alt="" style="border-radius: 5px;">
                        </div>
                    </div>

                    <div class="mb-4 col-md-4">
                        <div class="mb-1">
                            <label for="cImg">Change Image/Icon/Logo:</label>
                            <input class="card shadow form-control" type="file" accept=".png, .jpeg, .jpg" name="cImg" id="cImg">
                        </div>
                    </div>
                </div>

                <div class="text-center pb-3">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Update">
                    <br>
                    <a class="mt-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>