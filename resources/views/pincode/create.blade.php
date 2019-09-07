@extends('adminlte::page')

@section('title', 'create item image')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add pin code</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('pincodes.store')}}" enctype="multipart/form-data">
                        @csrf
                        @if(@$errors=="")
                        {{@$errors}}
                        @endif
                        <div class="box-body">


                            <div class="col-md-3">
                                <div class="form-group" >
                                <label for="exampleInputName">Enter pin code</label>
                                <input type="text" name="pin_code" class="form-control" id="exampleInputName">
                            </div>
                            </div>



                            <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="exampleInputName">Delivery charges</label>
                                    <input type="text" name="charges" class="form-control" id="exampleInputName">
                                </div>
                                </div>

                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Add new Pincode</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
