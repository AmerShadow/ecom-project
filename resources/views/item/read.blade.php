@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category details</h1>
@stop

@section('content')

    <div class="list-group">


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-3">Name </div>
                <div class="col-md-9">{{ $item->title }}</div>
            </div>
        </div>

        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">Description </div>
                    <div class="col-md-9">{{ $item->description }}</div>
                </div>
        </div>

        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">price </div>
                    <div class="col-md-9">{{ $item->price }}</div>
                </div>
        </div>


        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">views </div>
                    <div class="col-md-9">{{ $item->views }}</div>
                </div>
        </div>



        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">color </div>
                    <div class="col-md-9">{{ $item->color }}</div>
                </div>
        </div>


        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">size </div>
                    <div class="col-md-9">{{ $item->size }}</div>
                </div>
        </div>

        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">Category</div>
                    <div class="col-md-9">{{ @App\Model\Category::where('id', $item->category_id)->value('name') }}</div>
                </div>
        </div>


        <div class="list-group-item">
                <div class="row">
                    <div class="col-md-3">size </div>
                    <div class="col-md-9">{{ $item->vendor_id }}</div>
                </div>
        </div>





        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Item Images</div>
                @foreach (@App\Model\ItemImage::where('item_id',$item->id)->get() as $itemimage)
                <div class="col-md-8"><img src="{{ asset('uploads/items_images/'.$itemimage->image)}}" width="200"></a></div>
                @endforeach
            </div>
        </div>



    </div>
@endsection
