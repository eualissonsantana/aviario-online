<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $bannersQuadrados = db::table('banners')->where('posicao', 'lado')->where('ativo', '1')->get();
        $bannersRetangulares = db::table('banners')->where('posicao', 'topo')->where('ativo', '1')->get();
       
        Carbon::setlocale(LC_TIME, 'pt_BR');
        Schema::defaultStringLength(191);
        View::share(compact('bannersQuadrados', 'bannersRetangulares'));
    }
}
