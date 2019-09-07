@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pin code details</h1>
@stop

@section('content')

    <div class="list-group">

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Pin code</div>
                        <div class="col-md-8">{{$pincode->pin_code }}</div>
                    </div>
            </div>

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">charges</div>
                        <div class="col-md-8">{{$pincode->charges }}</div>
                    </div>
            </div>





    </div>
@endsection
