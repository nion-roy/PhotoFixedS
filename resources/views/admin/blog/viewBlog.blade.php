<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('AddBlogs')}}">Add New</a>
        </div>

        <br>

        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($blogCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">There is no blog available yet.</p>
            @else
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $bl)
                            <tr>
                                <td class="text-break">{{$bl->title}}</td>
                                <td class="text-break"><img src="{{asset($bl->thumbnail)}}" height="80px" width="auto" style="border-radius: 5px;"></td>
                                <td>
                                    <a class="m-1 btn btn-primary" href="{{url('/view-single-blog/'.$bl->id)}}">View</a>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-blog/'.$bl->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-blog/'.$bl->id)}}" onclick = "return confirm('Delete the blog?')">Delete</a>
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