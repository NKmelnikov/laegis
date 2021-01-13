@extends('layouts.admin')

@section('admin-content')
    <admin-service-edit :_entity="{{ $entity ?? 'false' }}"></admin-service-edit>
@endsection
