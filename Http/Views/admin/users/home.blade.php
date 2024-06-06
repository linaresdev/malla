@extends($skin->path("admin"))

    @section("content")

    <article class="p-4 bg-white rounded-1">
        <table class="table table-sm align-middle">
            <thead>
                <tr>
                    <th width="40" class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Estado</th>
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary rounded-pill btn-sm px-3 dropdown-toggle"
                                data-bs-toggle="dropdown">
                                Drople
                            </button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">
                                    Link
                                </a>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    @endsection