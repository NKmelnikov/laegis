@extends('layouts.app')

@section('content')

    @section('meta')
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
    @endsection
    <div class="container">
        <h1>Main page</h1>
    </div>
@endsection
