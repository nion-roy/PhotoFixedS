<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhotoFixedS - Admin Panel</title>
</head>
<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <div class="text-center">
                <p class="display-6">Welcome {{Auth::user()->name}}</p>
            </div>

            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Registered Users</p>
                        <p class="display-5">{{$userCount}}</p>
                    </div>
                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Pending Orders</p>
                        <p class="display-5">{{$pendingOrderCount}}</p>
                    </div>
                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Orders Submitted</p>
                        <p class="display-5">{{$completedOrderCount}}</p>
                    </div>

                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Total Packages</p>
                        <p class="display-5">{{$packCount}}</p>
                    </div>
                    
                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Total Services</p>
                        <p class="display-5">{{$serviceCount}}</p>
                    </div>
                    
                    <div class="m-2 p-2 card shadow flex-column col-lg-3 d-flex align-items-stretch">
                        <p>Total Shop Items</p>
                        <p class="display-5">{{$itemCount}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>