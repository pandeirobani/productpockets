@if (count($users) > 0)
    <h4>メンバー一覧</h4>
    <ul class="list-unstyled">
        @foreach($users as $user)
            <li>{{ link_to_route('users.show',$user->name,['id' => $user->id]) }}</li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif