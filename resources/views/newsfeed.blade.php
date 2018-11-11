<!doctype html>
<html>
    <head>

        {{-- Meta section --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Link section --}}
        <base href="{{ URL::to('/') }}">
        <link rel="icon" href="{{ URL::to('img/favicon_img.jpg') }}">

        {{-- Title --}}
        <title>Envienta Platform</title>

        <!-- CSS - CDN's -->
        <link href="https://fonts.googleapis.com/css?family=Armata|Days+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

        <!-- Boostrap v4.0 -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{{ URL::to('css/bootstrap_4.1.0.min.css') }}" type="text/css">

        {{-- jQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
        <div>
	
	@include('post')
	
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>
