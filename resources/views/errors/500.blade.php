@extends('errors::layout')
@section('title', __('Not Found'))
@section('error')
    <img src="{{ asset('uploads/images/500 Internal Server Error-pana.svg') }}" alt="error 404" class="img-fluid">
@endsection