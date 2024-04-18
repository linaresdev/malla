@extends("moon::master")

    @section("body")
        
        <nav class="moon-nav border-end">

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
        </nav>
        <article class="moon-body">
            @for($i=0; $i<=4; $i++)
            <div class="bg-primary-subtle p-4 rounded-1 mb-2">
                <h1 class="fs-2">Title</h1>
                <p class="lead">
                    Texto a mostrar en el banner de la pagina
                </p>
                <a href="#" class="btn btn-lg btn-primary">
                    Enlace a una parte
                </a>
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