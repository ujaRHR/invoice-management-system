@extends('layouts.main')

@section('title', 'Manage Clients | DySiQ Invoice')

@section('content')
@include('components.clients.clients-list')
@include('components.clients.add-client')
@include('components.clients.edit-client')
@include('components.clients.delete-client')
@endsection