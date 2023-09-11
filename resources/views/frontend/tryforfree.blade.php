<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One-time Free Services</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="border-radius: 5px;">
        <div class="carousel-inner" style="border-radius: 5px;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('asset/slider/home/slider1.jpg')}}" height="550px" style="border-radius: 5px;">
            </div>

            @foreach ($freeServices as $freeServ)
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset($freeServ->sliderDir1)}}" height="550px" style="border-radius: 5px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset($freeServ->sliderDir2)}}" height="550px" style="border-radius: 5px;">
            </div>
            @endforeach

            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="m-4 text-center">
        <h1 class="display-6">Free Services</h1>

        <div class="row d-flex align-items-center justify-content-center">
            @foreach ($freeServices as $fs)
                <a class="card shadow btn btn-light m-3 p-3 col-md-2 d-flex flex-column align-items-center justify-content-center" href="{{url('/view-free-service/'.$fs->id)}}">
                    <img class="m-2" src="{{asset($fs->imgDir)}}" height="auto" width="100%" style="border-radius: 5px;">
                    <p class="m-1 lead">{{$fs->name}}</p>
                </a>
            @endforeach
            
        </div>
    </div>

    <hr>

    <div class="m-4 text-center">
        <h1 class="display-6">Other Services</h1>

        <div class="row d-flex align-items-center justify-content-center">
            @foreach ($otherServices as $serv)
                <a class="card shadow btn btn-light m-3 p-3 col-md-2 d-flex flex-column align-items-center justify-content-center" href="{{url('/service/'.$serv->id)}}">
                    <img class="m-2" src="{{asset($serv->imgDir)}}" height="auto" width="100%" style="border-radius: 5px;">
                    <p class="m-1 lead">{{$serv->name}}</p>
                </a>
            @endforeach
            
        </div>
    </div>

    <hr>

    <div class="p-4">
        <p class="display-6 text-center">Gallery</p>
        <div class="my-4 d-flex align-items-center justify-content-center row" id="gall">
            @foreach ($limitedExamples as $lx)
                <div class="modal" id="modal{{$lx->id}}">
                    <div class="modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title">{{$lx->service}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-flex align-items-center justify-content-center">
                                <div class="mb-2 row d-flex align-items-center justify-content-center">
                                    <img class="mb-1 rounded col-md-6" src="{{asset($lx->before)}}" height="auto" width="auto">
                                    <img class="mb-1 rounded col-md-6" src="{{asset($lx->after)}}" height="auto" width="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="m-1 border-0 rounded bg-transparent col-md-3" data-toggle="modal" data-target="#modal{{$lx->id}}">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img class="m-0 p-0 border-0 rounded" src="{{asset($lx->after)}}" height="100%" width="100%">
                    </div>
                </button>
            @endforeach
        </div>

        <div class="mt-3 text-center">
            <a class="btn btn-outline-primary" href="{{route('examples')}}">More Samples</a>
            <a class="btn btn-outline-primary" href="{{route('pricing')}}">View Packages</a>
        </div>
    </div>

    <hr>

    @if ($reviewCount > 0)
        <div class="p-4">
            <p class="display-6 text-center">Reviews</p>
            <div class="row d-flex align-items-center justify-content-center">
                @foreach ($reviews as $rev)
                    <div class="col-md-4 p-3">
                        <div class="border rounded p-3">
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <img class="" src="{{asset($rev->reviewerImg)}}" alt="{{$rev->reviewBy}}" height="50px" width="50px">
                                <p class="m-2 pl-2" style="font-size: 22px;">{{$rev->reviewBy}}</p>
                            </div>
                            <p class="lead m-1">{{$rev->service}}</p>
                            <p class="border-top m-2 text-justify" style="font-size: 18px;">{{$rev->review}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    #carouselExampleControls{
        margin: 100px 25px 25px 25px;
    }
    @media(max-width:770px){
        #carouselExampleControls img{
            height: 250px;
            margin: 0;
            padding: 0;
        }
        #carouselExampleControls{
        margin: 10px 20px 20px 20px;
    }
    }
</style>
</html>