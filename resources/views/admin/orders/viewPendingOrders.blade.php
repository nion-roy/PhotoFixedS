<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Pending Orders</title>
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
            @if ($pOrderCount == 0)
                <p class="alert alert-secondary m-0" style="font-weight:bold;">There is no pending order for now.</p>
            @else
                <p class="text-center h3">Pending Orders: {{$pOrderCount}}</p>

                <hr>

                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Service</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pOrders as $ord)
                            <tr>
                                <td class="text-break">{{$ord->title}}</td>
                                <td class="text-break"><a href="{{url('/pending-orders/'.$ord->userID)}}">{{$ord->userEmail}}</a></td>
                                <td class="text-break">{{$ord->service}}</td>
                                <td class="text-break">{{$ord->orderDate}}</td>
                                @if ($ord->paymentCode == Null)
                                    <td class="text-break">Pending</td>
                                @else
                                <td class="text-break">Paymant Sent</td>
                                @endif
                                <td>
                                    <a class="m-1 btn btn-primary" href="{{url('/view-order/'.$ord->id)}}">View</a>
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
    /* #pagination{
        display: flex;
        flex-direction: row;
    }
    #pagination svg{
        display: none;
        visibility: hidden;
    }
    #pagination p{
        padding: 10px;
    } */
</style>
</html>