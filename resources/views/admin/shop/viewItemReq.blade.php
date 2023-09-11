<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Item Requests</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div class="mt-3">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="mt-3 p-3 card shadow">
            @if ($reqsCount == 0)
                <p class="alert alert-secondary m-0" style="font-weight:bold;">Nothing to show.</p>
            @else
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Item</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="hideCol">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reqs as $rq)
                            <tr>
                                <td class="text-break">{{$rq->userName}}</td>
                                <td class="text-break">{{$rq->itemName}}</td>
                                <td class="text-break">{{$rq->date}}</td>
                                <td class="hideCol text-break">{{$rq->price}}</td>
                                <td class="text-break">
                                    @if ($rq->status == 'accepted')
                                        <p class="text-success">Accepted</p>
                                    @elseif($rq->status == 'rejected')
                                        <p class="text-danger">Rejected</p>
                                    @endif
                                </td>
                                <td>
                                    {{-- @if ($rq->status == "accepted")
                                        <a class="m-1 btn btn-outline-success disabled" role="button" aria-disabled="true" href="#">Accepted</a>
                                        <a class="m-1 btn btn-danger" href="{{url('/reject-request/'.$rq->id)}}">Reject</a>
                                    @elseif ($rq->status == "pending")
                                        <a class="m-1 btn btn-success" href="{{url('/accept-request/'.$rq->id)}}">Accept</a>
                                        <a class="m-1 btn btn-danger" href="{{url('/reject-request/'.$rq->id)}}">Reject</a>
                                    @elseif ($rq->status == "rejected")
                                        <a class="m-1 btn btn-success" href="{{url('/accept-request/'.$rq->id)}}">Accept</a>
                                        <a class="m-1 btn btn-outline-danger disabled" role="button" aria-disabled="true" href="#">Rejected</a>
                                    @endif --}}
                                    <a class="m-1 btn btn-primary" href="{{url('/view-request/'.$rq->id)}}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>