<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blog</title>
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

        <div class="m-0 card shadow p-2">
            <form action="{{route('updateBlog')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{($blog->id)}}" name="bID" id="bID" hidden readonly required>
                <div class="row p-3">
                    <div class="border rounded p-2 mb-2"> 
                        <div class="col-md-12 mb-3">
                            <label for="title">Title: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title" value="{{ $blog->title }}" required>
                        </div>
                    </div>
                    <div class="border rounded p-2 mb-2">    
                        <div class="col-md-12 mb-3">
                            <label for="short_des">Short Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="short_des" id="short_des" rows="3" placeholder="Enter short description" required>{{ $blog->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-2 d-flex flex-column">
                            <label for="sImg">Thumbnail:</label>
                            <div class="m-0 p-0 card form-control">
                                <img class="rounded" src="{{asset($blog->thumbnail)}}" alt="" height="300px" width="100%">
                            </div>
                        </div>
                        <label for="thumbnail">Change Thumbnail: </label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="thumbnail" id="thumbnail">
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-2 d-flex flex-column">
                            <label for="sImg">Banner Image:</label>
                            <div class="m-0 p-0 card form-control">
                                <img src="{{asset($blog->banner)}}" alt="" class="rounded" height="300px" width="100%">
                            </div>
                        </div>
                        <label for="banner">Change Banner Image: </label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="banner" id="banner">
                    </div>

                    <div class="col-md-12 row">
                        <div class="col-md-6 mb-3">
                            <label for="des_1">Description 1 : <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des_1" id="des_1" rows="12" placeholder="Enter Description 1" required>{{ $blog->des_1 }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-2 d-flex flex-column">
                                <label for="sImg">Image 1:</label>
                                <div class="m-0 p-0 card form-control">
                                    <img src="{{asset($blog->img_1)}}" alt="" class="rounded" height="300px" >
                                </div>
                            </div>
                            <label for="img_1">Change Image 1 : </label>
                            <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_1" id="img_1">
                        </div>
                    </div>
                    
                    <div class="col-md-12 row">
                        <div class="col-md-6 mb-3">
                            <label for="des_2">Description 2 : </label>
                            <textarea class="form-control" name="des_2" id="des_2" rows="12" placeholder="Enter Description 2">{{ $blog->des_2 }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-2 d-flex flex-column">
                                <label for="sImg">Image 2:</label>
                                <div class="m-0 p-0 card form-control">
                                    <img src="{{asset($blog->img_2)}}" alt="" style="border-radius: 5px;" height="300px">
                                </div>
                            </div>
                            <label for="img_2">Change Image 2 : </label>
                            <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_2" id="img_2" >
                        </div>
                    </div>    

                    <div class="col-md-12 row">
                        <div class="col-md-6 mb-3">
                            <label for="des_3">Description 3 : </label>
                            <textarea class="form-control" name="des_3" id="des_3" rows="12" placeholder="Enter Description 3">{{ $blog->des_3 }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-2 d-flex flex-column">
                                <label for="sImg">Image 3:</label>
                                <div class="m-0 p-0 card form-control">
                                    <img src="{{asset($blog->img_3)}}" alt="" style="border-radius: 5px;" height="300px">
                                </div>
                            </div>
                            <label for="img_3">Change Image 3 : </label>
                            <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="img_3" id="img_3" >
                        </div>
                    </div>    
                </div>

                <div class="text-center pb-4">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>