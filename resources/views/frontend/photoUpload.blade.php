<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Your Photo</title>
</head>
<body>
    <div>
        @include('layouts.app')
    </div>

    <div class="text-center" id="topDiv">
        <h1 class="display-4">PhotoFixedS</h1>
        <h4><i>Photo Editing Service</i></h4>
        <p class="m-4" style="font-size: 18px;">We are providing one of the best photo editing service. We will make your photo look good and professionally edited. According to your instructions and preferences, our editors will enhance texture, remove all unwanted imperfections making your photo look realistically better. First upload your photo, write your preferences or instructions. The rest is up to us.</p>

        <div class="m-1 row d-flex flex-column align-items-center justify-content-center">
            @if (Session::has('sess'))
                <p class="alert alert-info" style="font-weight:bold;">{{ Session::get('sess') }}</p>
            @endif

            <div class="d-flex flex-column align-items-center justify-content-center p-1">
                <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center justify-content-center m-4">
                        <img class="py-3" src="asset/icon/upload-photos.svg" height="120px" width="120px">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center m-4">
                        <img class="py-3" src="asset/icon/write-instructions.svg" height="120px" width="120px">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center m-4">
                        <img class="py-3" src="asset/icon/get-your-photos.svg" height="120px" width="120px">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center m-4">
                        <img class="py-3" src="asset/icon/submit-for-revision.svg" height="120px" width="120px">
                    </div>
                </div>
        
                <div class="m-2 text-left">
                    <p>It’s very easy to start using our online photo editing service! You can do it in just 4 simple steps:</p>
                    <ol>
                        <li>Create account and upload your photo.</li>
                        <li>Write detailed instructions, attach sample photo.</li>
                        <li>Get your edited photo back.</li>
                        <li>Accept the work or request changes (if necessary).</li>
                    </ol>
                    <p>Be sure that our professional photography retouchers will follow your photo editing guidelines to create a digital masterpiece for your clients.</p>
                </div>
            </div>

            @if ($theUser == NULL)
                <div class="alert alert-dark">
                    <p class="text-black">You need to be logged in to upload photo.</p>
                    <a class="btn btn-dark" href="{{route('login')}}">Login</a>
                </div>
            @else
                <div class="p-3 card shadow text-left col-md-6">
                    <form action="{{route('photoUploading')}}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf

                        <p class="lead text-center border-bottom pb-2 m-2" style="font-size: 26px;"><b>Upload Photo</b></p>
                        
                        @error('title')
                          <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                        @enderror
                        
                        <input class="form-control" type="text" name="uid" id="uid" value="{{$theUser->id}}" readonly hidden required>
                        <input class="form-control" type="text" name="uemail" id="uemail" value="{{$theUser->email}}" readonly hidden  required>
                        @if ($theUser->freeUsed == NULL)
                            <input class="form-control" type="text" name="freeOrder" id="freeOrder" value="Yes" readonly hidden required>
                        @else
                            <input class="form-control" type="text" name="freeOrder" id="freeOrder" value="No" readonly hidden required>
                        @endif

                        <div class="col-md-12 mb-3">
                            <label for="title">Title: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter a title (Max 50 characters)" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="service">Service: <span class="text-danger">*</span></label>
                            <select class="form-control" name="service" id="service">
                                <option value="" selected hidden>Select a service</option>
                                @foreach ($services as $serv)
                                    <option value="{{$serv->id}}">{{$serv->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="photo">Photo: <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="photo" id="photo" accept=".png, .jpeg, .jpg, .zip, .rar, .7z, .gz, .tar" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="preferences">Preferences: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="preferences" id="preferences" cols="30" rows="5" placeholder="Enter your preferenceas" required></textarea>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary m-2" type="submit" name="upload" id="upload">Upload</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    #topDiv{
        margin: 120px 25px 25px 25px;
    }
    @media(max-width:770px){
        #topDiv{
            margin: 10px 20px 20px 20px;
        }
    }
</style>
</html>