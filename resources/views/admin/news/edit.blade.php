@extends('layouts.admin')

@section('admin-content')
    <admin-news-edit :_entity="{{ $entity ?? 'false' }}"></admin-news-edit>
@endsection
