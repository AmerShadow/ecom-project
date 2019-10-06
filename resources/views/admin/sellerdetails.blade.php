@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Seller details</h1>
@stop

@section('content')

    <div class="list-group">


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Name </div>
                <div class="col-md-8">{{ $seller->name }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Email </div>
                <div class="col-md-8">{{ $seller->email }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">mobile no</div>
                <div class="col-md-8">{{ $seller->mobile_no }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">company </div>
                <div class="col-md-8">{{ $seller->company }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Address </div>
            <div class="col-md-8">{{ $seller->address }} - {{$seller->pin_code}}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Profile Image</div>
                <div class="col-md-4"> <a href="{{ asset('uploads/seller/profile/'.$seller->profile_image)}}"><img src="{{ asset('uploads/seller/profile/'.$seller->profile_image)}}" width="200"></a></div>
                <div class="col-md-2">Id Proof</div>
                <div class="col-md-4"><a href="{{ asset('uploads/seller/idproof/'.$seller->id_proof)}}" width="200"><img src="{{ asset('uploads/seller/idproof/'.$seller->profile_image)}}" width="200"></a></div>
            </div>
        </div>






    </div>
@endsection
