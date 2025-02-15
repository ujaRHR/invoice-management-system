@extends('layouts.main')

@section('title', 'Payment Methods | DySiQ Invoice')

@section('content')
@include('components.payment-methods.methods-list')
@include('components.payment-methods.add-method')
@include('components.payment-methods.edit-method')
@include('components.payment-methods.delete-method')
@endsection