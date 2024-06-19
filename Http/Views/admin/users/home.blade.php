@extends($skin->path("admin"))

    @section("content")  

    <article class="py-4 bg-white rounded-1">
        <div class="row px-4 mb-3"> 
            <div class="col-lg-4"> 
                <div class="btn-group">
                    <a href="#" class="btn btn-light px-3 active">
                    {!! mdi("account-plus mdi-20px") !!} {{__("words.new")}}
                    </a>
                    <a href="#" class="btn btn-light px-3">
                        {!! mdi("account-group mdi-20px") !!} {{__("words.groups")}}
                    </a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="d-flex">   
                    <!-- FILTRO -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle"
                            data-bs-toggle="dropdown">
                            {!! mdi('filter mdi-24px') !!} 
                            {{ __("words.".config('users.lists.filter')) }}
                        </button>
                        <div style="min-width: 0;" class="dropdown-menu">
                            @foreach($filters as $filter )
                            <form action="{{__url('setting/config')}}" method="POST">
                                @csrf                                 
                                <input type="hidden" name="key" value="users.lists.filter">
                                <input type="hidden" name="value" value="{{$filter}}">

                                <button type="submit" class="dropdown-item">
                                    @if( $filter == config("users.lists.filter") )
                                    {!! mdi("checkbox-marked-outline") !!} 
                                    @else
                                    {!! mdi("checkbox-blank-outline") !!} 
                                    @endif

                                    {{__("words.$filter")}}
                                </button>
                            </form>
                            @endforeach
                        </div>
                    </div>

                    <!-- SEARCH -->
                    <div class="flex-fill dropdown mx-2">
                        <input type="text" 
                            class="form-control rounded-pill dropdown-toggle" 
                            onKeyup="queryData(this)"
                            data-bs-toggle="dropdown">
                        
                        <div class="dropdown-menu w-100 droplists">
                            <div class="p-1 text-center">
                                Buscando
                            </div>
                        </div>
                    </div>
                      

                    <!-- ITEMS -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle"
                            data-bs-toggle="dropdown">
                            {!! mdi('format-list-numbered mdi-24px') !!} {{$perpage}}
                        </button>
                        <div style="min-width: 0;" class="dropdown-menu">
                            @foreach([10,25,50,100] as $row )
                            <form action="{{__url('setting/config')}}" method="POST">
                                @csrf                                 
                                <input type="hidden" name="key" value="users.lists.perpage">
                                <input type="hidden" name="value" value="{{$row}}">

                                <button type="submit" class="dropdown-item">
                                    @if( $row == $perpage )
                                    {!! mdi("checkbox-marked-outline") !!} 
                                    @else
                                    {!! mdi("checkbox-blank-outline") !!} 
                                    @endif
                                    {{$row}}
                                </button>
                            </form>
                            @endforeach
                        </div>
                    </div> 

                </div>
            </div>
        </div>

        
        <div class="bg-light">
        @includeIF("malla::admin.users.partial.lists")
        </div>
        

        <div class="px-4">
        {{ $users->onEachSide(5)->links() }}
        </div>
    </article>
    @endsection

    @section("js")
        @parent <script>

            function box(e) {
                jQuery(".box").html(e.value);
            }
            
            function queryData( data ) 
            {
                jQuery.get("{{__url('admin/users/search')}}/"+data.value, function( data ){
                    jQuery(".droplists").html(data);
                });              
            } 
        </script>
    @endsection