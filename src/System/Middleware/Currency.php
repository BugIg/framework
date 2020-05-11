<?php

namespace AvoRed\Framework\System\Middleware;

use AvoRed\Framework\System\Models\Currency as ModelsCurrency;
use Closure;
use Illuminate\Support\Facades\Session;

class Currency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setDefaultCurrency();

        return $next($request);
    }

    /**
     * Set the Default Currency for the Application.
     * @return void
     */
    public function setDefaultCurrency()
    {
        if (! Session::has('default_currency')) {
            $currency = ModelsCurrency::all()->first();
            Session::put('default_currency', $currency);
        }
    }
}
