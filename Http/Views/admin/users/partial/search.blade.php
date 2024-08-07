
@if( !empty($users) )
@foreach($users as $user)
<div class="d-flex bg-light m-1 p-1">
    <img width="46" class="border rounded-pill" src="{{__url( $user->getAvatar() )}}" alt="@">
    <a href="{{__url('admin/users/profile/'.$user->id)}}" class="flex-fill link-secondary px-2">
        {{ $user->firstname }} {{ $user->lastname }}
        <span style="font-size:.8rem" class="d-block">
            {{$user->email}}
        </span>
    </a>
</div>
@endforeach
@else
<div class="p-1 text-center">
    Sin resultado
</div>
@endif