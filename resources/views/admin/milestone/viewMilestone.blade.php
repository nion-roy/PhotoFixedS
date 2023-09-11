<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milestone List</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addMilestone')}}">Add New</a>
        </div>

        <div class="mt-3">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="mt-3 p-3 card shadow">
            @if ($mlsCount == 0)
                <p class="alert alert-secondary m-0" style="font-weight:bold;">Nothing to show.</p>
            @else
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Heading</th>
                            <th scope="col">Year</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mls as $m)
                            <tr>
                                <td class="text-break">{{$m->heading}}</td>
                                <td class="text-break">{{$m->year}}</td>
                                <td>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-milestone/'.$m->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-milestone/'.$m->id)}}" onclick = "return confirm('Confirm?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>