@extends('layouts.admin')

@section('admin-content')
    <admin-catalog-edit :_entity="{{ $entity ?? 'false' }}"></admin-catalog-edit>
@endsection
