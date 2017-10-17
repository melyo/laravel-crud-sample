@extends('layouts.product')

@section('content')
<div class="container">
    <div class="row vertical-align">
        <div class="col-xs-12 col-sm-6">
            <h2>Update Product</h2>
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
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('products.update', $product->id) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Code</label>
                            <div class="col-md-6">
                                <input id="code" type="number" min="1000" max="9999" class="form-control" name="code" value="{{ old('code') ?: $product->code }}" required autofocus>
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?: $product->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">$</span>
                                    <input id="price" type="number" min="1" max="999999999" step="any" class="form-control" name="price" value="{{ old('price') ?: $product->price }}" required autofocus>
                                </div>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="size" class="col-md-4 control-label">Size</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="size" type="number" min="1" max="999999999" step="any" class="form-control" name="size" value="{{ old('size') ?: $product->size }}" required autofocus>
                                    <span class="input-group-addon" id="basic-addon2">L</span>
                                </div>
                                @if ($errors->has('size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-6">
                                <input id="quantity" type="number" min="1" max="1000" class="form-control" name="quantity" value="{{ old('quantity') ?: $product->quantity }}" required autofocus>
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-floppy-o"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end: panel-body -->
            </div> <!-- end: panel -->
        </div> <!-- end: col -->
    </div> <!-- end: row -->
</div> <!-- end: container -->
@endsection
