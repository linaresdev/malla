
    <nav class="navbar navbar-moon bg-white navbar-expand-md shadow-sm fixed-top p-0 px-3">
            
            <a href="{{__url('{mainbar}')}}" class="navbar-brand px-3">
                Linares
            </a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#mainBar" 
                    aria-controls="mainBar" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mainBar" class="collapse navbar-collapse">
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
                </ul>
            </div>            
        </nav>