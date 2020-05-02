<?php

namespace AvoRed\Framework\System\Controllers;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Models\Configuration;

class ConfigurationController extends  BaseController
{
    /**
     * Show Dashboard of an AvoRed Admin.
     * @return \Illuminate\View\View
     */
    public function index()
    {       
        $tabs = Tab::get('system.configuration');
        $configuration = new Configuration();

        return view('avored::system.configuration.index')
            ->with('tabs', $tabs)
            ->with('configuration', $configuration);
    }

    /**
     * Store a Configurations for the website of an AvoRed Admin.
     * @params Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {       
        foreach($request->except('_token') as $key => $vale) {
            Configuration::create([
                'key' => $key,
                'value' => $vale
            ]);
        }
        

        return redirect()->route('admin.configuration.index');
    }
}
