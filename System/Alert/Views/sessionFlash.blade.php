
    @if($status)
    <div class="alert alert-slow p-0 my-1">   
        @if(is_string($message) )   
        <div style="font-size: .9rem;" class="text-{{$type}}">
            {{$message}}
        </div>   
        @endif
        
        @if( is_array($message) )
        @foreach( $message as $msg )
        <div style="font-size: .9rem;" class="text-{{$type}}">
            {{$msg}}
        </div> 
        @endforeach
        @endif
    </div>
    @endif

    