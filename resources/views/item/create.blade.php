@extends('adminlte::page')

@section('title', 'create item')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Add New Item</h3>
				</div>
				<form role="form" method="POST" action="{{ route('items.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if(@$errors=="")
                    {{@$errors}}
                    @endif
					<div class="box-body">


						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">Item Name</label>
                    		<input type="text" name="title" class="form-control" id="exampleInputName">
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
                    		<input type="text" name="color" class="form-control" id="exampleInputName">
						</div>
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">size</label>
                    		<input type="text" name="size" class="form-control" id="exampleInputName">
						</div>
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">price</label>
                    		<input type="number" name="price" class="form-control" id="exampleInputName">
						</div>
                        </div>


                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">Tax(in percentage)</label>
                    		<input type="number" name="tax_ratio" class="form-control" id="exampleInputName">
						</div>
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputName">Discount(in percentage)</label>
                    		<input type="number" name="discount_ratio" class="form-control" id="exampleInputName">
						</div>
                        </div>





                        <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputName">Item image</label>
                                <input type="file" name="image" multiple class="form-control" id="exampleInputName">
                            </div>
                            </div>


                        <div class="col-md-8">
                            <div class="form-group">
                            <label for="exampleInputName">Description</label>
                                       <textarea class="form-control" name="description" rows="3"></textarea>
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

@section('js')
    <script type="text/javascript">
      $(function () {
         $('.select2').select2();
    $('#newbrand').DataTable();


  });
    </script>
@stop


