<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>


    @push('css')
    <style>
        .card .icon {
            display: inline-block;
            margin: 0 auto;
            margin-bottom: 1rem;
        }

        .card .icon i {
            font-size: 26px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dotted rgba(0, 0, 0, .3);
            border-radius: 50%;
            color: #07a6ca;
        }

        .card:hover .icon i {
            background: #07a6ca;
            color: #fff;
            border-color: #07a6ca;
        }

        .card h5 {
            font-size: 24px !important;
            font-weight: 600;
        }

        .contact-iframe iframe {
            display: block;
            width: 100%;
            height: 460px;
        }
    </style>
    @endpush

</head>

<body>
    <div>
        @include('layouts.app')
    </div>

    <div id="topDiv" class="d-block py-5" style="margin-top: 8rem; margin-bottom: 5rem;">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center row">
                <div class="col-md-12 text-center mb-5">
                    <h1>CONTACT US</h1>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <h5 class="card-title">Address</h5>
                                <p class="card-text">{{ $contacts->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">{{ $contacts->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">{{ $contacts->number }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="contact-iframe">
        {!! $contacts->iframe !!}
    </div>


    <div>
        @include('layouts.footer')
    </div>


</body>

</html>