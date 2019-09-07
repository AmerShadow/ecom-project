@extends('adminlte::page')

@section('title', 'create item image')

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Image</h3>
            </div>

        <form role="form" method="POST" action="{{route('slides.update',$slide)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @if(@$errors=="")
            {{@$errors}}
            @endif

            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$slide->title}}">
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label for="index">Sequence number in slide show</label>
                        <input type="number" id="index" name="index" class="form-control" value="{{$slide->index}}">
                        </div>
                </div>


                <div class="col-md-7">
                        <div class="form-group">
                            <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control">{{$slide->description}}</textarea>
                        </div>
                    </div>


                <div class="col-md-7">
                        <div class="form-group">
                            <label for="image">Slide Image</label>
                        </div>
                    </div>
                <div class="col-md-7">
                        <div class="form-group">

                        <img src="{{asset("uploads/slide/".$slide->image)}}" width=250>
                        </div>
                    </div>

                <div class="col-md-7">
                        <div class="form-group">
                            <label for="image">Update slide Image</label>
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
