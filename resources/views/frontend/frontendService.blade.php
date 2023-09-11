<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$service->name}}</title>
</head>

<body>
    <div>
        @include('layouts.app')
    </div>

    {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="border-radius: 5px;">
        <div class="carousel-inner" style="border-radius: 5px;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset($service->sliderDir1)}}" alt="First slide" height="550px" style="border-radius: 5px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset($service->sliderDir2)}}" alt="Second slide" height="550px" style="border-radius: 5px;">
            </div>

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
    </div> --}}

    <div class="d-flex align-items-center justify-content-center" id="topDiv" style="border-radius: 5px;">
        <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
            <div class="carousel-inner" style="border-radius: 10px;">
                <div class="carousel-item active">
                    <img class="d-block" src="{{asset($service->sliderDir1)}}" alt="{{$service->id}}" height="100%" width="100%">
                </div>

                <div class="carousel-item">
                    <img class="d-block" src="{{asset($service->sliderDir2)}}" alt="{{$service->id}}" height="100%" width="100%">
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    {{-- <div class="d-flex align-items-center justify-content-center  bg-light bg-gradiant" id="topDiv" style="border-radius: 5px;">
        <div class="wrapper">
            <!-- start slider -->
            <div class="promotions-carousel row">
                <div class="columns large-4">
                    <div class="row">
                        <div class="columns small-3">
                            <img class="img-fluid shadow" src="{{asset($service->sliderDir1)}}" alt="{{$service->id}}">
                        </div>
                    </div>
                </div>
                <!-- end slide 1 -->

                <div class="columns large-4">
                    <div class="row">
                        <div class="columns small-3">
                            <img class="img-fluid shadow" src="{{asset($service->sliderDir1)}}" alt="{{$service->id}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end slider -->
    </div> --}}



    <div class="row text-center m-5">
        <div class="col-md-12 pb-2">
            <h1 class="display-4">{{$service->name}}</h1>
            <p style="font-size: 18px;">{{$service->description}}</p>
            <p style="font-size: 22px;">We are providing <b>{{$service->name}}</b> only in <b>USD {{$service->price}}</b> per photo.</p>
            @if ($service->discount > 0)
            <p style="font-size: 22px;">Also you'll get <b>USD {{$service->discount}}</b> discount for this service.</p>
            @endif
        </div>

        @if ($theUser == NULL)
        <div class="alert alert-dark">
            <p class="text-black">You need to be logged in to get this service.</p>
            <a class="btn btn-dark" href="{{route('login')}}">Login</a>
        </div>
        @elseif($service->freeOne == "Yes" AND $theUser->freeUsed == NULL)
        <div class="col-md-12 w-100 pb-2 alert alert-primary text-black" style="text-shadow: 1px 1px 4px white;">
            <p class="display-6 fw-bold">Great Offer!</p>
            <p class="fst-italic" style="font-size: 22px;">We are offering this one-time free service for you.</p>
            <p class="fw-bold fst-italic" style="font-size: 28px;">Grab now!</p>
        </div>

        <div class="col-md-12 mt-2 pb-2 d-flex flex-column align-items-center justify-content-center">
            @if (Session::has('sess'))
            <p class="alert alert-info" style="font-weight:bold;">{{ Session::get('sess') }}</p>
            @endif

            <div class="card shadow col-md-6 p-3">
                <h2 class="display-6">Upload Your Photo</h2>
                <p>Upload your image here. Write your preferences in the text-area. And submit the photo. Our photo editors will edit your photo according to your preferences. And we'll let you view the edited photo.</p>

                <form action="{{route('uploadPhoto')}}" method="POST" enctype="multipart/form-data" class="row">
                    @csrf

                    @error('title')
                    <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                    @enderror

                    <input class="form-control" type="text" name="uid" id="uid" value="{{$theUser->id}}" readonly hidden required>
                    <input class="form-control" type="text" name="uemail" id="uemail" value="{{$theUser->email}}" readonly hidden required>
                    <input class="form-control" type="text" name="userviceID" id="userviceID" value="{{$service->id}}" readonly hidden required>
                    <input class="form-control" type="text" name="uservice" id="uservice" value="{{$service->name}}" readonly hidden required>
                    <input class="form-control" type="text" name="freeOrder" id="freeOrder" value="Yes" readonly hidden required>

                    <div class="col-md-12 mt-2">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title (Max 20 characters)" required>
                    </div>

                    <div class="col-md-12 mt-2">
                        <input class="form-control" type="file" name="pic" id="pic" accept="..png, .jpeg, .jpg, .zip, .rar, .7z, .gz, .tar" required>
                    </div>

                    <div class="col-md-12 mt-2">
                        <textarea class="form-control" name="pref" id="pref" cols="30" rows="5" placeholder="Enter your preferenceas" required></textarea>
                    </div>

                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary mt-2 mb-1" type="submit" name="upload" id="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <div class="col-md-12 mt-2 pb-2 d-flex flex-column align-items-center justify-content-center">
            @if (Session::has('sess'))
            <p class="alert alert-info" style="font-weight:bold;">{{ Session::get('sess') }}</p>
            @endif

            <div class="card shadow col-md-6 p-3">
                <h2 class="display-6">Upload Your Photo</h2>
                <p>Upload your image here. Write your preferences in the text-area. And submit the photo. Our photo editors will edit your photo according to your preferences. And we'll let you view the edited photo.</p>

                <form action="{{route('uploadPhoto')}}" method="POST" enctype="multipart/form-data" class="row">
                    @csrf

                    <input class="form-control" type="text" name="uid" id="uid" value="{{$theUser->id}}" readonly hidden required>
                    <input class="form-control" type="text" name="uemail" id="uemail" value="{{$theUser->email}}" readonly hidden required>
                    <input class="form-control" type="text" name="userviceID" id="userviceID" value="{{$service->id}}" readonly hidden required>
                    <input class="form-control" type="text" name="uservice" id="uservice" value="{{$service->name}}" readonly hidden required>
                    <input class="form-control" type="text" name="freeOrder" id="freeOrder" value="No" readonly hidden required>

                    <div class="col-md-12 mt-2">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title (Max 50 characters)" required>
                    </div>

                    <div class="col-md-12 mt-2">
                        <input class="form-control" type="file" name="pic" id="pic" accept=".png, .jpeg, .jpg, .zip, .rar, .7z, .gz, .tar" required>
                    </div>

                    <div class="col-md-12 mt-2">
                        <textarea class="form-control" name="pref" id="pref" cols="30" rows="5" placeholder="Enter your preferenceas" required></textarea>
                    </div>

                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary mt-2 mb-1" type="submit" name="upload" id="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
    {{-- d-flex flex-column align-items-center justify-content-center --}}
    @if ($exampleCount > 0)
    <hr>
    <div class="m-4 d-flex align-items-center justify-content-center row">
        <p class="display-6 text-center">Examples</p>

        <div class="m-2 d-flex flex-row flex-wrap align-otems-center justify-content-center row">
            @foreach ($examples as $exm)
            <div class="col-md-4 p-2">
                <div class="border rounded p-3 d-flex flex-column align-items-center justify-content-center">
                    <p class="h4">{{$exm->service}}</p>
                    <p class="lead text-justify">{{$exm->description}}</p>
                    <img-comparison-slider>
                        <img slot="first" src="{{asset($exm->before)}}" />
                        <img slot="second" src="{{asset($exm->after)}}" />
                    </img-comparison-slider>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <hr>

    <div class="d-flex flex-column align-items-center justify-content-center p-4">
        <div>
            <h2 class="display-6 mb-2">How Does It Work?</h2>
        </div>

        <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
            <div class="d-flex flex-column align-items-center justify-content-center m-4">
                <img class="py-3" src="{{asset('asset/icon/upload-photos.svg')}}" height="120px" width="120px">
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center m-4">
                <img class="py-3" src="{{asset('asset/icon/write-instructions.svg')}}" height="120px" width="120px">
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center m-4">
                <img class="py-3" src="{{asset('asset/icon/get-your-photos.svg')}}" height="120px" width="120px">
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center m-4">
                <img class="py-3" src="{{asset('asset/icon/submit-for-revision.svg')}}" height="120px" width="120px">
            </div>
        </div>

        <div class="m-2">
            <p>It’s very easy to start using our online photo editing service! You can do it in just 4 simple steps:</p>
            <ol>
                <li>Create account and upload your photo.</li>
                <li>Write detailed instructions, attach sample photo.</li>
                <li>Get your edited photo back.</li>
                <li>Accept the work or request changes (if necessary).</li>
            </ol>
            <p>Be sure that our professional photography retouchers will follow your photo editing guidelines to create a digital masterpiece for your clients.</p>
        </div>

        <div class="">
            <a class="mr-2 btn btn-primary" href="{{route('photoUpload')}}">Upload Photo</a>
            <a class="mr-2 btn btn-outline-primary" href="{{route('tryFree')}}">Try for Free</a>
        </div>
    </div>

    @if ($galleryCount > 0)
    <hr>
    <div class="m-4 d-flex align-items-center justify-content-center row">
        <p class="display-6 text-center">Gallery</p>
        @foreach ($photos as $pic)
        <div class="modal" id="modal{{$pic->id}}">
            <div class="modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{$pic->servName}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="mb-2 row d-flex align-items-center justify-content-center">
                            <img class="mb-1 rounded col-md-6" src="{{asset($pic->photoDir)}}" height="auto" width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="exmBtn" class="bg-light bg-gradiant m-1 card col-md-3" data-toggle="modal" data-target="#modal{{$pic->id}}">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img class="m-2 p-0 border-0 rounded" src="{{asset($pic->photoDir)}}" height="100%" width="100%">
                <p class="pt-2 lead fw-bold">{{$pic->servName}}</p>
            </div>
        </button>
        @endforeach
    </div>
    @endif

    @if ($allpackCount > 0)
    <hr>
    <div class="m-4 d-flex align-items-center justify-content-center row" id="packDiv">
        <p class="display-6 text-center">Packages</p>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-12 row d-flex align-items-start justify-content-center">
                @foreach ($allPacks as $pack)
                <div class="bg-light bg-gradiant border rounded m-2 p-3 text-left col-md-2">
                    <div class="text-left">
                        <h3>{{$pack->name}}</h3>
                        <h5>USD {{$pack->price}} per photo</h5>
                    </div>
                    <div class="pt-3" style="border-radius: 5px;">
                        <div>
                            <h6>Service Applied:</h6>
                            @php
                            $serv = json_decode($pack->services);
                            @endphp
                            @foreach($serv as $s)
                            <p class="m-0 p-0 fst-italic"><i class="bi bi-check text-success"></i> {{$s}}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-right w-100">
                        <a class="mt-3 btn btn-outline-dark w-100" href="{{url('/view-the-package/'.$pack->id)}}">View</a>
                    </div>
                </div>
                @endforeach

                <div class="text-center">
                    <a class="btn btn-outline-primary m-3" href="{{route('pricing')}}">All Pakcages</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($reviewCount > 0)
    <hr>
    <div class="p-4">
        <p class="display-6 text-center">Reviews</p>
        <div class="row d-flex align-items-center justify-content-center">
            @foreach ($reviews as $rev)
            <div class="col-md-4 p-3">
                <div class="border rounded p-3 bg-light bg-gradiant">
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
    #topDiv {
        margin: 120px 25px 25px 25px;
    }

    #carouselExampleControls {
        margin: 100px 25px 25px 25px;
    }

    #exmBtn:hover {
        box-shadow: 0 0 8px gray;
    }

    img-comparison-slider img {
        width: 500px;
        height: auto;
        border-radius: 5px;
    }

    @media(max-width:770px) {
        #topDiv {
            margin: 10px 20px 20px 20px;
        }

        #carouselExampleControls {
            margin: 0 20px 20px 20px;
            padding: 0 0 0 0;
        }

        img-comparison-slider img {
            width: 100%;
            height: auto;
        }
    }
</style>

</html>