@extends('adminlte::page')

@section('title', 'create item image')

@section('content')


<div class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Plan</h3>
            </div>

        <form role="form" method="POST" action="{{route('subscriptions.store')}}" enctype="multipart/form-data">
            @csrf
            @if(@$errors=="")
            {{@$errors}}
            @endif


            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Plan Name</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                </div>

            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="text" id="title" name="price" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label for="index">Duration</label>
                            <input type="number" id="index" name="duration" class="form-control">
                        </div>
                </div>


                <div class="col-md-7">
                        <div class="form-group">
                            <label for="description">Max stock price</label>
                            <textarea id="description" name="max_stock" class="form-control"></textarea>
                        </div>
                    </div>



            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Plan</button>
            </div>

        </div>
    </div>
</div>






@stop
