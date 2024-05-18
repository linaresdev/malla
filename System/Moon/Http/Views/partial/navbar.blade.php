        <nav class="moon-navbar">
            <div class="navbar navbar-expand-md shadow-sm">
            
                <a href="#" class="swap-nav">
                    <mdi class="mdi mdi-align-horizontal-right"></mdi>
                </a>
                <a href="{{__url('{mainbar}')}}" class="navbar-brand">
                    Linares
                </a>
                <button class="btn navbar-toggler p-0 ms-auto" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mainBar" 
                        aria-controls="mainBar" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="#" class="swap-aside">
                    <mdi class="mdi mdi-align-horizontal-left"></mdi>
                </a>

                <div id="mainBar" class="moon-navbar-body collapse navbar-collapse">
                    
                    {!! Nav::tag("main-navbar") !!}

                    <!-- <ul class="nav ms-auto">
                        @if(auth()->check())
                        <li class="nav-item">
                            <a href="#" class="nav-link">Link 0</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <img src="{{__url($UI->avatar->url)}}" 
                                    alt="@"
                                    class="avatar avatar-circle" 
                                    style="width:36px;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{__url('logout')}}" class="dropdown-item">
                                    {{__("words.logout")}}
                                </a>
                            </div>
                        </li>
                        @endif

                        @if( !auth()->check() )
                        <li class="nav-item">
                            <a href="getmembership" class="btn btn-sm bg-success-subtle link-success rounded-pill mt-1 me-1 px-3">
                                <span class="mdi mdi-gift"></span>
                                {{__("auth.getmembership")}}
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a href="login" class="btn btn-sm btn-light rounded-pill mt-1 px-3">
                                <span class="mdi mdi-login"></span>
                                {{__("auth.login")}}
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="#" class="swap-aside">
                                <mdi class="mdi mdi-align-horizontal-left"></mdi>
                            </a>
                        </li>
                    </ul> -->
                </div>            
            </div>
        </nav>