@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Add New Category</h3>
				</div>
				<form role="form" method="POST" action="{{ route('categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if(@$errors=="")
                    {{@$errors}}
                    @endif
					<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputName">parent category</label>
							<select class="form-control select2" name="parent_id">
			                  @foreach(@App\Model\Category::all() as $row)
			                  <option value="{{$row->id}}">{{$row->name}}</option>
			                  @endforeach
			                </select>
						</div>
					</div>

						<div class="col-md-7">
						<div class="form-group">
							<label for="exampleInputName">Title</label>
                    		<input type="text" name="name" class="form-control" id="exampleInputName">
						</div>
                        </div>


                        <div class="col-md-7">
                        <div class="form-group">
                                <label for="exampleInputName">Category image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputName" >
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
