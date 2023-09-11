<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Service</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewServices')}}">View All</a>
        </div>

        <br>
        
        <div class="card shadow p-3 m-0">
            <form action="{{url('/update-service/'.$serv->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row p-2">
                    <input class="form-control" type="text" name="sID" id="sID" value="{{$serv->id}}" readonly hidden required>

                    <div class="border rounded p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-2 col-md-12">
                            <label for="sName">Service Name:</label>
                            <input class="form-control" type="text" name="sName" id="sName" value="{{$serv->name}}" placeholder="Enter a service name" required>
                        </div>
                    </div>
                    
                    <div class="border rounded p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-1 col-md-4">
                            <div class="mb-2 d-flex flex-column">
                                <label for="sImg">Previous Image:</label>
                                <div class="m-0 p-0 card form-control">
                                    <img src="{{asset($serv->imgDir)}}" alt="" style="border-radius: 5px;" height="200px">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sImg">Change Image:</label>
                                <input class="form-control" type="file" accept="image/png, image/jpeg" name="sImg" id="sImg">
                            </div>
                        </div>

                        <div class="mb-1 col-md-4">
                            <div class="mb-2 d-flex flex-column">
                                <label for="slider1">First Slider Image:</label>
                                <div class="m-0 p-0 card border-0 form-control">
                                    <img src="{{asset($serv->sliderDir1)}}" alt="" style="border-radius: 5px;" height="200px">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="slider1">Change First Slider Image:</label>
                                <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="slider1" id="slider1">
                            </div>
                        </div>

                        <div class="mb-1 col-md-4">
                            <div class="mb-2 d-flex flex-column">
                                <label for="slider2">Second Slider Image:</label>
                                <div class="m-0 p-0 card form-control">
                                    <img src="{{asset($serv->sliderDir2)}}" alt="" style="border-radius: 5px;" height="200px">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="slider2">Change Second Slider Image:</label>
                                <input class="form-control" type="file" accept="image/png, image/jpeg" name="slider2" id="slider2">
                            </div>
                        </div>
                    </div>

                    <div class="border rounded p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-1 col-md-4">
                            <label for="sPrice">Price:</label>
                            <input class="form-control" type="number" name="sPrice" id="sPrice" value="{{$serv->price}}" placeholder="Enter a price for the service" required>
                        </div>
                        
                        <div class="mb-1 col-md-4">
                            <label for="sDiscount">Discount (If any):</label>
                            <input class="form-control" type="number" name="sDiscount" id="sDiscount" value="{{$serv->discount}}" placeholder="Add a discount (Optional)">
                        </div>

                        <div class="mb-1 col-md-4">
                            <label for="freeServ">One-time Free Service:</label>
                            <select class="form-control" name="freeServ" id="freeServ">
                                <option value="{{$serv->freeOne}}" selected hidden>{{$serv->freeOne}}</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="border rounded p-2 mb-2 d-flex flex-row flex-wrap col-md-12">
                        <div class="mb-1 col-md-12">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$serv->description}}</textarea>
                        </div>
                    </div>
                    
                </div>

                <div class="text-center p-2">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Update">
                    <br>
                    <a class="mt-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>