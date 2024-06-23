@extends($skin->path("admin"))

    @section("nav")    

    <div class="widget">

        <div class="header text-center p-2 bg-secondary">
            <img src="{{__url($user->getAvatar())}}" alt="@"
                class="avatar avatar-circle">
        </div>

        {!! Nav::tag("users-nav") !!}
    </div>
    @endsection

    @section("content")
    <article class="row m-auto">
        <nav class="col-lg-4 col-md-5 col-sm-5 bg-white">
            MM | nn
        </nav>
    </article>
    @endsection