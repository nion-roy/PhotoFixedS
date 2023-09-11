<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Shop Item</title>
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

        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingItem')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">
                    <div class="mb-4 col-md-12">
                        <label for="iName">Shop Item Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="iName" id="iName" placeholder="Enter item name" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="iCategory">Shop Category: <span class="text-danger">*</span></label>
                        <select class="form-control" name="iCategory" id="iCategory">
                            <option value="" selected hidden>Select Item Category</option>
                            @foreach ($categories as $ct)
                            <option value="{{$ct->name}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="iImg">Image: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="iImg" id="iImg" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="iPrice">Price: <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="iPrice" id="iPrice" placeholder="Enter item price" required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="iImg">Item Link: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="iLink" id="iLink" placeholder="Enter item link" required>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <input class="btn btn-primary" type="submit" name="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>