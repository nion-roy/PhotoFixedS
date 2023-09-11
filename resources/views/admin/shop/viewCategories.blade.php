<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Categories</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addCategory')}}">Add New</a>
        </div>

        <br>
        
        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($categoryCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">There is no category available yet.</p>
            @else
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $ct)
                            <tr>
                                <td class="text-break"><b><i>{{$ct->id}}</i></b></td>
                                <td class="text-break">{{$ct->name}}</td>
                                <td>
                                    <a class="ml-1 mr-1 btn btn-secondary" href="{{url('/edit-category/'.$ct->id)}}"><i class="bi bi-pen"></i> Edit</a>
                                    <a class="ml-1 mr-1 btn btn-danger" href="{{url('/delete-category/'.$ct->id)}}" onclick = "return confirm('Delete the category?')"><i class="bi bi-trash"></i> Delete</a>
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