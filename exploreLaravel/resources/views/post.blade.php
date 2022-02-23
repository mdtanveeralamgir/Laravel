<!-- Importing the views/layouts/app -->
@extends('layouts.app')
{{-- Importing the views/layouts/app --}}
@section('content')
{{-- Putting content inside views/layouts/app --}}
<p>This is post page</p>
<p>name is {{$name}}</p>
<p>id is {{$id}}</p>

{{-- Closing the @section('content') --}}
@stop
{{-- or close different way 
    @endsection  --}}

