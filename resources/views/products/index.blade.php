@extends('layouts.product')

@section('content')
<div class="container">
    <div class="row vertical-align">
        <div class="col-xs-12 col-sm-6">
            <h2>Product Management</h2>
        </div> <!-- end: col -->
        <div class="col-xs-12 col-sm-6 text-right">
            <a class="btn btn-primary" href="{{ route('products.create') }}">+ Add Product</a>
        </div> <!-- end: col -->
    </div> <!-- end: row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <table class="table products-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = (request()->input('page', 1) - 1) * $perPage; $j = $i; ?>
                        @foreach ($products as $key => $product)
                            <tr>
                                <th scope="row">{{ ++$j }}</th>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>$ {{ $product->price }}</td>
                                <td>{{ $product->size }} L</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->created_at->format('F d, Y \\a\\t h:i A') }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">
                                        <i class="fa fa-search-plus" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#"
                                        data-id="{{ $product->id }}"
                                        data-code="{{ $product->code }}"
                                        data-name="{{ $product->name }}"
                                        data-toggle="modal"
                                        data-target="#delete-product"
                                    >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="panel-footer">
                    <div class="row vertical-align">
                        <div class="col-xs-6">
                            <div class="text-left">
                                Showing record: {{ $i+1 }} to {{ $j }} from {{ $products->total() }} item(s)
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="text-right">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end: panel-footer -->
            </div> <!-- end: panel -->
        </div> <!-- end: col -->
    </div> <!-- end: row -->
</div> <!-- end: container -->
<div class="modal fade" id="delete-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>
                    Please confirm you would like to delete this product: <b><span id="product-code"></span> - <span id="product-name"></span></b>.
                </p>
            </div>
            <div class="modal-footer">
                <form class="form-horizontal" method="post" action="{{ route('products.delete') }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="id" id="product-id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent

    @if ($message = Session::get('success'))
        @include('partials.modal-success', ['message' => $message])
    @endif

    <script>
        $('#delete-product').on("show.bs.modal", function (e) {
            $("#product-code").html($(e.relatedTarget).data('code'));
            $("#product-name").html($(e.relatedTarget).data('name'));
            $("#product-id").val($(e.relatedTarget).data('id'));
        });
    </script>
@endsection
