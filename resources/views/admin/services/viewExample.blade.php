<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View All Examples</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addExample')}}">Add New</a>
        </div>

        <br>

        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($servExCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">No example available yet.</p>
            @else
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Service</th>
                            <th scope="col">Before</th>
                            <th scope="col">After</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servEx as $ex)
                            <tr>
                                <td class="text-break">{{$ex->service}}</td>
                                <td id="tdImg"><img src="{{asset($ex->before)}}" style="border-radius: 5px;"></td>
                                <td id="tdImg"><img src="{{asset($ex->after)}}" style="border-radius: 5px;"></td>
                                <td>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-example/'.$ex->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-example/'.$ex->id)}}" onclick = "return confirm('Delete the example?')">Delete</a>
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
<style>
    #tdImg img{
        max-width: 150px;
        height: auto;
    }
    @media(max-width:770px){
        .hideCol{
            display: none;
            visibility: hidden;
        }
        #tdImg img{
            max-width: 60px;
            height: auto;
        }
    }
</style>
</html>