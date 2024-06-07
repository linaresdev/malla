@extends($skin->path("admin"))

    @section("content")

    <article class="row mb-3">
        <section class="col-lg-5">

            <div class="btn-group">
                <a href="#" class="btn btn-outline-secondary btn-sm px-3">
                {!! mdi("account-plus mdi-20px") !!} {{__("words.new")}}
                </a>
                <a href="#" class="btn btn-outline-secondary btn-sm px-3">
                    {!! mdi("account-group mdi-20px") !!} {{__("words.groups")}}
                </a>
            </div>
        </section>
        <section class="col">
            
        </section>
    </article>

    <article class="mb-3">
        <div class="input-group">
            <button class="btn btn-outline-secondary"></button>

            <input type="text" class="form-control">
            
            <button class="btn btn-outline-secondary dropdown-toggle"
                data-bs-toggle="dropdown">
                {!! mdi("filter") !!}
            </button>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">
                    {!! mdi("checkbox-blank-circle-outline") !!} 
                    {{__("words.all")}} 
                </a>

                <h4 class="dropdown-header ps-2">
                    {!! mdi("filter mdi-18px") !!} 
                    {{__("filter.state")}} :
                </h4>                
                @for( $i=0; $i<=4; $i++ )
                <a href="#" class="dropdown-item">
                    {!! mdi("checkbox-blank-circle-outline") !!} 
                    {{trans_choice("user.state.$i", 1)}} 
                </a>
                @endfor
            </div>            
        </div>
    </article>

    <article class="p-4 bg-white rounded-1">
        <table class="table table-sm align-middle">
            <thead>
                <tr>
                    <th width="40" class="text-center">#</th>
                    <th>Nombre</th>
                    <th class="text-center">Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $users as $user )
                <tr>
                    <td width="40" class="text-center">
                        <input type="checkbox" class="form-check-input">
                    </td>
                    <td>
                        {{$user->fullname()}}
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light rounded-pill px-3 py-0 dropdown-toggle"
                                data-bs-toggle="dropdown">
                                {{trans_choice("user.state.$user->activated", 1)}}
                            </button>
                            <div class="dropdown-menu">
                                @for( $i=0; $i<=4; $i++ )
                                @if( $i != $user->activated)
                                <a href="{{__url('{user}/set-state/'.$i)}}" 
                                    class="dropdown-item">                                    
                                    <span class="mdi mdi-checkbox-blank-circle-outline"></span>
                                    {{trans_choice("user.state.$i", 0)}}                                    
                                </a>
                                @else
                                <a href="#" class="dropdown-item">                                   
                                    <span class="mdi mdi-checkbox-marked-circle-outline"></span>
                                    {{trans_choice("user.state.$i", 1)}}                                    
                                </a>
                                @endif
                                @endfor
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="dropdown dropstart">
                            <button class="btn btn-sm btn-slim p-0 rounded-pill dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="mdi mdi-progress-wrench mdi-24px"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">
                                    Link
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    @endsection