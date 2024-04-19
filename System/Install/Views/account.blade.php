<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        @section("css")

        <link href="{{__url('{cdn}/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('{cdn}/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <style rel="stylesheet">
            body{
                background: #f3f3f3;
                padding-top: 64px;
            }
        </style>
        @show

    </head>
    <body>
        <main class="container">
            <article class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
                <h4 class="mb-4">
                    <span class="mdi mdi-account-circle"></span>
                    {{$title}}
                </h4>

                
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos at culpa amet sint a temporibus odio dicta iste reiciendis, officia cum officiis laborum praesentium fugit labore accusantium laboriosam placeat! Aut!
                
            </article>
        </main>
    </body>
    @section("js")

    <script type="text/javascript" src="{{__url('{cdn}/js/jquery-371.min.js')}}"></script>
    <script type="text/javascript" src="{{__url('{cdn}/js/bootstrap.bundle.min.js')}}"></script>     
    @show
</html>