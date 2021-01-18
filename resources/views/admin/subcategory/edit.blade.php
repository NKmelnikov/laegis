@extends('layouts.admin')

@section('admin-content')
    <admin-subcategory-edit :_entity="{{ $entity ?? 'false' }}"></admin-subcategory-edit>
@endsection
