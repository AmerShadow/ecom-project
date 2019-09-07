@extends('adminlte::page')

@section('title', 'update category')

@section('content_header')
@stop

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">update pin code details</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('pincodes.update', $pincode)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @if(@$errors=="")
                    {{@$errors}}
                    @endif

                      <div class="box-body">
                            <div class="col-md-7">
                                    <div class="form-group" >
                                        <label for="exampleInputName">Pin code</label>
                                    <input type="text" name="pin_code" class="form-control" value="{{$pincode->pin_code}}">
                                    </div>
                            </div>

                            <div class="col-md-7">
                                    <div class="form-group" >
                                        <label for="exampleInputName">charges</label>
                                    <input type="text" name="pin_code" class="form-control" value="{{$pincode->charges}}">
                                    </div>
                            </div>
                    </div>
                     <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                    </form>
                </div>
            </div>
        </div>
    </div>









<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>
@endsection
