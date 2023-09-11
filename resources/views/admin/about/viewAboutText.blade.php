<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Settings</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div class="mt-3">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="mt-3 p-3 card shadow">
            @foreach ($about as $a)
                <textarea class="form-control text-justify border-0 mb-2 p-1 bg-transparent" rows="10" readonly>{{$a->txt}}</textarea>
                
                <div class="text-right">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#model_{{$a->id}}" style="width: 100px;">Edit</button>
                    <a class="btn btn-secondary" href="{{url()->previous()}}" style="width: 100px;">Back</a>
                </div>

                <div class="modal fade bd-example-modal-lg" id="model_{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">About Settings</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{route('updatingAbout')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input class="form-control" type="text" name="abtID" id="abtID" value="{{$a->id}}" required readonly hidden>

                                <div class="modal-body row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="txt" id="txt" rows="8" placeholder="Write your about text" required></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit" name="update" id="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>