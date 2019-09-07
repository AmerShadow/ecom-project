@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category details</h1>
@stop

@section('content')

    <div class="list-group">


        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Category </div>
                <div class="col-md-8">{{ $category->name }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">Categories parent category</div>
                <div class="col-md-8">{{ @App\Model\Category::where('id', $category->parent_id)->value('name') }}</div>
            </div>
        </div>





        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">category Image</div>
                <div class="col-md-8"> <a href="{{ asset('uploads/category/'.$category->image)}}"><img src="{{ asset('uploads/category/'.$category->image)}}" width="200"></a></div>
            </div>
        </div>



    </div>
@endsection
