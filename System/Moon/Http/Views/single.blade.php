<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        @section("css")

        <link href="{{__url('{moon}/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('{moon}/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <link href="{{__url('{moon}/css/layout.ui.css')}}" rel="stylesheet">
        @show

    </head>

    <body role="lighter">

        @yield("body", "Body Content") @section("js")

        <script src="{{__url('{moon}/js/jquery-371.min.js')}}"></script>
        <script src="{{__url('{moon}/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{__url('{moon}/js/layout.ui.js')}}"></script>        
        @show
        
    </body>
</html>
