<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Items</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-primary" href="{{route('addItem')}}">Add New</a>
        </div>

        <br>
        
        <div class="m-0">
            @if(Session::has('sess'))
                <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 p-3 card shadow">
            @if ($itemCount == 0)
                <p class="alert alert-secondary" style="font-weight:bold;">There is no item available yet.</p>
            @else
                <table class="table text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Item</th>
                            <th scope="col">Category</th>
                            <th scope="col">Link</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-break"><b><i>{{$item->id}}</i></b></td>
                                <td class="text-break">{{$item->name}}</td> 
                                <td class="text-break">{{$item->category}}</td> 
                                <td><a class="btn btn-outline-primary" href="{{$item->itemLink}}" target="_blank">Visit</a></td>
                                <td>
                                    <a class="m-1 btn btn-secondary" href="{{url('/edit-item/'.$item->id)}}">Edit</a>
                                    <a class="m-1 btn btn-danger" href="{{url('/delete-item/'.$item->id)}}" onclick = "return confirm('Delete the item?')">Delete</a>
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