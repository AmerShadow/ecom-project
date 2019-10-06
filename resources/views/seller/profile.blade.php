@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profile details</h1>
@stop

@section('content')

    <div class="list-group">


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Name </div>
                <div class="col-md-8">{{ $profile->name }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Email </div>
                <div class="col-md-8">{{ $profile->email }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">mobile no</div>
                <div class="col-md-8">{{ $profile->mobile_no }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">company </div>
                <div class="col-md-8">{{ $profile->company }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Address </div>
            <div class="col-md-8">{{ $profile->address }} - {{$profile->pin_code}}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Profile Image</div>
                <div class="col-md-4"> <a href="{{ asset('uploads/users/profile_image/'.$profile->profile_image)}}"><img src="{{ asset('uploads/users/profile_image/'.$profile->profile_image)}}" width="200"></a></div>
                <div class="col-md-2">Id Proof</div>
                <div class="col-md-4"><a href="{{ asset('uploads/users/id_proof/'.$profile->id_proof)}}" width="200"><img src="{{ asset('uploads/users/id_proof/'.$profile->id_proof)}}" width="200"></a></div>
            </div>
        </div>






    </div>
@endsection
