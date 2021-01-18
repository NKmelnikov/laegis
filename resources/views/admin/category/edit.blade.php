@extends('layouts.admin')

@section('admin-content')
    <admin-category-edit :_entity="{{ $entity ?? 'false' }}"></admin-category-edit>
@endsection
