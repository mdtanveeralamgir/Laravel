@extends('layouts/app')

@section('content')
<!-- <form method="post" action="/posts"> -->
    
    {!! Form::model($post, ['method'=>'PATCH', 'action' => ['\App\Http\Controllers\PostsController@update', $post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' =>'form-control']) !!}
    </div>
    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    @csrf
    {!! Form::close() !!}
    

    {!! Form::open(['method'=>'DELETE', 'action'=> ['\App\Http\Controllers\PostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection

