<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allow Download</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <form action="{{route('confirmPayment')}}" method="POST" enctype="multipart/form-data" class="row d-flex align-items-center justify-content-center">
            @csrf

            <div class="card shadow p-3 col-md-6 row">
                <input class="form-control" type="text" name="orderID" name="orderID" value="{{$order->id}}" required hidden readonly>

                <div class="col-md-12">
                    <input class="form-control" type="number" name="payment" name="payment" placeholder="Enter the payment amount" required>
                </div>
                
               <div class="mt-2 col-md-12 d-flex flex-column align-items-center justify-content-center">
                    <button class="mt-1 btn btn-primary" type="submit">Confirm</button>
                    <a class="mt-1 btn btn-secondary" href="{{url()->previous()}}">Back</a>
               </div>
            </div>
        </form>
    </div>
</body>
</html>