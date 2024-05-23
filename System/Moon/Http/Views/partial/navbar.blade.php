        <nav class="moon-navbar">
            <div class="navbar navbar-expand-md shadow-sm p-0">
            
                <a href="#" class="swap-nav">
                    <mdi class="mdi mdi-align-horizontal-right"></mdi>
                </a>
                <a href="{{__url('{mainbar}')}}" class="navbar-brand">
                    Linares
                </a>
                <button class="btn navbar-toggler p-0 ms-auto" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mainNavBar" 
                        aria-controls="mainNavBar" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <a href="#" class="swap-aside">
                    <mdi class="mdi mdi-align-horizontal-left"></mdi>
                </a>
                
                <div id="mainNavBar" class="moon-navbar-body collapse navbar-collapse">  
                    
                    {!! Nav::tag("main-navbar") !!}

                </div>            
            </div>
        </nav>