@extends('layout.layout')

@section('content')

{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostsController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file_input', 'File') !!}
        {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    </div>
    @csrf
{!! Form::close() !!}

<div class="error">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@endsection