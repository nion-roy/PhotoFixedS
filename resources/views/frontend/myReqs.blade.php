<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{Auth::user()->name}}'s Item Requests</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="" id="topDiv">
        @if ($reqCount > 0)
            @if (Session::has('sess'))
                <p class="alert alert-success m-3 p-3"" style="font-weight:bold;">{{ Session::get('sess') }}</p>
            @endif

            <div class="card shadow m-3 p-3">
                <h4 class="text-center">My Requests</h4>

                <hr>

                <table class="table text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($req as $rq)
                            <tr>
                                {{-- <td class="colPhoto"><a href="{{url('/view-frontend-order/'.$rq->id)}}"><img src="{{asset($c->uneditedImgDir)}}" title="View Order: {{$c->title}}" height="80px" width="150px" style="border-radius: 5px;"></a></td> --}}
                                <td class="text-break">{{$rq->itemName}}</td>
                                <td class="text-break">{{$rq->date}}</td>
                                <td class="text-break">{{$rq->status}}</td>
                                <td>
                                    @if ($rq->status == "accepted")
                                        <a class="m-1 btn btn-outline-success disabled" role="button" aria-disabled="true" href="#">Accepted</a>
                                        <a class="m-1 btn btn-primary" href="{{url('/view-req/'.$rq->id)}}">Get</a>
                                    @elseif ($rq->status == "pending")
                                        <a class="m-1 btn btn-outline-warning disabled" role="button" aria-disabled="true" href="#">Pending</a>
                                        <a class="m-1 btn btn-danger" href="{{url('/cancel-request/'.$rq->id)}}" onclick="return confirm('Cancel your request?')">Cancel</a>
                                    @elseif ($rq->status == "rejected")
                                        <a class="m-1 btn btn-outline-danger disabled" role="button" aria-disabled="true" href="#">Rejected</a>
                                        <a class="m-1 btn btn-primary" href="{{url('/get-the-item/'.$rq->itemID)}}">Request Again</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <div style="height: 30vh;">
            <h4 class="m-3 alert alert-primary text-black text-center">Nothing to show yet.</h4>
        </div>
        @endif
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
    @media(max-width:770px){
        .colPhoto{
            display: none;
            visibility: hidden;
        }
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
    }
    img{
        pointer-events: none;
    }
</style>
</html>