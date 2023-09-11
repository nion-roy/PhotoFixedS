<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
</head>

<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="topDiv" class="d-block">
        <div class="d-flex align-items-center justify-content-center row">
            <div class="col-md-12 text-center">
                <h1>BLOGS</h1>
            </div>

            @foreach ($blogs as $blog)
            <div class="col-md-12 row mt-2 border-top" id="blog_content">
                <div class="col-md-12 row d-flex align-items-center justify-content-center flex-row">
                    <div class="col-md-6">
                        <img class="rounded" src="{{ asset($blog->thumbnail) }}" alt="" width="100%" height="auto">
                    </div>
                    <div class="col-md-6 pl-2" id="btn_text">
                        <h2 class="pb-1">{{ $blog->title }}</h2>
                        <p class="text-justify">{{ $blog->short_description }}</p>
                        <a href="{{ url('/blog/'.$blog->id) }}" class="btn btn-info">View more</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-3">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
    <div>
        @include('layouts.footer')
    </div>
</body>
<style>
    #topDiv {
        margin: 120px 25px 25px 25px;
    }

    #blog_content {
        padding: 20px 120px 20px 120px;
    }

    #btn_text a {
        font-size: 15px;
        padding: 10px;
    }

    @media(max-width:770px) {
        #topDiv {
            margin: 10px 20px 20px 20px;
        }

        #btn_text {
            text-align: center;
        }

        #blog_content {
            padding: 10px 20px 10px 20px;
        }
    }
</style>

</html>