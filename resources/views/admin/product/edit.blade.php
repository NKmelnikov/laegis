@extends('layouts.admin')

@section('admin-content')
    <admin-product-edit :_entity="{{ json_encode($entity,TRUE) ?? 'false' }}"></admin-product-edit>
@endsection
