<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>

<body>
    <div>
        @include('layouts.app')
    </div>

    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    
                </div>
            </div>
        </div>
    </section>

    <div>
        <br>
        @include('layouts.footer')
    </div>
</body>
<style>
    #topDiv {
        margin: 120px 25px 25px 25px;
    }

    @media(max-width:770px) {
        #topDiv {
            margin: 10px 20px 20px 20px;
        }
    }
</style>

</html>