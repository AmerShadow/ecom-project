@extends('adminlte::page')

@section('title', 'create item image')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Item Image</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('itemimages.store')}}" enctype="multipart/form-data">
                        @csrf
                        @if(@$errors=="")
                        {{@$errors}}
                        @endif
                        <div class="box-body">


                            <div class="col-md-6">
                                <div class="form-group" >
                                <label for="exampleInputName">select Item</label>
                                <select class="form-control select2" name="item_id">
                                        @foreach(@App\Model\Item::all() as $row)
                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                        @endforeach
                                      </select>
                            </div>
                            </div>



                            <div class="col-md-7">
                                    <div class="form-group">
                                    <label for="exampleInputName">Item image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputName">
                                </div>
                                </div>

                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
