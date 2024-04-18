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
                    <ul class="nav ms-auto">
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
                        <li class="nav-item">
                            <a href="#" class="swap-aside">
                                <mdi class="mdi mdi-align-horizontal-left"></mdi>
                            </a>
                        </li>
                    </ul>
                </div>            
            </div>
        </nav>