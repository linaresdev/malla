
@foreach($users as $user)
<div class="d-flex bg-light m-1 p-1">
    <img width="46" class="border rounded-pill" src="{{__url( $user->getAvatar() )}}" alt="@">
    <a href="{{__url('admin/users/show/'.$user->id)}}" class="flex-fill link-secondary px-2">
        {{ $user->firstname }} {{ $user->lastname }}
        <span style="font-size:.8rem" class="d-block">
            {{$user->email}}
        </span>
    </a>
</div>
@endforeach