@extends('adminlte::page')

@section('title', 'create item image')

@section('content')


<section class="content">
 <div class="row">
 	<div class="col-12">
 		<div class="box">
 			<div class="box-header">
                <h1>All Transactions</h1>
 			</div>
 			 <div class="box-body">
 			 	<table id="example2" class="table table-hover dataTable table-striped no-footer no-border">
 			 		<thead>
 			 		 	 <tr>
                            <th>SR NO</th>
                            <th>order_id</th>
                            <th>transaction_id</th>
                            <th>payment_mode</th>
                            <th>amount</th>
                            <th>Action</th>
 			 		 	 </tr>
 			 		</thead>
 			 		<tbody>
 			 		  	    <?php $i=1;?>
                            @foreach($transactions as $transaction)
                            <tr>
                            <td>{{$i}}</td>
                            <td>{{$transaction->order_id}}</td>
                            <td>{{$transaction->transaction_id}}</td>
                            <td>{{$transaction->payment_mode}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>action</td>



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



@stop

