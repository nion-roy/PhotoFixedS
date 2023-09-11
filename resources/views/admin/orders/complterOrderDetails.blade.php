<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details: {{$comOrder->id}}</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">        
        <div class="m-0 p-3 card shadow row">
            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Order ID: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->id}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Title: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->title}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Service: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->service}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Package: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->packName}} ({{$comOrder->packID}})</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Completion Date: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->completedDate}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">User Email: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->userEmail}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Editor Email: </p>
                <p class="col-md-10 pl-1 text-break">{{$comOrder->editorEmail}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Payment: </p>
                @if ($comOrder->payment > 0)
                    <p class="col-md-10 pl-1 text-break">{{$comOrder->payment}}</p>
                @else
                    <p class="col-md-10 pl-1 text-break">Pending</p>
                @endif
                
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Photo: </p>

                <div class="card border-0 col-md-10 pl-1">
                    <img src="{{asset($comOrder->editedImgDir)}}" alt="" style="border-radius: 5px; height: auto; max-width: 500px;">
                </div>
            </div>

            <div class="mt-3 pt-3 border-top col-md-12 text-center">
                <a class="m-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
            </div>
        </div>
    </div>
</body>
</html>