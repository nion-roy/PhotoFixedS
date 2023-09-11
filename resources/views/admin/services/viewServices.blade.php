<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addService')}}">Add New</a>
        </div>

        <br>

        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($serviceCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">There is no service available yet.</p>
            @else
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $sv)
                            <tr>
                                <td class="text-break"><b><i>{{$sv->id}}</i></b></td>
                                <td class="text-break">{{$sv->name}}</td>
                                <td class="text-break">{{$sv->price}}</td>
                                <td class="text-break">{{$sv->discount}}</td>
                                <td>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-service/'.$sv->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-service/'.$sv->id)}}" onclick = "return confirm('Delete the service?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>