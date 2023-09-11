<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $blog->title }}</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="topDiv" class="d-block">
        <div class="d-flex align-items-center justify-content-center row">
            <div class="col-md-12 text-center">
                    <h1>{{ $blog->title }}</h1>
            </div>

            <div class="col-md-12 row mt-2">
                <div class="col-md-12 row d-flex align-items-center justify-content-center flex-row">
                    <div class="col-md-12 p-5 d-flex align-items-center justify-content-center">
                        <img class="rounded img-fluid" src="{{ asset($blog->banner) }}" alt="">
                    </div>
                    <div class="col-md-12 text-center" id="main_content">
                        <p class="text-center lead">{{ $blog->short_description }}</p>
                    </div>
                    <div class="col-md-12 text-center p-2 d-block mb-4" id="main_content">
                        <img class="rounded img-fluid" src="{{ asset($blog->img_1) }}" height="auto" width="1000px" alt="Image">
                        <p class="text-justify mt-4">{{ $blog->des_1 }}</p>
                    </div>
                    <div class="col-md-12 text-center p-2 d-block" id="main_content">
                        @if ($blog->img_2!='')
                        <img class="rounded img-fluid" src="{{ asset($blog->img_2) }}" height="auto" width="1000px" alt="Image">
                        @endif
                        <p class="text-justify mt-4">{{ $blog->des_2 }}</p>
                    </div>
                    <div class="col-md-12 text-center p-2 d-block" id="main_content">
                        @if ($blog->img_3!='')
                        <img class="rounded img-fluid" src="{{ asset($blog->img_3) }}" height="auto" width="1000px" alt="Image">   
                        @endif
                        <p class="text-justify mt-4">{{ $blog->des_3 }}</p>
                    </div>
                </div>
                <div class="text-center">
                    <a class="m-1 btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>

        </div>
    </div>

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    #topDiv{
        margin: 120px 25px 25px 25px;
    }
    #main_content p{
        padding: 0px 300px;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
        #main_content p{
            padding: 0px 20px;
        }
    }
</style>
</html>