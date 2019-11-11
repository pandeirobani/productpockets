@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach($users as $user)
            <li class="lead">{{ link_to_route('users.show',$user->name,['id' => $user->id]) }}</li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif