<!-- Importing the views/layouts/app -->
@extends('layouts.app')
{{-- Importing the views/layouts/app --}}
@section('content')
{{-- Putting content inside views/layouts/app --}}
<p>This is content page</p>

@if(count($people))
    <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
@endif

{{-- Closing the @section('content') --}}
@stop
{{-- or close different way 
    @endsection  --}}

