<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\Repository\ITickets','App\Models\Repository\impl\TicketsImpl');

    }

    /**
     * Bootstrap any application services.
     *
     * @param ResponseFactory $factory
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function($message = '', $data = null) use ($factory) {
            $format = [
                'code'=>200,
                'status' => 'success',
                'message' => $message,
                'model' => $data,
            ];

            return $factory->make($format,200,array('Content-Type'=>'application/json'));

        });

        $factory->macro('error', function($message = '', $errors = []) use ($factory){
            $format = [
                'code'=>500,
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
                'model'=>[]
            ];

            return $factory->make($format);
        });
    }
}
