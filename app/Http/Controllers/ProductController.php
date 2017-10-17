<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # init
        $perPage = 10;
        $query = new Product;

        # sort
        $query = $this->sortQuery($query);

        # paginate
        $products = $query->paginate($perPage);

        return view('products.index', compact('products', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # validation
        $this->validate($request, Product::rules());

        # get user's input
        $input = $this->collectInput($request, app('App\Models\Product')->getFillable());

        # create product
        Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product      $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product      $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\Product          $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        # validation
        $this->validate($request, Product::rules($product->id));

        # get user's input
        $input = $this->collectInput($request, app('App\Models\Product')->getFillable());

        # create product
        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        # deletes product
        Product::findOrFail($request->id)->delete();

        return back()->with('success', 'Product deleted successfully.');
    }
}
