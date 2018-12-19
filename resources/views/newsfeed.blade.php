<?php
    use App\Utils;
    use App\User;
    use App\Thread;
    use App\Post;
?>
<!doctype html>
<html>
    <head>

        {{-- Meta section --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Link section --}}
        <base href="{{ URL::to('/') }}">
        <link rel="icon" href="{{ URL::to('img/favicon.png') }}">

        {{-- Title --}}
        <title>Envienta Threads</title>

        <!-- CSS - CDN's -->
        <link href="https://fonts.googleapis.com/css?family=Armata|Days+One" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

        <!-- Boostrap v4.0 -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{{ URL::to('css/bootstrap_4.1.0.min.css') }}" type="text/css">

        <!-- Font-Awesoem v5.2.0 -->
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/brands.css">
        <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="css/light.css">
        <link rel="stylesheet" type="text/css" href="css/regular.css">
        <link rel="stylesheet" type="text/css" href="css/solid.css">
        <link rel="stylesheet" type="text/css" href="css/svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="css/v4-shims.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" type="text/css">

        <!-- Js libraries -->
        {{--<script src="{{ URL::to('js/bootstrap-typeahead.min.js') }}"></script>--}}

        <!-- Mobi assets -->
        <link rel="stylesheet" href="{{ URL::to('assets/web/assets/mobirise-icons/mobirise-icons.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/tether/tether.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/bootstrap/css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/bootstrap/css/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/socicon/css/styles.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/dropdown/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/theme/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/mobirise/css/mbr-additional.css') }}" type="text/css">

        {{-- jQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
        <div>
            <?php $EXTRAJS = ""; global $EXTRAJS; ?>

            @include('skeleton')

            <!-- extrajs -->
            <?php echo $EXTRAJS; ?>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>
