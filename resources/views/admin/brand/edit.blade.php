@extends('layouts.admin')

@section('admin-content')
    <admin-brand-edit :_entity="{{ $entity ?? 'false' }}"></admin-brand-edit>
@endsection
