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

        @includeIF("moon::partial.navbar")

        <article class="{{$moon_container}}">
            <section class="{{$moon_wrapp}}">
                <article class="bg-white rounded-1 shadow-sm mt-5 mx-auto p-3" style="max-width: 420px;">
                    <h4>Login</h4>
                    <form action="#">
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

                        <div class="form-floating mb-2">
                            <input type="password"
                                name="password"
                                value="{{old('password')}}"
                                placeholder="{{__('words.password')}}" 
                                class="form-control"
                                id="fieldEmail">
                            <label for="fieldEmail">{{__('words.password')}}</label>
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
