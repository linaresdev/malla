@extends("moon::master")

    @section("body")
        
        <nav class="moon-nav border-end z-3">            
            <div class="moon-nav-body">
                {!! Nav::tag("main-nav") !!}
            </div>
        </nav>

        <article class="moon-body">
            
            @yield("content")
          
        </article>

        <aside class="moon-aside border-start">            
            <h4>Title</h4>
            
            <div class="moon-nav-body">
                <ul class="nav flex-column">
                    @for($i=0; $i<=4; $i++)
                    <li class="nav-item">
                        <a href="#" class="nav-link px-3 py-1 border-bottom">
                            <span class="mdi mdi-link"></span> Link
                        </a>
                    </li>
                    @endfor
                </ul>
            </div>
        </aside>
    @endsection