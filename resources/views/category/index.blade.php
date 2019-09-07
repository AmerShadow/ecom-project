@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category Management</h1>
@stop

@section('content')
                  <a href="{{route('categories.create')}}" class=" btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create New </a><br>

<section class="content">
 <div class="row">
 	<div class="col-12">
 		<div class="box">
 			<div class="box-header">
        <div class="row">
          <div class="col-md-6">
            <!-- <h3 class="box-title">Category</h3> -->
          </div>
          <div class="col-md-6 text-right">
                  <!-- <a href="{{route('categories.create')}}" class=" btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create New </a><br> -->
          </div>
        </div>
 			</div>
 			 <div class="box-body">
 			 	<table id="example2" class="table table-hover dataTable table-striped no-footer no-border">
 			 		 <thead>
 			 		 	 <tr>


                    <th>SR NO</th>
                    <th>Category Name</th>
                    <th>parent category</th>
                    <th>Image</th>
                    <th>Action</th>
 			 		 	 </tr>
 			 		 </thead>
 			 		  <tbody>
 			 		  	 <?php $i=1;?>
              @foreach($categories as $category)
              <tr>
               <td>{{$i}}</td>
               <td>{{$category->name}}</td>
               <td>{{@App\Model\Category::where('id', $category->parent_id)->value('name')}}</td>

               <td><img src="{{asset('uploads/category/'.$category->image)}}" width="100"></td>
               <td>
                  <a href="{{route('categories.edit',$category->id)}}" class="label label-primary " style="margin-left: 5px;"><i class="fa fa-edit fa-1x"></i> </a>

                  <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="label label-danger" style="margin-left: 5px;">
                        <i class="fa fa-trash  fa-1x"></i></button>
                  </form>

                  <a href="{{route('categories.show',$category->id)}}" style="margin-left: 5px;" class="label label-success"><i class="fa fa-eye  fa-1x" ></i>&ensp;</span></a>
               </td>
              </tr>
            <?php $i++?>
             @endforeach
 			 		  </tbody>
 			 	</table>
 			 </div>
 		</div>
 	</div>
 </div>
</section>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-flash-1.5.6/r-2.2.2/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

 <script>
  $(function () {

  $('#example2 thead tr').clone(true).appendTo( '#example2 thead' );
    $('#example2 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" style="width:130px;height:23px;"   />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#example2').DataTable( {
        orderCellsTop: true,
        searching: false,

        fixedHeader: true
    } );
  });
</script>
@endsection
