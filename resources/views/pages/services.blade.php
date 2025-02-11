@extends('layouts.main')

@section('title', 'Services | DySiQ Invoice')

@section('content')
@include('components.services.services-list')
@include('components.services.add-service')
@include('components.services.edit-service')
@include('components.services.delete-service')
@endsection