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
        <nav class="navbar navbar-moon bg-white navbar-expand-md shadow-sm fixed-top p-0 px-3">
            
            <a href="{{__url('{mainbar}')}}" class="navbar-brand px-3">
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
                        <a href="getmembership" class="btn btn-sm bg-success-subtle link-success rounded-pill mt-1 me-1 px-3">
                            <span class="mdi mdi-gift"></span>
                            {{__("auth.getmembership")}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="login" class="btn btn-sm btn-light rounded-pill mt-1 px-3">
                            <span class="mdi mdi-login"></span>
                            {{__("auth.login")}}
                        </a>
                    </li>
                </ul>
            </div>
            
        </nav>

        <article class="{{$moon_container}}">
            <section class="{{$moon_wrapp}}">
                <article class="bg-white rounded-3 shadow-sm mt-5 mx-auto p-3">
                    <h4 class="py-2">
                        <span class="mdi mdi-gift-outline"></span>
                        {{__("account.getmembership")}}
                    </h4>

                    <form action="#">

                        <div class="form-floating mb-2">
                            <input type="text"
                                name="fullname"
                                value="{{old('fullname')}}"
                                placeholder="{{__('words.fullname')}}" 
                                class="form-control"
                                autocomplete="off"
                                id="fieldEmail">
                            <label for="fieldEmail">{{__('words.fullname')}}</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email"
                                name="email"
                                value="{{old('email')}}"
                                placeholder="{{__('words.email')}}" 
                                class="form-control"
                                autocomplete="off"
                                id="fieldEmail">
                            <label for="fieldEmail">{{__('words.email')}}</label>
                        </div>

                        <div class="mby-2">
                            @csrf
                            <button class="btn btn-sm btn-primary">
                                <span class="mdi mdi-send-outline"></span>
                                {{ __("words.request") }}
                            </button>
                        </div>
                    </form>
                </article>
            </section>
        </article>

        @section("js")

        <script src="{{__url('{moon}/js/jquery-371.min.js')}}"></script>
        <script src="{{__url('{moon}/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{__url('{moon}/js/layout.ui.js')}}"></script>        
        @show
        
    </body>
</html>
