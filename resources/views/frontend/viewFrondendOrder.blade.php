<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order: {{$ord->title}}</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="p-3" id="topDiv">
        <div class="m-0 p-3 card shadow row">
            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Title: </p>
                <p class="col-md-10 pl-1 text-break">{{$ord->title}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Service: </p>
                <p class="col-md-10 pl-1 text-break">{{$ord->service}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Completion Date: </p>
                <p class="col-md-10 pl-1 text-break">{{$ord->completedDate}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Editor: </p>
                <p class="col-md-10 pl-1 text-break">{{$ord->editorEmail}}</p>
            </div>

            <div class="m-0 p-0 col-md-12 d-flex flex-row">
                <p class="col-md-2 fw-bold text-break">Photo: </p>

                <div class="card border-0 col-md-10 pl-1">
                    <img src="{{asset($ord->editedImgDir)}}" alt="" style="border-radius: 5px; height: auto; max-width: 500px;">
                </div>
            </div>

            <div class="mt-3 pt-3 border-top col-md-12 d-flex flex-column align-items-center justify-content-center">
                @if ($ord->approval == "Yes")
                    <a class="m-1 btn btn-primary" href="{{url('/downloade-completed-photo/'.$ord->id)}}">Download</a>
                @else
                    <p class="alert alert-danger text-danger text-center">You can't download the photo yet. Please contact with the editor or admin.</p>
                    {{-- <a class="mb-1 btn btn-primary disabled" role="button" aria-disabled="true" href="#">Download</a> --}}
                @endif
                
                <a class="m-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
            </div>
        </div>
    </div>

    <div>
        <br>
        @include('layouts.footer')
    </div>

    <script>
        $('img').mousedown(function (e) {
            if(e.button == 2) { // right click
                return false; // do nothing!
            }
        });
    </script>
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
    img{
        pointer-events: none;
    }
</style>
</html>