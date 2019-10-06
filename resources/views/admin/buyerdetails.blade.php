@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer details</h1>
@stop

@section('content')

    <div class="list-group">


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Name </div>
                <div class="col-md-8">{{ $buyer->name }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Email </div>
                <div class="col-md-8">{{ $buyer->email }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">mobile no</div>
                <div class="col-md-8">{{ $buyer->mobile_no }}</div>
            </div>
        </div>





        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Address </div>
            <div class="col-md-8">{{ $buyer->address }} - {{$buyer->pin_code}}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Profile Image</div>
                <div class="col-md-4"> <a href="{{ asset('uploads/buyer/profile/'.$buyer->profile_image)}}"><img src="{{ asset('uploads/buyer/profile/'.$buyer->profile_image)}}" width="200"></a></div>
            </div>
        </div>






    </div>
@endsection
