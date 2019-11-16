<ul class="list-unstyled">
    @foreach ($product_comments as $product_comment)
        <li class>
            <div>
                {!! link_to_route('users.show', $product_comment->user->name, ['id' => $product_comment->user->id]) !!} <span class="text-muted">posted at {{ $product_comment->created_at }}</span>
            </div>
            <div>
                <p class="mb-0">{!! nl2br(e($product_comment->content)) !!}</p>
            </div>
            {!! Form::open(['route'=>['product_comment.destroy',$product_comment->id],'method'=>'delete']) !!}
                {!! Form::submit('削除',['class'=>'btn']) !!}
            {!! Form::close() !!}
        </li>
    @endforeach
</ul>
{{ $product_comments->links('pagination::bootstrap-4') }}