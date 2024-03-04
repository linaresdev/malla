<!DOCTYPE html>
<html lang="{{$lang}}">
    <head>
        <meta charset="{{$charset}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        @section("css")

        <link href="{{__url('{moon}/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('{moon}/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <link href="{{__url('{moon}/css/layout.ui.css')}}" rel="stylesheet">
        @show

    </head>

    <body role="lighter">
        <nav class="navbar navbar-moon bg-body-tertiary navbar-expand-md shadow-sm fixed-top p-0 px-3">
            
                <a href="{{__url('{mainbar}')}}" class="navbar-brand px-3 bg-danger link-light">
                    Linares
                </a>
                <button class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mainBar" 
                        aria-controls="mainBar" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mainBar" class="collapse navbar-collapse">
                    <ul class="nav ms-auto">
                        <li class="nav-item">
                            <a href="getmembership" class="nav-link">
                                <span class="mdi mdi-gift"></span>
                                {{__("auth.getmembership")}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="login" class="btn btn-sm btn-outline-primary rounded-pill mt-1 px-3">
                                <span class="mdi mdi-login"></span>
                                {{__("auth.login")}}
                            </a>
                        </li>
                    </ul>
                </div>
            
        </nav>

        <article class="{{$container}}">
            @yield("body", "Body Content") @section("js")
        </article>

        <script src="{{__url('{moon}/js/jquery-371.min.js')}}"></script>
        <script src="{{__url('{moon}/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{__url('{moon}/js/layout.ui.js')}}"></script>        
        @show
        
    </body>
</html>
