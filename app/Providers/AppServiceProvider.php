<?php

namespace App\Providers;

use Flux\Flux;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        $response = Http::get('https://fakestoreapi.com/products');
    $data=Http::get('https://api.weatherapi.com/v1/current.json?key=493837dadac34233a0114616250408&q=Kritipur,Nepal&aqi=yes');
    // dd($data->json());
    View::share('weather',$data);
        Gate::before(function ($user, $ability) {
        return $user->hasRole('Super Admin') ? true : null;
        });
    }
}