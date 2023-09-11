<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View All Sliders</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addSlider')}}">Add New</a>
        </div>

        <div class="mt-3">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="mt-3 p-3 card shadow">
            @if ($slidersCount == 0)
                <p class="alert alert-secondary m-0" style="font-weight:bold;">Nothing to show.</p>
            @else
                <p class="text-center h3">Total Sliders: {{$slidersCount}}</p>
                <hr>
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Slider</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td id="tdImg"><img src="{{asset($slider->img)}}" style="border-radius: 5px;"></td>
                                <td>
                                    <button class="m-1 btn btn-primary" data-toggle="modal" data-target="#modal{{$slider->id}}">View</button>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-slider/'.$slider->id)}}" onclick = "return confirm('Delete the slider?')">Delete</a>
                                </td>
                            </tr>
                    
                            <div class="m-3 modal w-auto" id="modal{{$slider->id}}">
                                <div class="modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="mb-2 row d-flex align-items-center justify-content-center">
                                                <img class="mb-1 rounded col-md-8" src="{{asset($slider->img)}}" height="auto" width="auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
<style>
    #tdImg img{
        max-width: 150px;
        height: auto;
    }
    @media(max-width:770px){
        #tdImg img{
            max-width: 60px;
            height: auto;
        }
    }
</style>
</html>