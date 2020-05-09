<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\DataTable\ProductTable;
use AvoRed\Framework\Catalog\Models\Product;
use AvoRed\Framework\Catalog\Requests\ProductRequest;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productTable = new ProductTable(Product::class);

        return view('avored::catalog.product.index')
            ->with('productTable', $productTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tabs = Tab::get('catalog.product');

        return view('avored::catalog.product.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect()->route('admin.product.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {
        $tabs = Tab::get('catalog.product');

        return view('avored::catalog.product.edit')
            ->with('product', $product)
            ->with('tabs', $tabs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index');

    }
}
