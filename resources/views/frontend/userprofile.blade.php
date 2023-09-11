<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{Auth::user()->name}}'s Profile</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="topDiv">
        @if (Session::has('sess'))
            <p class="alert alert-success m-3 p-3"" style="font-weight:bold;">{{ Session::get('sess') }}</p>
        @endif

        <div class="card shadow m-3 p-3">
            <div class="row">
                <div class="col-md-6 text-left">
                    <p class="lead">My Profile</p>
                </div>

                <div class="col-md-6 text-right">
                    <a class="btn btn-light border" href="{{url('/edit-profile/'.Auth::user()->id)}}">Edit Profile</a>
                    <a class="btn btn-light border" href="{{url('/my-pending-orders/'.Auth::user()->id)}}">Pending Orders <span class="badge badge-dark text-white">{{$pOrderCount}}</span></a>
                    <a class="btn btn-light border" href="{{url('/my-completed-orders/'.Auth::user()->id)}}">Completed Order <span class="badge badge-dark text-white">{{$cOrderCount}}</span></a>
                </div>
            </div>

            <hr>

            <div>
                <table class="table table-borderless" style="font-size: 20px;">
                    <tr>
                        <th scope="row">Name: </th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email: </th>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    @if (Auth::user()->packStatus == "registered")
                        <tr>
                            <th scope="row">Package: </th>
                            <td>{{Auth::user()->packName}}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</body>
<style>
    #topDiv{
        margin: 120px 25px 25px 25px;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
    }
</style>
</html>