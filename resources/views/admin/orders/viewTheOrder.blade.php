<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order: {{$pOrd->userEmail}}</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewPendingOrders')}}">All Orders</a>
        </div>

        <br>
        
        <div class="m-0 p-3 card shadow row">
            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Order ID: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->id}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Title: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->title}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Ordered Service: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->service}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Free Order: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->freeOrder}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Ordering Date: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->orderDate}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">User Email: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->userEmail}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Transaction Code: </p>
                @if ($pOrd->paymentCode == NULL)
                    <p class="col-md-10 pl-1 text-break">Payment Pending</p>
                @else
                    <p class="col-md-10 pl-1 text-break">{{$pOrd->paymentCode}}</p>
                @endif
            </div>

            @if ($pOrd->paymentImg != NULL)
                <div class="m-0 p-0 col-md-12 d-flex flex-row">
                    <p class="col-md-2 fw-bold text-break">Transaction Image: </p>
                    <div class="card border-0 col-md-10 pl-1">
                        <img src="{{asset($pOrd->paymentImg)}}" alt="" style="border-radius: 5px; height: auto; max-width: 500px;">
                    </div>
                </div>
            @endif

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Package: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->userPackName}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Preferences: </p>
                <p class="col-md-10 pl-1 text-break">{{$pOrd->description}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Photo: </p>

                <div class="card border-0 col-md-10 pl-1">
                    <img src="{{asset($pOrd->orderImgDir)}}" alt="" style="border-radius: 5px; height: auto; max-width: 500px;">
                </div>
            </div>

            <div class="mt-3 pt-3 border-top col-md-12 text-right d-flex flex-row">
                <a class="m-1 btn btn-danger w-50" href="{{url('/cancel-order/'.$pOrd->id)}}" onclick = "return confirm('Delete the order?')">Delete</a>

                <a class="m-1 btn btn-primary w-50" href="{{url('/download-photo/'.$pOrd->id)}}">Download</a>

                <a class="m-1 btn btn-success w-50" href="{{url('/finish-order/'.$pOrd->id)}}">Finish</a>
            </div>
        </div>
    </div>
</body>
</html>