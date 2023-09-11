<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$thepack->name}} Package</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>
    
    <div class="text-center" id="topDiv">
        <p class="display-5">{{$thepack->name}} Package</p>
        <p class="lead">{{$thepack->description}}</p>

        <div class="mt-3 row d-flex flex-column align-items-center justify-content-center">
            <div class="p-3 col-md-3 border rounded text-left">
                <h4>Included Services:</h4>
                <div class="pl-2">
                    <ul>
                        @php
                            $incServices = json_decode($thepack->services)
                        @endphp
                        @foreach ($incServices as $serv)
                            <li>{{$serv}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <br>

            @if (Auth::user() == NULL)
                <div class="mt-2 p-0 col-md-3 text-center">
                    <div class="m-0 alert alert-dark">
                        <p class="text-black">You need to be logged in to get this service.</p>
                        <a class="btn btn-dark" href="{{route('login')}}">Login</a>
                    </div>
                </div>
            @else
                <div class="mt-2 p-3 col-md-3 border rounded text-center">
                    
                    <div class="mt-2">
                        <form action="{{route('getPack')}}" method="POST">
                            @csrf
                            <input type="text" name="userID" id="userID" value="{{Auth::user()->id}}" readonly hidden required>
                            <input type="text" name="userName" id="userName" value="{{Auth::user()->name}}" readonly hidden required>
                            <input type="text" name="packID" id="packID" value="{{$thepack->id}}" readonly hidden required>
                            <input type="text" name="packName" id="packName" value="{{$thepack->name}}" readonly hidden required>

                            @if (Auth::user()->uPackID == NULL)
                                <p class="h5">You want to get this package?</p>
                                <button class="m-1 btn btn-outline-success" style="width: 100px;" type="submit">Yes</button>
                                <a class="m-1 btn btn-outline-danger" style="width: 100px;" href="{{route('pricing')}}">No</a>
                            @else
                                @if (Auth::user()->uPackID == $thepack->id)
                                    @if (Auth::user()->packStatus == "registered")
                                        <p>You've already registered this package.</p>
                                        <a class="m-1 btn btn-secondary" style="width: 100px;" href="{{route('pricing')}}">Back</a>
                                    @elseif (Auth::user()->packStatus == "pending")
                                        <p>You've already requested this package. Please wait for approval.</p>
                                        <a class="m-1 btn btn-secondary" style="width: 100px;" href="{{route('pricing')}}">Back</a>
                                    @endif
                                @else
                                    @if (Auth::user()->packStatus == "registered")
                                        <p>Currently you are a member of another package.</p>
                                        <p class="h5">Do you want to switch your package?</p>
                                        <button class="m-1 btn btn-outline-success" style="width: 100px;" type="submit">Yes</button>
                                        <a class="m-1 btn btn-outline-danger" style="width: 100px;" href="{{route('pricing')}}">No</a>
                                    @elseif (Auth::user()->packStatus == "pending")
                                        <p>You still have a pending request.</p>
                                        <p class="h5">Do you want to change your package?</p>
                                        <button class="m-1 btn btn-outline-success" style="width: 100px;" type="submit">Yes</button>
                                        <a class="m-1 btn btn-outline-danger" style="width: 100px;" href="{{route('pricing')}}">No</a>
                                    @endif
                                @endif
                            @endif
                        </form>
                        
                    </div>
                </div>
            @endif
            <br>
        </div>
    </div>

    <hr>

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

                        <div class="collapse lead border-left my-2 px-2" id="collapseExample{{$mlst->id}}">
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
    #mYear{
        text-align: right;
    }
    #mHead{
        text-align: left;
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
        #mYear{
            text-align: left;
        }
        #mDot{
            display: none;
            visibility: hidden;
        }
        #mHead{
            text-align: left;
        }
        #mlst{
            margin: 2px;
            padding: 2px;
            border-radius: 5px;
            border: 1px solid gray;
        }
    }
</style>
</html>