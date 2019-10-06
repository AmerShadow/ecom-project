@extends('adminlte::page')

@section('title', 'items')

@section('content_header')
    <h1>Seller List</h1>
@stop

@section('content')

<section class="content">
 <div class="row">
 	<div class="col-12">
 		<div class="box">
 			<div class="box-header">

 			</div>
 			 <div class="box-body">
 			 	<table id="example2" class="table table-hover dataTable table-striped no-footer no-border">
 			 		 <thead>
 			 		 	 <tr>


                    <th>SR NO</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>mobile no</th>
                    <th>image</th>
                    <th>id proof</th>
                    <th>Status</th>
                    <th>Action</th>
 			 		 	 </tr>
 			 		 </thead>
 			 		  <tbody>
 			 		  	 <?php $i=1;?>
              @foreach($users as $user)
              <tr>
               <td>{{$i}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->mobile_no}}</td>

              <td><img src="{{asset('uploads/users/profile_image/'.$user->profile_image)}}" alt="no image"  width=100></td>
              <td><img src="{{asset('uploads/users/id_proof/'.$user->id_proof)}}" alt="no image" width=100></td>

              <td>
                    status: {{$user->status}}
                <form action="{{ route('admin.changestatus',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="label label-danger" style="margin-left: 5px;">
                    change status</button>
            </form></td>




            <td>
                <a href="{{route('admin.sellerdetails',$user->id)}}" style="margin-left: 5px;" class="label label-success"><i class="fa fa-eye  fa-1x" ></i>&ensp;</span></a>





                <form action="{{ route('admin.userdestroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="label label-danger" style="margin-left: 5px;">
                        <i class="fa fa-trash  fa-1x"></i></button>
                </form>

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
