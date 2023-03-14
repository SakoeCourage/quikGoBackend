<?php

namespace App\Providers;
use App\Models\Businessprofile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class Mydirectives extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('businessprofile', function(){
            
            $arr = Auth::user();
           

            return "<?php print('') ?>";
        });
    }
}
