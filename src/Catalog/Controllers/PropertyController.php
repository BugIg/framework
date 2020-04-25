<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\DataTable\PropertyTable;
use AvoRed\Framework\Catalog\Models\Property;
use AvoRed\Framework\Catalog\Requests\PropertyRequest;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;

class PropertyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $propertyTable = new PropertyTable(Property::class);

        return view('avored::catalog.property.index')
            ->with('propertyTable', $propertyTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tabs = Tab::get('catalog.property');
        $dataTypeOptions = Property::PROPERTY_DATATYPES;
        $fieldTypeOptions = Property::PROPERTY_FIELDTYPES;

        return view('avored::catalog.property.create')
            ->with('tabs', $tabs)
            ->with('dataTypeOptions', $dataTypeOptions)
            ->with('fieldTypeOptions', $fieldTypeOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest $request
     * @return Response
     */
    public function store(PropertyRequest $request)
    {
        Property::create($request->all());

        return redirect()->route('admin.property.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Property $property)
    {
        $tabs = Tab::get('catalog.property');
        $dataTypeOptions = Property::PROPERTY_DATATYPES;
        $fieldTypeOptions = Property::PROPERTY_FIELDTYPES;

        return view('avored::catalog.property.edit')
            ->with('property', $property)
            ->with('tabs', $tabs)
            ->with('dataTypeOptions', $dataTypeOptions)
            ->with('fieldTypeOptions', $fieldTypeOptions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Property $property
     * @return Response
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->all());

        return redirect()->route('admin.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     * @return Response
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.property.index');

    }
}
