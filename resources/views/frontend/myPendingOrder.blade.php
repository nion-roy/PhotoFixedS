<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$uInfo->name}}'s Pending Orders</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="" id="topDiv">
        <div class="m-3">
            <a class="btn btn-dark" href="{{url('/my-completed-orders/'.$uInfo->id)}}">View Completed Orders</a>
        </div>

        <div class="m-3">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>
        
        @if ($pOrderCount > 0)
            <div class="card shadow m-3 p-3">
                <h4 class="text-center">Pending Orders</h4>

                <hr>

                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Service</th>
                            <th scope="col" class="colPhoto">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pOrders as $p)
                            <div class="modal fade bd-example-modal-lg" id="modal{{$p->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Transaction</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex align-items-center justify-content-center row">
                                            <form class="col-md-12 text-left row d-flex align-items-center justify-content-center" action="" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <input type="text" name="pID" id="pID" value="{{$p->id}}" required hidden readonly>

                                                <div class="col-md-12 mb-2">
                                                    <label for="transactionTxt">Transaction Code: <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="transactionTxt" id="transactionTxt" placeholder="Enter transaction code/no." required>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="transactionImg">Transaction Image: <span class="text-secondary">(Optional)</span></label>
                                                    <input class="form-control" type="file" name="transactionImg" id="transactionImg">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="mx-1 btn btn-primary" style="width: max-content;">Send</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <tr>
                                <td class="text-break">{{$p->title}}</td>
                                <td class="text-break">{{$p->orderDate}}</td>
                                <td class="text-break">{{$p->service}}</td>
                                <td class="colPhoto"><img src="{{asset($p->orderImgDir)}}" title={{$p->title}}" height="80px" width="150px" style="border-radius: 5px;"></td>
                                <td>
                                    <button class="m-1 btn btn-primary" data-toggle="modal" data-target="#modal{{$p->id}}">Pay</button>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-frontend-order/'.$p->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/cancel-frontend-order/'.$p->id)}}" onclick = "return confirm('Cancel your order?')">Cancel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="height: 30vh;">
                <h4 class="m-3 alert alert-primary text-black text-center">You have no order pending.</h4>
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
</style>
</html>