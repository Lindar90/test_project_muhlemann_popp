<?php

namespace App\Providers;

use App\Services\Users\CsvReader;
use App\Services\Users\ReaderInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReaderInterface::class, CsvReader::class);
    }
}
