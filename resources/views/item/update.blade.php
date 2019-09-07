@extends('adminlte::page')

@section('title', 'Update item')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Update Item</h3>
				</div>
				<form role="form" method="POST" action="{{ route('items.update' , $item->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @if(@$errors=="")
                    {{@$errors}}
                    @endif
					<div class="box-body">


						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">Item Name</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName" value="{{$item->title}}">
						</div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">category</label>
                                <select class="form-control select2" name="category_id">
                                  @foreach(@App\Model\Category::all() as $row)
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">color</label>
                            <input type="text" name="color" class="form-control" value="{{$item->color}}">
						</div>
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">size</label>
                    		<input type="text" name="size" class="form-control" value="{{$item->size}}">
						</div>
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">price</label>
                    		<input type="number" name="price" class="form-control" value="{{$item->price}}">
						</div>
                        </div>


                        <div class="col-md-6">
							<div class="form-group">
							</div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group">
                            <label for="exampleInputName">Description</label>
                                       <textarea class="form-control" name="description" rows="3">{{$item->description}}</textarea>
                          </div>
                          </div>









					</div>
	            	<div class="box-footer">
	                  <button type="submit" class="btn btn-primary">save</button>
	                </div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop



