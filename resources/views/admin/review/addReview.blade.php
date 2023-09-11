<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Review</title>
</head>

<body>
    <div>
        @include('layouts.admin_heading')
    </div>

    <div class="mt-5 content">
        <div>
            <a class="btn btn-dark" href="{{route('viewReviews')}}">View All</a>
        </div>

        <br>

        <div class="m-0 shadow">
            @if(Session::has('sess'))
            <p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
            @endif
        </div>

        <div class="m-0 card shadow">
            <form action="{{route('addingReview')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row p-4">
                    <input class="form-control" type="email" name="postBy" id="postBy" value="{{Auth::user()->email}}" required hidden readonly>

                    <div class="col-12 mb-3">
                        <h4>Rating</h4>
                        <div class="ratings mb-3" data-rating="0"></div>
                        <input type="hidden" name="rating" id="ratingInput">
                    </div>


                    <div class="col-md-4 mb-2">
                        <label for="service">Service: <span class="text-danger">*</span></label>
                        <select class="form-control" name="service" id="service" required>
                            <option value="" selected hidden>Choose service</option>
                            @foreach ($services as $service)
                            <option value="{{$service->name}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="reviewBy">Reviewer: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="reviewBy" id="reviewBy" placeholder="Enter reviewer name" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="reviewerImg">Reviewer Photo:</label>
                        <input class="form-control" type="file" accept="image/png, image/jpeg" name="reviewerImg" id="reviewerImg">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="review">Review: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="review" id="review" rows="8" placeholder="Write your review"></textarea>
                    </div>
                </div>

                <div class="text-center pb-4">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>

</html>