<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\DataTable\AttributeTable;
use AvoRed\Framework\Catalog\Models\Attribute;
use AvoRed\Framework\Catalog\Models\Property;
use AvoRed\Framework\Catalog\Requests\AttributeRequest;
use AvoRed\Framework\Catalog\Requests\PropertyRequest;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AttributeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
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
     * @return View
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
     * @return RedirectResponse
     */
    public function store(AttributeRequest $request)
    {
        $attribute = Attribute::create($request->all());
        $this->saveDropdownOptions($attribute, $request);

        return redirect()->route('admin.attribute.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Attribute $attribute
     * @return View
     */
    public function edit(Attribute $attribute)
    {
        $tabs = Tab::get('catalog.attribute');
        $displayAsOptions = Attribute::DISPLAY_AS;
        $attribute->load('dropdownOptions');

        return view('avored::catalog.attribute.edit')
            ->with('attribute', $attribute)
            ->with('tabs', $tabs)
            ->with('displayAsOptions', $displayAsOptions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttributeRequest $request
     * @param Attribute $attribute
     * @return RedirectResponse
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        $this->saveDropdownOptions($attribute, $request);

        return redirect()->route('admin.attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attribute.index');

    }

    /**
     * Save Property Dropdown options.
     * @param Attribute $attribute
     * @param AttributeRequest $request
     * @return void
     */
    private function saveDropdownOptions(Attribute $attribute, AttributeRequest $request)
    {
        if (count($request->get('dropdown_option', [])) > 0) {
            $attribute->dropdownOptions()->delete();
            foreach ($request->get('dropdown_option', []) as $key => $option) {
                if (empty($option)) {
                    continue;
                }

                $attribute->dropdownOptions()->create(['display_text' => $option]);

            }
        }
    }
}
