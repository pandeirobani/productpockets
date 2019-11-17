<h5 class="mt-3 pb-2 border-bottom">コメント</h5>
<ul class="list-unstyled">
    @foreach ($product_comments as $product_comment)
        <li class='border-bottom mt-1'>
            <div style="display:inline-flex">
                {!! link_to_route('users.show', $product_comment->user->name, ['id' => $product_comment->user->id]) !!} <span class="text-muted">posted at {{ $product_comment->created_at }}</span>
            
                @if(Auth::id() == $product_comment->user_id)
                    {!! Form::open(['route'=>['product_comment.destroy',$product_comment->id],'method'=>'delete']) !!}
                            {!! Form::submit('削除',['class'=>'btn-sm py-0 mx-2']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <div class="mt-0">
                <p>{!! nl2br(e($product_comment->content)) !!}</p>
            </div>
            
        </li>
    @endforeach
</ul>
{{ $product_comments->links('pagination::bootstrap-4') }}