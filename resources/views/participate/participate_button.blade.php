@if(Auth::user()->is_participating($product->id))
    <p>あなたはこのプロジェクトに参加中です</p>
    {!! Form::open(['route'=> ['product.unparticipate',$product->id],'method'=>'delete']) !!}
        {!! Form::submit('脱退する',['class'=>"btn btn-danger"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route'=>['product.participate',$product->id]]) !!}
        {!! Form::submit('参加する',['class'=>"btn btn-primary"]) !!}
    {!! Form::close() !!}
@endif
    