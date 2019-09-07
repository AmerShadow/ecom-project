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
                        <h3 class="box-title">update category</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('itemimages.update', $itemimage)}}" enctype="multipart/form-data">
                    @csrf
                    @if(@$errors=="")
                    {{@$errors}}
                    @endif
                    @method('PATCH')
                      <div class="box-body">
                            <div class="col-md-7">
                                    <div class="form-group" >
                                        <label for="exampleInputName">Item Name</label>
                                        <select class="form-control select2" name="item_id">
                                            @foreach (@App\Model\Item::all() as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>





                            <div class="col-md-7">
                                    <div class="form-group">
                                    <label for="exampleInputName">image</label>
                                    <img src="{{asset('uploads/items_images/'.$itemimage->image)}}" width="500"/>
                                    </div>
                            </div>


                            <div class="col-md-7">
                                    <div class="form-group">
                                    <label for="exampleInputName">update image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputName" value="{{$itemimage->name}}" >
                                    </div>
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
