@extends("malla::admin.users.profile.layout")

    @section("content")

        <h4 class="fs-4 mb-3">{{__("update.password")}}</h4>

        <article class="bg-white rounded-1 p-3">
            <h4>{{__("words.form")}}</h4>

            <form action="{{__url('{current}')}}" method="POST">

                {!! Alert::form( $errors ) !!}

                <div class="form-floating mb-2">
                    <input type="password" name="password"
                        value="{{old('password')}}" 
                        class="form-control"
                        placeholder="{{__('words.password')}}"
                        autocomplete="of">
                    <label for="password">{{__("words.password")}}</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="password" name="rpassword"
                        value="{{old('rpassword')}}" 
                        class="form-control"
                        placeholder="{{__('confirm.password')}}"
                        autocomplete="of">
                    <label for="password">{{__("confirm.password")}}</label>
                </div>

                @csrf
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                        {!! mdi("reload") !!} {{__("words.update")}}
                    </button>
                </div>
            </form>
        </article>
    @endsection