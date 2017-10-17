@extends('layouts.product')

@section('content')
<div class="container">
    <div class="row vertical-align">
        <div class="col-xs-12 col-sm-6">
            <h2>Add Product</h2>
        </div> <!-- end: col -->
        <div class="col-xs-12 col-sm-6 text-right">
            <a class="btn btn-default" href="{{ route('products.index') }}"><i class="fa fa-long-arrow-left fa-fw"></i> Back</a>
        </div> <!-- end: col -->
    </div> <!-- end: row -->
    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Information</h3>
                </div> <!-- end: panel-heading -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Code: </strong>{{ $product->code }}
                    </li>
                    <li class="list-group-item">
                        <strong>Name: </strong>{{ $product->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Price: </strong>{{ $product->price }}
                    </li>
                    <li class="list-group-item">
                        <strong>Size: </strong>{{ $product->size }}
                    </li>
                    <li class="list-group-item">
                        <strong>Quantity: </strong>{{ $product->quantity }}
                    </li>
                </ul>
            </div>
        </div> <!-- end: col -->
    </div> <!-- end: row -->
</div> <!-- end: container -->
@endsection
