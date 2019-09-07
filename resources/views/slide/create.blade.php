@extends('adminlte::page')

@section('title', 'create item image')

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Image</h3>
            </div>

        <form role="form" method="POST" action="{{route('slides.store')}}" enctype="multipart/form-data">
            @csrf
            @if(@$errors=="")
            {{@$errors}}
            @endif

            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label for="index">Sequence number in slide show</label>
                            <input type="number" id="index" name="index" class="form-control">
                        </div>
                </div>


                <div class="col-md-7">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                    </div>


                <div class="col-md-7">
                        <div class="form-group">
                            <label for="image">Slide</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>



            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Image</button>
            </div>

        </div>
    </div>
</div>



@stop
