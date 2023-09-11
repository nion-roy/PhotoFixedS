<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$itm->name}}</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="card shadow p-4 row d-flex align-items-center justify-content-center" id="topDiv">
        <div class="col-md-12 row">
            <div class="col-md-4 text-right" id="hideDiv">
                <img src="{{asset($itm->img)}}" alt="" height="" width="80%">
            </div>
            <div class="col-md-8 text-left d-flex flex-column justify-content-center" style="font-size: larger;">
                <h3>{{$itm->name}}</h3>
                <ul>
                    <li>Category: {{$itm->category}}</li>
                    <li>Price: {{$itm->price}}</li>
                </ul>

                {{-- <div class="card p-3 mt-3 text-left" style="width: max-content;">
                    <h4 class="text-center mb-3">User Details</h4>
                    <p class="lead p-0 m-0">Name: {{$uInfo->name}}</p>
                    <p class="lead p-0 m-0">Email: {{$uInfo->email}}</p>
                </div> --}}
            </div>
        </div>

        <div class="mt-2 p-2 border-top text-center d-flex flex-column align-items-center justify-content-center">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif

            @if ($theReq == NULL)
                <p class="lead"><b>Do you want to get this item?</b></p>
                <div>
                    <button type="button" class="mx-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" style="width: 100px;">Yes</button>
                      <a class="mx-1 btn btn-outline-danger" href="{{url()->previous()}}" style="width: 100px;">No</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{route('sendReq')}}" method="POST" enctype="multipart/form-data" class="text-left row d-flex align-items-center justify-content-center">
                                        @csrf
                                        
                                        <input type="text" name="userID" id="userID" value="{{$uInfo->id}}" required hidden readonly>
                                        <input type="text" name="userName" id="userName" value="{{$uInfo->name}}" required hidden readonly>
                                        <input type="text" name="itemID" id="itemID" value="{{$itm->id}}" required hidden readonly>
                                        <input type="text" name="itemName" id="itemName" value="{{$itm->name}}" required hidden readonly>
                                        <input type="number" name="itemPrice" id="itemPrice" value="{{$itm->price}}" required hidden readonly>

                                        <div class="col-md-12 mb-2">
                                            <label for="transactionTxt">Transaction Code: <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="transactionTxt" id="transactionTxt" placeholder="Enter transaction code/no." required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="transactionImg">Transaction Image: <span class="text-secondary">(Optional)</span></label>
                                            <input class="form-control" type="file" name="transactionImg" id="transactionImg">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="mx-1 btn btn-primary" style="width: max-content;">Send Request</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if ($theReq->status == "pending")
                    <p class="alert alert-secondary">You've already requested for this item. Please wait.</p>
                    <a class="mx-1 btn btn-secondary" href="{{route('home')}}">Return to Home</a>
                @elseif ($theReq->status == "rejected")
                    <p class="alert alert-secondary">Your request has been rejected.</p>
                    
                    <p class="lead"><b>Request again?</b></p>
                    <div>
                        <button type="button" class="mx-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal_1" style="width: 100px;">Yes</button>
                        <a class="mx-1 btn btn-outline-danger" href="{{url()->previous()}}" style="width: 100px;">No</a>
                    </div>

                    <div class="modal fade" id="exampleModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{route('sendReq')}}" method="POST" enctype="multipart/form-data" class="text-left row d-flex align-items-center justify-content-center">
                                        @csrf
                                        
                                        <input type="text" name="userID" id="userID" value="{{$uInfo->id}}" required hidden readonly>
                                        <input type="text" name="userName" id="userName" value="{{$uInfo->name}}" required hidden readonly>
                                        <input type="text" name="itemID" id="itemID" value="{{$itm->id}}" required hidden readonly>
                                        <input type="text" name="itemName" id="itemName" value="{{$itm->name}}" required hidden readonly>
                                        <input type="number" name="itemPrice" id="itemPrice" value="{{$itm->price}}" required hidden readonly>

                                        <div class="col-md-12 mb-2">
                                            <label for="transactionTxt">Transaction Code: <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="transactionTxt" id="transactionTxt" placeholder="Enter transaction code/no." required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="transactionImg">Transaction Image: <span class="text-secondary">(Optional)</span></label>
                                            <input class="form-control" type="file" name="transactionImg" id="transactionImg" accept=".jpg, .jpeg, .png">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="mx-1 btn btn-primary" style="width: max-content;">Send Request</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($theReq->status == "accepted")
                    <a class="m-1 btn btn-primary" href="{{$itm->itemLink}}" target="_blank">Download</a>
                    <a class="mx-1 btn btn-secondary" href="{{route('home')}}">Return to Home</a>
                @endif
            @endif
        </div>
    </div>

    <div class="p-4 text-center">
        <p class="display-6">About</p>
        <p class="lead mx-4 text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium cumque est explicabo reprehenderit obcaecati deleniti? Aspernatur nisi amet nam, laborum libero exercitationem, dolorem itaque saepe totam dicta laboriosam omnis cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi minus nemo sapiente. Beatae neque perferendis at? Quia consectetur, laboriosam aperiam corrupti necessitatibus ea eius delectus consequatur, odit assumenda aliquid unde. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio adipisci hic cumque nulla eius doloribus praesentium, suscipit, minima dolores, optio libero. Hic eos sunt, sit quae aliquid corrupti illo error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis maxime maiores iusto totam quasi consequuntur odio, nisi voluptatem eaque quas necessitatibus, molestiae, veniam commodi earum recusandae architecto aliquam quos. Iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ad, illum sunt corporis sapiente nisi dolorem deserunt iure ullam laboriosam animi eaque, omnis tenetur perferendis eligendi dolor harum, quisquam necessitatibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum excepturi voluptate beatae nulla quae eius minima blanditiis aperiam, nesciunt iste dolore laboriosam a dolor quaerat quibusdam. Ab sapiente et distinctio? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro nisi aperiam velit placeat, quam officia blanditiis dignissimos numquam a fuga atque est ipsam vero mollitia beatae dolor provident, assumenda non.</p>

        <div class="mx-4 d-flex flex-column align-items-center justify-content-center row">
            @foreach ($milestones as $mlst)
                <div class="col-md-6 row mb-1 d-flex flex-row align-items-center justify-content-center" id="mlst">
                    <div class="col-md-1 lead" id="mYear">{{$mlst->year}}</div>
                    <div class="col-md-1" id="mDot"><span class="dot"></span></div>
                    <div class="col-md-9 d-flex flex-column" id="mHead">
                        <a class="text-black text-justify lead" data-bs-toggle="collapse" href="#collapseExample{{$mlst->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">{{$mlst->heading}}</a>

                        <div class="collapse lead border-left my-2 px-2 text-justify" id="collapseExample{{$mlst->id}}">
                            {{$mlst->details}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
    .dot {
        height: 15px;
        width: 15px;
        background-color: #f7b500;
        border-radius: 50%;
        display: inline-block;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
        #hideDiv{
            display: none;
            visibility: hidden;
        }
    }
    img{
        pointer-events: none;
    }
</style>
</html>