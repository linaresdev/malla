<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        @section("css")

        <link href="{{__url('{cdn}/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('{cdn}/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <style rel="stylesheet">
            body{
                background: #f3f3f3;
                padding-top: 64px;
            }
        </style>
        @show

    </head>
    <body>
        <main class="container">
            <article class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
                <h4 class="mb-4">
                    <span class="mdi mdi-database"></span>
                    {{$title}}
                </h4>

                @if( !Malla::app("store")->has("apps") )
                <article class="d-flex align-items-center bg-primary-subtle">
                    <div class="p-3">
                        <a href="{{__url('database/migrate/install')}}" class="btn btn-sm btn-primary">
                            <span class="mdi mdi-database-import-outline mdi-18px"></span>
                            {{ __('Migrar a hora') }}
                        </a>
                    </div>
                    <div class="p-3">
                        <h4 class="fw-bold fs-5">
                            {{__("Migraciones")}}
                        </h4>
                        {{__("Migraciones pendientes para instalar")}}
                    </div>
                </article>
            
                @else
                <article class="d-flex bg-white mb-3">
                    <div class="p-3">
                        <div class="">
                            
                            <a href="{{__url('database/migrate/reset')}}" class="btn btn-sm btn-secondary">
                                <span class="mdi mdi-table-refresh mdi-18px"></span>
                                {{__("Reset")}}
                            </a>

                            <a href="{{__url('database/migrate/refresh')}}" class="btn btn-sm btn-secondary">
                                <span class="mdi mdi-database-sync mdi-18px"></span>
                                {{__("Refrescar")}}
                            </a>
                            <a href="{{__url('database/migrate/delete')}}" class="btn btn-sm btn-danger">
                                <span class="mdi mdi-database-remove mdi-18px"></span>
                                {{__("Eliminar")}}
                            </a>                        
                        </div>
                    </div>

                    <div class="p-3 flex-grow-1 text-end">
                        <a href="#" class="btn btn-sm btn-primary">
                            <span class="mdi mdi-seed mdi-18px"></span>
                            {{__("Lanzar las semillas")}}
                        </a>
                    </div>
                </article>

                <article class="bg-white p-0">
                    <table class="table table-hover table-borderless">
                        <thead> 
                            <tr>
                                <th class="bg-primary-subtle">{{__("Tipo")}}</th>
                                <th class="bg-primary-subtle">{{__("Nombre")}}</th>
                                <th class="bg-primary-subtle">{{__("Descripcion")}}</th>
                                <th class="bg-primary-subtle">{{__("Driver")}}</th>
                                <th class="bg-primary-subtle text-center">{{__("Estado")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apps as $app)
                            <tr>
                                <td class="py-0 pt-1">{!! $icon($app->type) !!}</td>
                                <td>{{$app->info->name()}}</td>
                                <td>{{$app->info->description()}}</td>
                                <td>{{$app->driver}}</td>
                                <td class="text-center">
                                    @if($app->activated)
                                    <span class="mdi mdi-check-circle-outline"></span>
                                    @else
                                    <span class="mdi mdi-checkbox-blank-circle-outline"></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
                @endif

                <article class="bg-white p-3 text-center">
                    <a href="{{__url('env')}}" class="btn btn-sm btn-primary">
                        << {{__("Retroceder")}}
                    </a>
                    <a href="{{__url('end')}}" class="btn btn-sm btn-success">
                        {{__("Finalizar")}} >>
                    </a>
                </article>
            </article>
        </main>
    </body>
    @section("js")

    <script type="text/javascript" src="{{__url('{cdn}/js/jquery-371.min.js')}}"></script>
    <script type="text/javascript" src="{{__url('{cdn}/js/bootstrap.bundle.min.js')}}"></script>     
    @show
</html>