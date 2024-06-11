<?php
 
namespace App\Providers;
 
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
    }

    public function boot()
    {
        Facades\View::composer('header', MenuComposer::class);
    }
}
?>