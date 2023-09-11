<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pending Orders</title>
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
            <p class="lead">User: <b>{{$getUser->email}}</b></p>

            <hr>
            
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Service</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pOrd as $ord)
                        <tr>
                            <td class="text-break"><b><i>{{$ord->id}}</i></b></td>
                            <td class="text-break">{{$ord->title}}</td>
                            <td class="text-break"><a href="{{url('/pending-orders/'.$ord->userID)}}">{{$ord->userEmail}}</a></td>
                            <td class="text-break">{{$ord->service}}</td>
                            <td class="text-break">{{$ord->orderDate}}</td>
                            <td>
                                <a class="m-1 btn btn-primary" href="{{url('/view-order/'.$ord->id)}}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</body>
</html>