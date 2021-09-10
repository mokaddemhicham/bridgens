@extends('errors::layout')
@section('title', __('Not Found'))
@section('error')
    <img src="{{ asset('uploads/images/Oops! 404 Error with a broken robot-bro.svg') }}" alt="error 404" class="img-fluid">
@endsection