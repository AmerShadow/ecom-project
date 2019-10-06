@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="col-md-12">
    @include('partials.alert')
    </div>
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in as seller!</p>
@stop
