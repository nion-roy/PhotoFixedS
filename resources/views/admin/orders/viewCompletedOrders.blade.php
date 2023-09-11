<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Completed Orders</title>
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
            @if ($cOrderCount == 0)
                <p class="alert alert-secondary m-0" style="font-weight:bold;">Nothing to show.</p>
            @else
                <p class="text-center h3">Completed Orders: {{$cOrderCount}}</p>
                <hr>
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="hideCol">ID</th>
                            <th scope="col">Service</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="hideCol">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cOrders as $ord)
                            <tr>
                                <td class="hideCol text-break"><b><i>{{$ord->id}}</i></b></td>
                                <td class="text-break">{{$ord->service}}</td>
                                <td class="text-break"><a href="{{url('/completed-orders/'.$ord->userID)}}">{{$ord->userEmail}}</a></td>
                                <td class="text-break">{{$ord->completedDate}}</td>
                                <td class="hideCol text-break">{{$ord->payment}}</td>
                                <td>
                                    @if ($ord->approval == "Yes")
                                        <a class="m-1 btn btn-outline-success disabled" role="button" aria-disabled="true" href="#">Allowed</a>
                                        <a class="m-1 btn btn-danger" href="{{url('/disapprove-order/'.$ord->id)}}">Deny</a>
                                    @else
                                        <a class="m-1 btn btn-success" href="{{url('/approve-order/'.$ord->id)}}">Allow</a>
                                    @endif

                                    <a class="m-1 btn btn-primary" href="{{url('/view-order-details/'.$ord->id)}}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
<style>
    @media(max-width:770px){
        .hideCol{
            display: none;
            visibility: hidden;
        }
    }
</style>
</html>