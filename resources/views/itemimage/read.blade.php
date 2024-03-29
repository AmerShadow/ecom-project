@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Item image</h1>
@stop

@section('content')

    <div class="list-group">

            <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Image Id </div>
                        <div class="col-md-8">{{$itemimage->id }}</div>
                    </div>
                </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Name </div>
                <div class="col-md-8">{{ @App\Model\Item::where('id',$itemimage->item_id)->value('title') }}</div>
            </div>
        </div>


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Item Images</div>
                <div class="col-md-8">
                @foreach (@App\Model\ItemImage::where('item_id',$itemimage->item_id)->get() as $itemimage)
                <img src="{{ asset('uploads/items_images/'.$itemimage->image)}}" width="200"></a>
                @endforeach
                </div>
                </div>
        </div>
    </div>
@endsection
