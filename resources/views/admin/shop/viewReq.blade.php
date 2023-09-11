<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Request Details</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewItemReq')}}">All Requests</a>
        </div>

        <br>
        
        <div class="m-0 p-3 card shadow row">
            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Request ID: </p>
                <p class="col-md-10 pl-1 text-break">{{$request->id}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">User: </p>
                <p class="col-md-10 pl-1 text-break">{{$request->userName}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Item: </p>
                <p class="col-md-10 pl-1 text-break">{{$request->itemName}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Date: </p>
                <p class="col-md-10 pl-1 text-break">{{$request->date}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Request Status: </p>
                @if ($request->status == "accepted")
                    <p class="col-md-10 pl-1 text-break">Accepted</p>
                @elseif ($request->status == "pending")
                    <p class="col-md-10 pl-1 text-break">Pending</p>
                @elseif ($request->status == "rejected")
                    <p class="col-md-10 pl-1 text-break">Rejected</p>
                @endif
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Transaction Code: </p>
                <p class="col-md-10 pl-1 text-break">{{$request->transactionTxt}}</p>
            </div>

            @if ($request->transactionImg != NULL)
                <div class="m-0 p-0 col-md-12 d-flex flex-row">
                    <p class="col-md-2 fw-bold text-break">Image: </p>
                    <p class="col-md-10 pl-1">
                        <img src="{{asset($request->transactionImg)}}" style="border-radius: 5px; height: auto; max-width: 500px;">
                    </p>
                </div>
            @endif

            <div class="mt-3 pt-3 border-top col-md-12 text-right d-flex flex-row align-items-center justify-content-center">
                @if ($request->status == "accepted")
                    <a class="m-1 btn btn-outline-success disabled" role="button" aria-disabled="true" href="#">Accepted</a>
                    <a class="m-1 btn btn-danger" href="{{url('/reject-request/'.$request->id)}}">Reject</a>
                @elseif ($request->status == "pending")
                    <a class="m-1 btn btn-success" href="{{url('/accept-request/'.$request->id)}}">Accept</a>
                    <a class="m-1 btn btn-danger" href="{{url('/reject-request/'.$request->id)}}">Reject</a>
                @elseif ($request->status == "rejected")
                    <a class="m-1 btn btn-success" href="{{url('/accept-request/'.$request->id)}}">Accept</a>
                    <a class="m-1 btn btn-outline-danger disabled" role="button" aria-disabled="true" href="#">Rejected</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>