<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Adapters\Contracts\{
    GoogleBooksAdapterInterface,
    ViaCepAdapterInterface,
};
use App\Adapters\External\{
    GoogleBooksAdapter,
    ViaCepAdapter,
};

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
        $this->app->bind(GoogleBooksAdapterInterface::class, GoogleBooksAdapter::class);
        $this->app->bind(ViaCepAdapterInterface::class, ViaCepAdapter::class);
    }
}
