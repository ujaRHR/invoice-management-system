@extends('layouts.main')

@section('title', 'Invoices | DySiQ Invoice')

@section('content')
@include('components.invoices.invoices-list')
@include('components.invoices.update-status')
@include('components.invoices.delete-invoice')
@endsection