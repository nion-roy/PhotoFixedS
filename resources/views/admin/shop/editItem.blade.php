<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Shop Item</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewItems')}}">View All</a>
        </div>

        <br>

        <div class="m-0 card shadow">
            <form action="{{url('/update-item/'.$itm->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-3">
                    <input class="form-control" type="text" name="cID" id="cID" value="{{$itm->id}}" readonly hidden required>

                    <div class="card m-2 border-0 col-md-12">
                        <label for="iName">Item Name:</label>
                        <input class="card shadow form-control" type="text" name="iName" id="iName" value="{{$itm->name}}" placeholder="Enter item name" required>
                    </div>

                    <div class="row col-md-6 d-flex flex-column">
                        <div class="card m-2 border-0 col-md-4">
                            <label for="">Previous Image:</label>
                            <img class="forn-control" src="{{asset($itm->img)}}" height="100%" width="100%">
                        </div>
                        <div class="card m-2 border-0 col-md-12">
                            <label for="">Change Image:</label>
                            <input class="form-control card shadow" type="file" accept=".png, .jpeg, .jpg" name="iImg" id="iImg">
                        </div>
                    </div>

                    <div class="row col-md-6 d-flex flex-column">
                        <div class="card m-2 border-0 col-md-12">
                            <label for="iCate">Category:</label>
                            <select class="card shadow form-control" name="iCate" id="iCate" required>
                                <option value="{{$itm->category}}" selected hidden>{{$itm->category}}</option>
                                @foreach ($cate as $ct)
                                    <option value="{{$ct->name}}">{{$ct->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card m-2 border-0 col-md-12">
                            <label for="iPrice">Price:</label>
                            <input class="card shadow form-control" type="number" name="iPrice" id="iPrice" value="{{$itm->price}}" placeholder="Enter item price" required>
                        </div>
    
                        <div class="card m-2 border-0 col-md-12">
                            <label for="iLink">Item Link:</label>
                            <input class="card shadow form-control" type="text" name="iLink" id="iLink" value="{{$itm->itemLink}}" placeholder="Enter item link" required>
                        </div>
                    </div>                    
                </div>

                <div class="text-center pb-3">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Update">
                    <br>
                    <a class="mt-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>