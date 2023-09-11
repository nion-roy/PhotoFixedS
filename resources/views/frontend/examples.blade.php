<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examples</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="text-center" id="topDiv">
        <p class="display-4">Before & After Comparison</p>
        @if ($exampleCount > 0)
            <div class="my-4 d-flex align-items-center justify-content-center row">
                @foreach ($examples as $exm)
                    @php
                        $x = 1;
                    @endphp

                    @foreach ($services as $service)
                        @if ($exm->service == $service->name && $x == 1)
                            <div class="modal" id="modal{{$exm->id}}">
                                <div class="modal-dialog-centered">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$service->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="mb-2 row d-flex align-items-center justify-content-center">
                                                <img class="mb-1 rounded col-md-6" src="{{asset($exm->before)}}" height="auto" width="auto">
                                                <img class="mb-1 rounded col-md-6" src="{{asset($exm->after)}}" height="auto" width="auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="m-1 btn btn-outline-dark col-md-3" data-toggle="modal" data-target="#modal{{$exm->id}}">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <img class="m-0 p-0 border-0 rounded" src="{{asset($exm->after)}}" height="100%" width="100%">
                                    <p class="pt-2 lead fw-bold">{{$exm->service}}</p>
                                </div>
                            </button>
                        
                            @php
                                $x = $x+1;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
            </div>
        @endif
    </div>

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    *{
        transition: ease-in-out 100ms;
    }
    #topDiv{
        margin: 120px 25px 25px 25px;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
    }
    img{
        pointer-events: none;
    }
</style>
</html>