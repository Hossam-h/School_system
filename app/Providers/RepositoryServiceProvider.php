<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
          'App\Repository\TeacherRepositoryInterface',
         'App\Repository\TeacherRepository',

        );
        $this->app->bind(
        'App\Repository\StudentRepoInterface',
        'App\Repository\StudentRepo'
      );

    $this->app->bind(
        'App\Repository\StudentPromotionInterface',
        'App\Repository\StudentPromotionRepo'
    );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
