<?php

namespace AvoRed\Framework\System\Controllers;

use AvoRed\Framework\System\Requests\LanguageRequest;
use AvoRed\Framework\System\DataTable\LanguageTable;
use AvoRed\Framework\System\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\View\View;

class LanguageController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $languageTable = new LanguageTable(Language::class);

        return view('avored-admin::system.language.index')
            ->with('languageTable', $languageTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('system.language');

        return view('avored-admin::system.language.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     * @param LanguageRequest $request
     * @return RedirectResponse
     */
    public function store(LanguageRequest $request)
    {
        $language = Language::create($request->all());

        return redirect()->route('admin.language.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Language $language
     * @return View
     */
    public function edit(Language $language)
    {
        $tabs = Tab::get('system.language');

        return view('avored-admin::system.language.edit')
            ->with('tabs', $tabs)
            ->with('language', $language);
    }

    /**
     * Update the specified resource in storage.
     * @param LanguageRequest $request
     * @param Language $language
     * @return RedirectResponse
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->all());

        return redirect()->route('admin.language.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Language $language
     * @return JsonResponse
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.language.index');
    }
}
