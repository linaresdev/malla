@extends("malla::admin.users.profile.layout")

    @section("content")

        <h4 class="fs-4 mb-3">{{__("update.credential")}}</h4>

        <article class="bg-white rounded-1 mb-3 p-3">
            <h4>{{__("words.account")}}</h4>

            <form action="{{__url('{current}')}}" method="POST">

                {!! Alert::tagged("account") !!}

                <div class="form-floating mb-2">
                    <input type="email" name="email"
                        value="{{old('email', $user->email)}}" 
                        class="form-control"
                        placeholder="{{__('words.email')}}"
                        autocomplete="of">
                    <label for="email">{{__("words.email")}}</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="cellphone" name="cellphone"
                        value="{{old('cellphone', $user->cellphone)}}" 
                        class="form-control"
                        placeholder="{{__('words.cellphone')}}"
                        autocomplete="of">
                    <label for="cellphone">{{__("words.cellphone")}}</label>
                </div>

                @csrf
                <input type="hidden" name="form" value="account">
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                        {!! mdi("reload") !!} {{__("words.update")}}
                    </button>
                </div>
            </form>
        </article>

        <article class="d-flex bg-white rounded-1 mb-3 p-3">
            <div class="bg-white" style="width:120px; height:120px; padding: 2px;">
                <img class="avatar w-100" src="{{__url($user->getAvatar())}}" alt="@">
            </div>
            <div class="flex-fill p-2">
                <div class="d-flex pb-2">
                    <button type="button" class="btn btn-sm btn-light border m-1 overflow-hidden"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        {!! mdi("upload mdi-20px") !!}
                        
                    </button>
                    
                    <a href="#" class="btn btn-sm btn-light border m-1">
                        {!! mdi("folder mdi-20px") !!}
                    </a>

                    <button type="submit" class="btn btn-sm btn-light border m-1">
                        {!! mdi("content-save mdi-20px") !!}
                    </button>
                </div>
                
                <div class="form-floating">
                    <input type="text" 
                        name="avatar" 
                        value="{{old('avatar')}}" 
                        id="avatar"
                        class="form-control"
                        placeholder="url: https://cdn/avatar/image.php">
                    <label for="avatar">url: https://cdn/avatar/image.php</label>
                </div>                 
            </div>
        </article>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content px-3 py-4">
                    <form action="#">
                        
                        <input type="file" 
                            name="avatar"
                            id="avatar"
                            class="form-control mb-3">
                        
                        <div class="row">
                            <div class="col-4">
                                <div style="height:120px;" class="border w-100 bg-light rounded-2">
                                    
                                </div>
                            </div>
                            <div class="col-8">

                                {{__("image.resized", ["resized" => "120px/120px"])}}

                                <div class="my-3">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                       {!! mdi("upload") !!} {{__("words.upload")}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <article class="bg-white rounded-1 p-3">
            <h4>{{__("words.info")}}</h4>

            <form action="{{__url('{current}')}}" method="POST">

            {!! Alert::tagged("info") !!}

                <div class="form-floating mb-2">
                    <input type="text" name="firstname"
                        value="{{old('firstname', $user->firstname)}}" 
                        class="form-control"
                        placeholder="{{__('words.firstname')}}"
                        autocomplete="of">
                    <label for="firtname">{{__("words.firstname")}}</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" name="lastname"
                        value="{{old('lastname', $user->lastname)}}" 
                        class="form-control"
                        placeholder="{{__('words.lastname')}}"
                        autocomplete="of">
                    <label for="lastname">{{__("words.lastname")}}</label>
                </div>

                @csrf
                <input type="hidden" name="form" value="info">

                <div class="text-end">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                        {!! mdi("reload") !!} {{__("words.update")}}
                    </button>
                </div>
            </form>
        </article>
    @endsection