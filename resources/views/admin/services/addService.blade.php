<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Service</title>
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
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingService')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">
                    <div class="mb-4 col-md-12">
                        <label for="sName">Service Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="sName" id="sName" placeholder="Enter a service name" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="sImg">Title Image: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept="image/png, image/jpeg" name="sImg" id="sImg" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="sSlider1">First Slider Image: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept="image/png, image/jpeg" name="sSlider1" id="sSlider1" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="sSlider2">Second Slider Image: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="sSlider2" id="sSlider2" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="sPrice">Price: <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="sPrice" id="sPrice" placeholder="Enter a price for the service" required>
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="sDiscount">Discount (If any):</label>
                        <input class="form-control" type="number" name="sDiscount" id="sDiscount" placeholder="Add a discount (Optional)">
                    </div>

                    <div class="mb-4 col-md-4">
                        <label for="freeServ">One-time Free Service: <span class="text-danger">*</span></label>
                        <select class="form-control" name="freeServ" id="freeServ">
                            <option value="Yes">Yes</option>
                            <option value="No" selected>No</option>
                        </select>
                    </div>

                    <div class="mb-2 col-md-12">
                        <label for="sDescription">Description: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="sDescription" id="sDescription" cols="30" rows="5" placeholder="Write description"></textarea>
                    </div>
                </div>

                <div class="text-center pb-4">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>