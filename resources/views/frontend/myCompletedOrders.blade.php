<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$uInfo->name}}'s Completed Orders</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="" id="topDiv">
        <div class="m-3">
            <a class="btn btn-dark" href="{{url('/my-pending-orders/'.$uInfo->id)}}">View Pending Orders</a>
        </div>

        
        @if ($cOrderCount > 0)
            <div class="card shadow m-3 p-3">
                <h4 class="text-center">Completed Orders</h4>

                <hr>

                <table class="table text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="colPhoto">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Service</th>
                            <th scope="col">Editor</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cOrders as $c)
                            <tr>
                                <td class="colPhoto"><a href="{{url('/view-frontend-order/'.$c->id)}}"><img src="{{asset($c->uneditedImgDir)}}" title="View Order: {{$c->title}}" height="80px" width="150px" style="border-radius: 5px;"></a></td>
                                <td class="text-break">{{$c->title}}</td>
                                <td class="text-break">{{$c->completedDate}}</td>
                                <td class="text-break">{{$c->service}}</td>
                                <td class="text-break">{{$c->editorEmail}}</td>
                                <td>
                                    <a class="m-1 btn btn-primary" href="{{url('/view-frontend-order/'.$c->id)}}">View</a>
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