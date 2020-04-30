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
        $property = Property::create($request->all());
        $this->savePropertyDropdownOptions($property, $request);

        return redirect()->route('admin.property.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @return Response
     */
    public function edit(Property $property)
    {
        $property->load('dropdownOptions');
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
     * @param PropertyRequest $request
     * @param Property $property
     * @return Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->all());
        $this->savePropertyDropdownOptions($property, $request);

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


    /**
     * Save Property Dropdown options.
     * @param Property $property
     * @param PropertyRequest $request
     * @return void
     */
    private function savePropertyDropdownOptions(Property $property, PropertyRequest $request)
    {
        if (! ($request->get('field_type') === 'RADIO' || $request->get('field_type') === 'SELECT')) {
            $property->dropdownOptions()->delete();
        }
        if (($request->get('field_type') === 'RADIO' ||
                $request->get('field_type') === 'SELECT') &&
            count($request->get('dropdown_option', [])) > 0
        ) {
            foreach ($request->get('dropdown_option', []) as $key => $option) {
                if (empty($option)) {
                    continue;
                }
                $property->dropdownOptions()->create(['display_text' => $option]);
            }
        }
    }
}
