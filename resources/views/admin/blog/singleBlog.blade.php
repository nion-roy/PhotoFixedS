<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: {{$blog->title}}</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('ViewBlogs')}}">All Blogs</a>
        </div>

        <br>
        
        <div class="m-0 p-3 card shadow row">

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Title: </p>
                <p class="col-md-10 pl-1 text-break">{{$blog->title}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Short Description: </p>
                <p class="col-md-10 pl-1 text-break">{{$blog->short_description}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Thumbnail: </p>
                <p class="col-md-10 pl-1 text-break"><img src="{{asset($blog->thumbnail)}}"></p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Banner: </p>
                <p class="col-md-10 pl-1 text-break"><img src="{{asset($blog->banner)}}" height="300px" width="auto" ></p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Description 1: </p>
                <p class="col-md-10 pl-1 text-break">{{$blog->des_1}}</p>
            </div>

            @if ($blog->img_1 != NULL)
                <div class="m-0 p-0 col-md-12 d-flex flex-row">
                    <p class="col-md-2 fw-bold text-break">Image 1: </p>
                    <p class="col-md-10 pl-1 text-break"><img src="{{asset($blog->img_1)}}" alt="" height="300px" width="auto"></p>
                </div>
            @endif

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Description 2: </p>
                <p class="col-md-10 pl-1 text-break">{{$blog->des_2}}</p>
            </div>

            @if ($blog->img_2 != NULL)
                <div class="m-0 p-0 col-md-12 d-flex flex-row">
                    <p class="col-md-2 fw-bold text-break">Image 2: </p>
                    <p class="col-md-10 pl-1 text-break"><img src="{{asset($blog->img_2)}}" alt="" height="300px" width="auto"></p>
                </div>
            @endif

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Description 3: </p>
                <p class="col-md-10 pl-1 text-break">{{$blog->des_3}}</p>
            </div>

            @if ($blog->img_2 != NULL)
                <div class="m-0 p-0 col-md-12 d-flex flex-row">
                    <p class="col-md-2 fw-bold text-break">Image 3: </p>
                    <p class="col-md-10 pl-1 text-break"><img src="{{asset($blog->img_3)}}" alt="" height="300px" width="auto"></p>
                </div>
            @endif

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Created At: </p>
                <p class="col-md-10 pl-1 text-break">{{optional($blog->created_at)->diffForHumans()}}</p>
            </div>

            <div class="mt-3 pt-3 col-md-3 text-right d-flex flex-row">
                <a class="m-1 btn btn-info w-50" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</body>
</html>