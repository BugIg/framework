<?php

namespace AvoRed\Framework\System\Controllers;

use AvoRed\Framework\System\Models\Country;
use AvoRed\Framework\System\Requests\CurrencyRequest;
use AvoRed\Framework\System\DataTable\CurrencyTable;
use AvoRed\Framework\System\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\View\View;

class CurrencyController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $currencyTable = new CurrencyTable(Currency::class);

        return view('avored-admin::system.currency.index')
            ->with('currencyTable', $currencyTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $options = Country::all();

        $tabs = Tab::get('system.currency');

        return view('avored-admin::system.currency.create')
            ->with('tabs', $tabs)
            ->with('options', $options);
    }

    /**
     * Store a newly created resource in storage.
     * @param CurrencyRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyRequest $request)
    {
        $currency = Currency::create($request->all());

        return redirect()->route('admin.currency.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Currency $currency
     * @return View
     */
    public function edit(Currency $currency)
    {
        $options = Country::all();
        $tabs = Tab::get('system.currency');

        return view('avored-admin::system.currency.edit')
            ->with('tabs', $tabs)
            ->with('currency', $currency)
            ->with('options', $options);
    }

    /**
     * Update the specified resource in storage.
     * @param CurrencyRequest $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->all());

        return redirect()->route('admin.currency.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Currency $currency
     * @return JsonResponse
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('admin.currency.index');
    }
}
