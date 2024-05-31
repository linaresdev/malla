@extends("moon::master")

    @section("body")
        
        <nav class="moon-nav border-end z-3">            
            <div class="moon-nav-body">
                {!! Nav::tag("main-nav") !!}
            </div>
        </nav>

        <article class="moon-body">

           @for($i=0; $i < 10; $i++)
            <div class="d-flex mb-3">
                <div class="bg-secondary ratio ratio-4x3 me-2">
                </div>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Alias maxime fugit soluta animi culpa numquam perferendis
                    optio rerum quis, voluptatem laudantium quae ipsam. 
                    Repudiandae qui recusandae architecto deleniti est alias?
                </div>
            </div>
        @endfor
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