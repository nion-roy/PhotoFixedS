<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package Pricing</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="text-center p-2" id="packageDiv">
        <p class="display-6">Packages</p>
        <p class="m-0 p-0 lead">This page includes the package list for the services we provide. If you were looking for a good photo editing service for a cheap price, you've found the perfect place. The prices for photo eding services from PhotoFixedS are reasonable and stable since 2023. Do not forget to mention all instructions, additional changes to the photographs which should be fixed. You are welcome to choose any packages from our list.</p>

        <div class="mt-3">
            @if (Session::has('sess'))
                <p class="alert alert-info" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-2 row d-flex align-items-center justify-content-center">
            <div class="col-md-12 row d-flex align-items-center justify-content-center">
                @foreach ($packs as $pack)
                    <div class="m-2 p-3 card shadow text-center col-md-2">
                        <div>
                            <h3>{{$pack->name}}</h3>
                            <h5>USD {{$pack->price}} per photo</h5>
                        </div>
                        <div class="border text-left p-3" style="border-radius: 5px;">
                            @php
                                $serv = json_decode($pack->services);
                            @endphp
            
                            <div>
                                <h6>Service Applied:</h6>
                                @foreach($serv as $s)
                                    <p class="m-0 p-0 fst-italic"><i class="bi bi-check text-success"></i> {{$s}}</p>
                                @endforeach
                            </div>
                            
                            <br>
            
                            <div>
                                <h6>Not Included:</h6>
                                @foreach ($services as $service)
                                    @if (in_array($service->name, $serv))
                                    @else
                                        <p class="m-0 p-0 fst-italic"><span class="text-danger" aria-hidden="true">&times;</span> {{$service->name}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <a class="mt-3 btn btn-outline-primary" href="{{url('/view-the-package/'.$pack->id)}}">Get Now</a>
                    </div>
                @endforeach
            </div>
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

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    #packageDiv{
        margin: 120px 25px 25px 25px;
    }

    @media(max-width:770px){
        #packageDiv{
            margin: 10px 20px 20px 20px;
            padding: 0 0 0 0;
        }
    }
</style>
</html>