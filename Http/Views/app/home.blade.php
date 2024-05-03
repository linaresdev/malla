@extends("moon::master")

    @section("body")


        <article class="row mb-3">
            
            <section class="col-lg-8 col-md-8 bg-secondary text-white py-4 rounded-1">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Aliquam tenetur sed officiis illum debitis, fuga tempore. 
                    Id voluptates blanditiis explicabo dolorum. Placeat expedita 
                    iste at culpa vero voluptatem ex vel.
                </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Aliquam tenetur sed officiis illum debitis, fuga tempore. 
                    Id voluptates blanditiis explicabo dolorum. Placeat expedita 
                    iste at culpa vero voluptatem ex vel.
                </p>
            </section>
            <aside class="col-lg-4 col-md-4 px-0 py-3">
                <div class="p-3 bg-white">
                    <img src="{{__url('{moon}/images/header/rlinares.jpg')}}" 
                        style="width:100%;" alt="@">
                </div>
            </aside>
        </article>

        <article class="row">
            <section class="col-lg-8 col-md-8 p-0">
                
                <article class="bg-white py-3">
                    <h4 class="px-3">Title</h4>
                    <div class="px-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Cupiditate modi quos harum magni voluptate commodi 
                        debitis tempora laborum ex maxime aspernatur labore, 
                        eligendi consectetur a mollitia eum illo vitae iusto.
                    </div>
                </article>
            </section>
            <aside class="col-lg-4 col-md-4">
                <h4>Nav</h4>
                <div class="nav flex-column">
                    <a href="#" class="nav-link">Hola 1</a>
                    <a href="#" class="nav-link">Hola 2</a>
                    <a href="#" class="nav-link">Hola 3</a>
                </div>
            </aside>
        </article>

    
    @endsection