@extends("moon::master")
    
    @section("body")

        <article class="bg-white rounded-1 shadow-sm mt-5 mx-auto p-3" style="max-width: 420px;">
            
            <h4 class="pt-2 m-0">
                <span class="mdi mdi-login"></span>
                Login
            </h4>

            {!! Alert::form( $errors ) !!}

            <form action="{{__url('{current}')}}" method="POST">
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
                <div class="py-2">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary px-3">
                        {{__("words.logon")}}
                    </button>
                </div>
            </form>
        </article>
    @endsection