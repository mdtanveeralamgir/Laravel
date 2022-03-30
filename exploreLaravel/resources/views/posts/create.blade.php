@extends('layouts/app')

@section('content')
<!-- <form method="post" action="/posts"> -->
    
    {!! Form::open(['method'=>'POST', 'action' => '\App\Http\Controllers\PostsController@store']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' =>'form-control']) !!}
    </div>
    {!! Form::submit('Create') !!}
    @csrf
    {!! Form::close() !!}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

