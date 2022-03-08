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

    $this->app->bind(
        'App\Repository\GraduatedInterfaces',
        'App\Repository\GraduatedRepo'
    );
       $this->app->bind(
        'App\Repository\FeesInterface',
        'App\Repository\FeesRepo'
    );


       $this->app->bind(
        'App\Repository\FeeInvoiceInterface',
        'App\Repository\FeeInvoiceRepo'
    );


    $this->app->bind(
        'App\Repository\StudentAcountInterface',
        'App\Repository\StudentAcountrepo'
    );

       $this->app->bind(
        'App\Repository\FundInterface',
        'App\Repository\FundRepo'

       );

       $this->app->bind(
        'App\Repository\RecieptInterface',
        'App\Repository\RecieptRepo'

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
