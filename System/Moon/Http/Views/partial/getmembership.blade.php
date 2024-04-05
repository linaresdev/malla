@extends("moon::master")
    
    @section("body")
        <article class="bg-white rounded-3 shadow-sm mt-5 mx-auto p-3">

            <h4 class="py-2">
                <span class="mdi mdi-gift-outline"></span>
                {{__("account.getmembership")}}
            </h4>

            @if($errors->any())
            <ul class="form-error">
                @foreach($errors->all() as $error )
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif

            <form action="{{__url('{current}')}}" method="POST">

                <div class="form-floating mb-2">
                    <input type="text"
                        name="firstname"
                        value="{{old('firstname')}}"
                        placeholder="{{__('words.firstname')}}" 
                        class="form-control"
                        autocomplete="off"
                        id="fieldFierstname">
                    <label for="fieldFierstname">{{__('words.firstname')}}</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text"
                        name="lastname"
                        value="{{old('lastname')}}"
                        placeholder="{{__('words.lastname')}}" 
                        class="form-control"
                        autocomplete="off"
                        id="fieldLastname">
                    <label for="fieldLastname">{{__('words.lastname')}}</label>
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
                    <button class="btn btn-sm btn-primary px-3">
                        <span class="mdi mdi-send-outline"></span>
                        {{ __("words.request") }}
                    </button>
                </div>
            </form>
        </article>
       
    @endsection