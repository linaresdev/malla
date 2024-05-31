@extends("moon::master")

    @section("body")

    <article class="bg-white">
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
    @endsection