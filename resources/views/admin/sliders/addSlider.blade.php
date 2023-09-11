<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Slider</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewSliders')}}">All Sliders</a>
        </div>

        <br>
        
        <div class="m-0 shadow">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingSlider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex align-items-center justify-content-center p-3">
                    <div class="col-md-6">
                        <label for="slider">Add Slider: <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".png, .jpeg, .jpg" name="slider" id="slider" required>
                        <p class="text-danger text-center mt-2"><small><em>Recomended height for slider is <b>750px</b>.</em></small></p>

                        <div class="text-center pb-2">
                            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add Slider">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>