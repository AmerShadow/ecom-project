@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2>Slide details</h2>
@stop

@section('content')

    <div class="list-group">

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Title</div>
                        <div class="col-md-8">{{$slide->title }}</div>
                    </div>
            </div>

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">sequence number</div>
                        <div class="col-md-8">{{$slide->index }}</div>
                    </div>
            </div>

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Description</div>
                        <div class="col-md-8">{{$slide->description }}</div>
                    </div>
            </div>

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                        <img src="{{asset("uploads/slide/".$slide->image)}}" width=500>
                        </div>
                    </div>
            </div>






    </div>
@endsection
