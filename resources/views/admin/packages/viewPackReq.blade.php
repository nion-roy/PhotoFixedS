<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package Requests</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
                <br>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($userpackagesCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">There is no request.</p>
            @else
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Package</th>
                            <th scope="col">Date</th>
                            <th scope="col">Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userpackages as $p)
                            <tr>
                                <td class="text-break">{{$p->userName}}</td>
                                <td class="text-break">{{$p->packName}}</td>
                                <td class="text-break">{{$p->date}}</td>
                                <td>
                                    @if ($p->status == "approved")
                                        <a class="m-1 btn btn-outline-success disabled" role="button" aria-disabled="true" href="#">Approved</a>
                                        <a class="m-1 btn btn-danger" href="{{url('/disapprove-request/'.$p->id)}}">Disapprove</a>
                                    @else
                                        <a class="m-1 btn btn-success" href="{{url('/approve-request/'.$p->id)}}">Approve</a> 
                                    @endif
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