<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Usamamuneerchaudhary\Commentify\Providers\CommentifyServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

         // Register CommentifyServiceProvider
         $this->app->register(CommentifyServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::unguard();
    }
}
