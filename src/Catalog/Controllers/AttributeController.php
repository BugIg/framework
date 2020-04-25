<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\DataTable\AttributeTable;
use AvoRed\Framework\Catalog\Models\Attribute;
use AvoRed\Framework\Catalog\Requests\AttributeRequest;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;

class AttributeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $attributeTable = new AttributeTable(Attribute::class);

        return view('avored::catalog.attribute.index')
            ->with('attributeTable', $attributeTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tabs = Tab::get('catalog.attribute');
        $displayAsOptions = Attribute::DISPLAY_AS;

        return view('avored::catalog.attribute.create')
            ->with('tabs', $tabs)
            ->with('displayAsOptions', $displayAsOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttributeRequest $request
     * @return Response
     */
    public function store(AttributeRequest $request)
    {
        Attribute::create($request->all());

        return redirect()->route('admin.attribute.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Attribute $attribute)
    {
        $tabs = Tab::get('catalog.attribute');
        $displayAsOptions = Attribute::DISPLAY_AS;

        return view('avored::catalog.attribute.edit')
            ->with('attribute', $attribute)
            ->with('tabs', $tabs)
            ->with('displayAsOptions', $displayAsOptions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Attribute $attribute
     * @return Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($request->all());

        return redirect()->route('admin.attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return Response
     * @throws \Exception
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attribute.index');

    }
}
