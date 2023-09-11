<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PhotoFixedS</title>


  @push('css')
  <style>
    .wrapper {
      max-width: 100%;
      margin: 0 auto;
      border-radius: 5px;
      overflow: hidden;
      /* padding: 75px 50px; */
    }

    .slick-slide a {
      color: white;
      font-size: 16px;
      /*font-family:myriad-pro, sans-serif;*/
      font-family: "PT Sans", sans-serif;
    }

    .slick-slide p {
      line-height: 24px;
    }

    .slick-slide p:last-of-type {
      margin-bottom: 0;
    }

    .slick-slide p:first-of-type {
      font-weight: bold;
    }

    /*
		.slick-next:before {
			position: relative;
			top: -15px;
			content: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1552126/right-carousel-arrow.png");
			z-index: 999;
			left: 0;
		}

		.slick-prev:before {
			position: relative;
			top: -15px;
			right: 20px;
			content: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1552126/left-carousel-arrow.png");
		} */

    .slick-next::before,
    .slick-prev::before {
      font-size: 46px;
    }

    .slick-prev {
      font-size: 28px;
      left: -40%;
      z-index: 9999;
    }

    .slick-next {
      font-size: 28px;
      left: 40%;
      z-index: 9999;
    }

    .service-btn .btn {
      border: 2px solid #f7b500;
      background: none !important;
      border-radius: 0 !important;
      padding: 8px 22px !important;
    }

    .service-btn .btn:hover {
      background: #f7b500 !important;
      color: #fff !important;
    }

    @media only screen and (min-width: 768px) and (max-width:992px) {
      .slick-prev {
        left: -30%;
      }
    }

    @media only screen and (max-width: 767px) {
      .slick-prev {
        left: -25%;
      }

      .slick-next {
        left: 42%;
      }
    }
    @media only screen and (max-width: 560px) {
      .slick-prev {
        left: -20%;
      }

      .slick-next {
        left: 42%;
      }
    }
  </style>
  @endpush
</head>

