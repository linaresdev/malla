

        <div class="alert alert-slow p-0 my-1">
            @foreach($errors as $error )
            <div style="font-size: .9rem;" class="text-danger">
                {{$error}}
            </div>
            @endforeach
        </div>