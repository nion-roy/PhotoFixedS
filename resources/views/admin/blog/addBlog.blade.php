<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('ViewBlogs')}}">View List</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('submitBlog')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row p-3">
                    <div class="col-md-12 mb-3">
                        <label for="title">Title: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="short_des">Short Description: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="short_des" id="short_des" rows="3" placeholder="Enter short description" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="thumbnail">Thumbnail: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="thumbnail" id="thumbnail" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="banner">Banner Image: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="banner" id="banner"  required>
                    </div>

                   
                    <div class="col-md-12 mb-3">
                        <label for="des_1">Description 1 : <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="des_1" id="des_1" rows="5" placeholder="Enter Description 1" required></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="img_1">Image 1 : <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_1" id="img_1"  required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="des_2">Description 2 : </label>
                        <textarea class="form-control" name="des_2" id="des_2" rows="5" placeholder="Enter Description 2"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="img_2">Image 2 : </label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_2" id="img_2" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="des_3">Description 3 : </label>
                        <textarea class="form-control" name="des_3" id="des_3" rows="5" placeholder="Enter Description 3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="img_3">Image 3 : </label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_3" id="img_3" >
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