<body>
  <div>
    @include('layouts.app')
  </div>

  {{-- <div class="d-flex align-items-center justify-content-center" id="topDiv" style="border-radius: 5px;">
    <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
      <div class="carousel-inner" style="border-radius: 10px;">
        <div class="carousel-item active">
          <img class="d-block" src="{{asset('asset/slider/home/slider1.jpg')}}" alt="slider1" height="100%" width="100%">
        </div>
        @foreach ($sliders as $key=>$slider)
        <div class="carousel-item {{$key==0 ? 'active' : ''}}">
          <img class="d-block" src="{{asset($slider->img)}}" alt="{{$slider->id}}" height="100%" width="100%">
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div> --}}

  <div class="d-flex align-items-center justify-content-center  bg-light bg-gradiant" id="topDiv" style="border-radius: 5px;">
    <div class="wrapper">
      <!-- start slider -->
      <div class="promotions-carousel row">
        <!-- slide 1 -->
        @foreach ($sliders as $key=>$slider)
        <div class="columns large-4">
          <div class="row">
            <div class="columns small-3">
              <img class="img-fluid shadow" src="{{asset($slider->img)}}" alt="{{$slider->id}}">
            </div>
          </div>
        </div>
        @endforeach
        <!-- end slide 1 -->

      </div>
    </div>
    <!-- end slider -->
  </div>

  <div class="d-flex flex-column align-items-center justify-content-center text-center p-5">
    <h2>PhotoFixedS Photo Editing Service</h2>
    <h5><i>PhotoFixedS is one of the most trusted agency in online photo editing.</i></h5>
    <p>Just follow the steps, upload your photo and let us take care of the rest.</i></p>

    <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img src="{{asset('asset/icon/100%-secured.svg')}}" height="100px" width="100px">
        <p>We guarantee 100% security</p>
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img src="{{asset('asset/icon/follow-steps.svg')}}" height="100px" width="100px">
        <p>Follow your own photography style</p>
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img src="{{asset('asset/icon/one-of-the-best.svg')}}" height="100px" width="100px">
        <p>One of the top industries</p>
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img src="{{asset('asset/icon/24-hours.svg')}}" height="100px" width="100px">
        <p>Fast 24 hour turnaround</p>
      </div>
    </div>

    <div class="d-flex flex-row align-items-center justify-content-center mt-3">
      <a class="mr-2 btn btn-primary" href="{{route('photoUpload')}}">Upload Photo</a>
      <a class="mr-2 btn btn-outline-primary" href="{{route('tryFree')}}">Try for Free</a>
    </div>
  </div>

  <div class="p-5 d-flex flex-column align-items-center justify-content-center bg-light bg-gradiant" style="transition: ease-in-out 0ms;">
    <h2 class="display-6 mb-2 text-center">Photo Editing Services We Provide</h2>

    <br>

    <div class="row d-flex align-items-center justify-content-center w-100">
      @if ($exampleCount > 0)
      @foreach ($services as $service)
      @php
      $x = 1;
      @endphp

      @foreach ($examples as $exm)
      @if ($service->name == $exm->service && $x == 1)
      <div class="mb-5 p-2 col-md-8 row d-flex align-items-center justify-content-center">
        <div class="col-md-6" id="slidertext">
          <h4>{{$service->name}}</h4>
          <p class="text-justify">{{$service->description}}</p>
          <div class="text-center service-btn">
            <a class="mb-4 btn btn-info" href="{{url('/service/'.$service->id)}}">Details</a>
          </div>
        </div>

        <div class="col-md-6 w-auto">
          <div class="m-2 card shadow rounded border-0">
            <img-comparison-slider>
              <img class="img-fluid" slot="first" src="{{asset($exm->before)}}" />
              <img class="img-fluid" slot="second" src="{{asset($exm->after)}}" />
            </img-comparison-slider>
          </div>
        </div>
      </div>

      @php
      $x = $x+1;
      @endphp
      @endif
      @endforeach
      @endforeach
      @else
      @foreach ($services as $service)
      <div class="mb-5 p-2 col-md-8 row d-flex align-items-center justify-content-center">
        <div class="col-md-6" id="slidertext">
          <h4>{{$service->name}}</h4>
          <p class="text-justify">{{$service->description}}</p>
          <div class="text-center">
            <a class="mb-4 btn btn-info" href="{{url('/service/'.$service->id)}}">Details</a>
          </div>
        </div>

        <div class="col-md-6 w-auto">
          <div class="m-2 card shadow rounded border-0">
            <img-comparison-slider>
              <img class="img-fluid" slot="first" src="{{asset($service->sliderDir1)}}" />
              <img class="img-fluid" slot="second" src="{{asset($service->sliderDir2)}}" />
            </img-comparison-slider>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>

  <div class="d-flex flex-column align-items-center justify-content-center p-5">
    <div>
      <h2 class="display-6 mb-2">How Does It Work?</h2>
    </div>

    <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img class="py-3" src="{{asset('asset/icon/upload-photos.svg')}}" height="120px" width="120px">
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img class="py-3" src="{{asset('asset/icon/write-instructions.svg')}}" height="120px" width="120px">
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img class="py-3" src="{{asset('asset/icon/get-your-photos.svg')}}" height="120px" width="120px">
      </div>
      <div class="d-flex flex-column align-items-center justify-content-center m-4">
        <img class="py-3" src="{{asset('asset/icon/submit-for-revision.svg')}}" height="120px" width="120px">
      </div>
    </div>

    <div class="m-2">
      <p>It’s very easy to start using our online photo editing service! You can do it in just 4 simple steps:</p>
      <ol>
        <li>Create account and upload your photo.</li>
        <li>Write detailed instructions, attach sample photo.</li>
        <li>Get your edited photo back.</li>
        <li>Accept the work or request changes (if necessary).</li>
      </ol>
      <p>Be sure that our professional photography retouchers will follow your photo editing guidelines to create a digital masterpiece for your clients.</p>
    </div>

    <div class="">
      <a class="mr-2 btn btn-primary" href="{{route('photoUpload')}}">Upload Photo</a>
      <a class="mr-2 btn btn-outline-primary" href="{{route('tryFree')}}">Try for Free</a>
    </div>
  </div>

  <div class="p-5 d-flex flex-column align-items-center justify-content-center bg-light bg-gradiant">
    <h2 class="display-6 mb-2 text-center">Photo Retouching Services</h2>

    @foreach ($vdos as $vdo)
    <div>
      <p class="text-justify lead mx-5">{{$vdo->txt}}</p>
    </div>

    <div id="iframe" class="card shadow p-0">
      {!! $vdo->link !!}
    </div>
    @endforeach
  </div>

  <div class="d-flex flex-row flex-wrap justify-content-center p-5">
    <div class="m-4 d-flex flex-column align-items-center justify-content-center" style="height: 100px; width: 300px;">
      <h1 class="text-primary display-1">{{$userCount}}</h1>
      <h5>Total Users</h5>
    </div>
    <div class="m-4 d-flex flex-column align-items-center justify-content-center" style="height: 100px; width: 300px;">
      <h1 class="text-primary display-1">{{$serviceCount}}</h1>
      <h5>Total Services</h5>
    </div>
    <div class="m-4 d-flex flex-column align-items-center justify-content-center" style="height: 100px; width: 300px;">
      <h1 class="text-primary display-1">{{$orderCount}}</h1>
      <h5>Orders Recieved</h5>
    </div>
    <div class="m-4 d-flex flex-column align-items-center justify-content-center" style="height: 100px; width: 300px;">
      <h1 class="text-primary display-1">{{$cOrderCount}}</h1>
      <h5>Photo Edited</h5>
    </div>
  </div>



  <div class="bg-light bg-gradiant p-5 d-flex flex-column align-items-center justify-content-center">
    <div class="m-2 d-flex flex-column align-items-center justify-content-center">
      <div class="text-center mb-2 row d-flex flex-column align-items-center justify-content-center">
        <h3 class="col-md-10 display-6 mb-2">Professional Photo Retouching Services Worldwide</h3>
        <p class="col-md-10">Photographers often ask us where is our photo editing company located and is it possible to work if they are not in the USA. We are online photo editing service that means there are no limits and borders and we can work with photographers from any country and speak any language.</p>
      </div>

      <div class="col-md-10 row">
        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-AUSTRALIA.svg')}}" alt="Australia" height="40px" width="auto">
            <p class="lead"><b>Australia</b></p>
          </div>

          <div>
            <p class="text-justify">From Sydney to Perth and from Adelaide to Darwin we offer professional photo editing help and support. Don’t hesitate to outsource your pictures to retouch up and get all advantages of professional post-production services. New Zealand photographers are welcome to try our digital photo retouching services, we are always happy to work with different cultures and countries adapting to the client’s style and needs.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-BRAZIL.svg')}}" alt="Brazil" height="40px" width="auto">
            <p class="lead"><b>Brazil</b></p>
          </div>

          <div>
            <p class="text-justify">We take much pleasure providing photo retouching services for photographers from Rio de Janeiro, Sгo Paulo, Salvador and other cities in Brazil. Every day we provide professional photo editing services for Brazilian customers who understand what high quality photo art is. If you want you can try any level you like for reasonable rate. We provide only the best service and excellent results.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-CANADA.svg')}}" alt="Canada" height="40px" width="auto">
            <p class="lead"><b>Canada</b></p>
          </div>

          <div>
            <p class="text-justify">Canada is the second destination and we work with Canadian photographers remotely with great success, as you can see from the testimonial below. We have online support on our website (look at the bottom right corner) we you can chat with English or French speaking manager to ask question or discuss details of your photo retouching order. If you are a Canadian photographer from Ottawa, Vancouver, Quebec or Montreal, or live in British Columbia, Manitoba, Alberta. We can list there all Canadian provinces, but let’s say - no matter where exactly you live in Canada - just try our service to get all benefits of outsourced photo editing workflow.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-CHINA.svg')}}" alt="China" height="40px" width="auto">
            <p class="lead"><b>China</b></p>
          </div>

          <div>
            <p class="text-justify">This country has many talented photographers who are interested in growing their photo business by means of our photo retouching services. Since 2013 China photographers work with the digital artists in various direction – starting from basic color correction and artistic edit. China shooters always pay close attention to the smallest details of the photograph and we prove our quality by making their photos naturally edited by means of image post processing services.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-EUROPE.svg')}}" alt="Europe" height="40px" width="auto">
            <p class="lead"><b>Europe</b></p>
          </div>

          <div>
            <p class="text-justify">We are multi languages online photo editing service offering customer support in English, French, German, and Italian. Our website has separate Italian and German versions to meet requirements of European photographers. There are no boundaries in the internet, you can order photo editing services wherever you live. Read testimonials from our happy clients and become of them.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-JAPAN.svg')}}" alt="Japan" height="40px" width="auto">
            <p class="lead"><b>Japan</b></p>
          </div>

          <div>
            <p class="text-justify">Our retouching portfolio consists of pictures made by photographers from Japan. We provide professional photo retouching with personal attitude to each customer which is highly valued by Japanese photo shooters. You can try any image touch up no matter what time is in your town. The great amount of permanent clients are from this country we are proud of having such famous shooters in our client list.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-UK.svg')}}" alt="UK" height="40px" width="auto">
            <p class="lead"><b>United Kingdom</b></p>
          </div>

          <div>
            <p class="text-justify">Our experienced masters work with many portrait and wedding photographers from London, Bristol, Liverpool, Lancaster, Wales and other. UK amateur and professional shooters can take advantage of our photo post production services in all genres and of all levels. FixThePhoto team collaborates with many customers from this beautiful country which artists do not stop surprising us with their outstanding portfolios. We are happy to help them.</p>
          </div>
        </div>

        <div class="col-md-6 pt-2">
          <div class="d-flex flex-row">
            <img src="{{asset('asset/location-point/location-point-USA.svg')}}" alt="USA" height="40px" width="auto">
            <p class="lead"><b>United States of America</b></p>
          </div>

          <div>
            <p class="text-justify">USA is our primary business area. We have built successful collaboration with hundreds of professional and beginner photographers from West to East. Main cities are covered: New York, Los Angeles, San Francisco, Chicago, Houston, Boston, Atlanta, Philadelphia, Denver, Miami, Seattle, San Diego, and photographers from smaller towns also have highly appreciated our photo retouching services. You can read reviews and testimonials from our USA clients, many of them are posted on our Facebook page by real photographers who have used our photo editing services.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="p-5">
    <div class="d-flex flex-row flex-wrap align-items-center justify-content-center m-5">
      @for ($i = 1; $i <= 12; $i++) @php $imgsrc='asset/toolsImg/' .$i.'.png'; @endphp <img class="m-4" src="{{$imgsrc}}" width="150px" height="auto">
        @endfor
    </div>
  </div>

  <div class="bg-light bg-gradiant p-5 text-center">
    <p class="display-6">About</p>
    @foreach ($about as $data)
    <p class="lead mx-4 text-justify">{{$data->txt}}</p>
    @endforeach

    <div class="mx-4 d-flex flex-column align-items-center justify-content-center row">
      @foreach ($milestones as $mlst)
      <div class="col-md-6 row mb-1 d-flex flex-row  align-items-center justify-content-center" id="mlst">
        <div class="col-md-1 lead" id="mYear">{{$mlst->year}}</div>
        <div class="col-md-1" id="mDot"><span class="dot"></span></div>
        <div class="col-md-9 d-flex flex-column" id="mHead">
          <a class="text-black lead" data-bs-toggle="collapse" href="#collapseExample{{$mlst->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">{{$mlst->heading}}</a>

          <div class="collapse lead border-left my-2 px-2" id="collapseExample{{$mlst->id}}">
            {{$mlst->details}}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>


  <div class="p-5">
    <p class="display-6 text-center">Gallery</p>
    <div class="my-4 d-flex align-items-center justify-content-center row" id="gall">
      @foreach ($limitedExamples as $lx)
      <div class="modal" id="modal{{$lx->id}}">
        <div class="modal-dialog-centered">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title">{{$lx->service}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
              <div class="mb-2 row d-flex align-items-center justify-content-center">
                <img class="mb-1 rounded col-md-6" src="{{asset($lx->before)}}" height="auto" width="auto">
                <img class="mb-1 rounded col-md-6" src="{{asset($lx->after)}}" height="auto" width="auto">
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="m-1 border-0 rounded bg-transparent col-md-3" data-toggle="modal" data-target="#modal{{$lx->id}}">
        <div class="d-flex flex-column align-items-center justify-content-center">
          <img class="m-0 p-0 border-0 rounded" src="{{asset($lx->after)}}" height="100%" width="100%">
        </div>
      </button>
      @endforeach
    </div>

    <div class="mt-3 text-center">
      <a class="btn btn-outline-primary" href="{{route('examples')}}">More Samples</a>
      <a class="btn btn-outline-primary" href="{{route('pricing')}}">View Packages</a>
    </div>
  </div>

  {{-- @if ($reviewCount > 0)
  <div class="p-5 bg-light bg-gradiant">
    <p class="display-6 text-center">Reviews</p>
    <div class="row d-flex align-items-start justify-content-center">
      @foreach ($reviews as $rev)
      <div class="col-md-4 p-3">
        <div class="border rounded p-3">
          <div class="d-flex flex-row align-items-center justify-content-start">
            <img class="" src="{{asset($rev->reviewerImg)}}" alt="{{$rev->reviewBy}}" height="50px" width="50px">
            <p class="m-2 pl-2" style="font-size: 22px;">{{$rev->reviewBy}}</p>
          </div>
          <p class="lead m-1">{{$rev->service}}</p>
          <p class="border-top m-2 text-justify" style="font-size: 18px;">{{$rev->review}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif --}}


  <style>
    .testimonial-reel .testimonial-person img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
    }

    .testimonial-reel .testimonial-person h2 {
      margin-top: 18px;
      font-weight: 600;
      margin-bottom: 0;
    }

    .testimonial-reel .testimonial-person small {
      font-size: 16px;
      color: #07a6ca !important;
    }

    .testimonial-reel .testimonial-review {
      text-align: center;
      font-size: 16px;
    }

    .slick-slide {
      padding: 12px !important;
    }
  </style>


  <!-- Testimonial Carousel -->
  <div class="testimonial-reel py-5 bg-light bg-gradiant">
    <div class="container">

      <div class="section-title text-center mb-5">
        <h1>Reviews</h1>
      </div>

      <!-- Testimonial -->
      <div class="carousel">

        @if ($reviewCount > 0)

        @foreach ($reviews as $rev)
        <div class="card shadow">
          <div class="card-body">
            <div class="text-center testimonial-person mb-3">
              <img src="{{asset($rev->reviewerImg)}}" alt="" class="img-fluid d-block mx-auto shadow">
              <h2>{{$rev->reviewBy}}</h2>
              <small>( {{$rev->service}} )</small>
            </div>
            <div class="testimonial-review">
              <p class="fw-normal">{{$rev->review}}</p>

              <div class="ratings mt-3 mx-auto" data-rating="{{ $rev->rating }}"></div>

            </div>
          </div>
        </div>
        @endforeach

        @endif



      </div>
      <!-- / Testimonial -->

    </div>
  </div>
  <!-- / Testimonial Carousel -->


  <style>
    .comment-wrap .ratings {
      font-size: 28px;
    }
  </style>



  <!-- User Comment -->
  <section class="comment-section py-5">
    <div class="container">

      <div class="section-title text-center mb-5">
        <h1>Comments</h1>
      </div>




      <div class="comment-wrap">
        <form action="{{route('addingReview')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">

            <input class="form-control" type="email" name="postBy" id="postBy" value="{{Auth::user()->email ?? null}}" required hidden readonly>


            <div class="col-12 mb-3">
              <h4>Ratting</h4>
              <div class="ratings mb-3" data-rating="0"></div>
              <input type="hidden" name="rating" id="ratingInput">
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="reviewBy">Full Name</label>
                <input type="text" name="reviewBy" placeholder="Enter Your Full Name" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="service">Service </label>
                <select class="form-control" name="service" id="service" required>
                  <option value="" selected hidden>Choose service</option>
                  @foreach ($services as $service)
                  <option value="{{$service->name}}">{{$service->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Your Photo</label>
                <input class="form-control" type="file" accept="image/png, image/jpeg" name="reviewerImg" id="reviewerImg" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label for="name">Review</label>
                <textarea name="review" cols="30" rows="4" class="form-control" placeholder="Enter Your Review" required></textarea>
              </div>
            </div>



            @if (Auth::check() && Auth::user())
            <button class="btn btn-success d-block">Submit Now</button>
            @else
            <span class="text-danger text-center">Login & Try Again</span>
            @endif


          </div>






        </form>
      </div>


    </div>
  </section>
  <!-- User Comment -->




  <div>
    @include('layouts.footer')
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script>
    initComparisons();
  </script>
</body>
<style>
  .collapse.in {
    display: inline !important;
  }

  #topDiv {
    margin: 120px 25px 25px 25px;
  }

  img-comparison-slider img {
    width: 500px;
    height: auto;
    border-radius: 5px;
  }

  #iframe iframe {
    border-radius: 5px;
    height: 500px;
    width: 60vw;
  }

  #gall button img:hover {
    border: 2px solid black;
    box-shadow: 0 0 10px rgb(78, 78, 78);
  }

  #mYear {
    text-align: right;
  }

  #mHead {
    text-align: left;
  }

  .dot {
    height: 15px;
    width: 15px;
    background-color: #f7b500;
    border-radius: 50%;
    display: inline-block;
  }

  @media(max-width:770px) {
    #topDiv {
      margin: 10px 20px 20px 20px;
    }

    #slidertext {
      text-align: center;
    }

    img-comparison-slider img {
      width: 100%;
      height: auto;
    }

    #iframe iframe {
      height: auto;
      width: 100%;
    }

    #mYear {
      text-align: left;
      font-weight: bold;
    }

    #mDot {
      display: none;
      visibility: hidden;
    }

    #mHead {
      text-align: left;
    }

    #mlst {
      margin: 2px;
      padding: 2px;
      border-radius: 5px;
      border: 1px solid gray;
    }
  }
</style>

</html>