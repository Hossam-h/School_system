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


       $this->app->bind(
        'App\Repository\Processing_feesInterface',
        'App\Repository\Processing_feesRepo'

       );
       $this->app->bind(

        'App\Repository\student_paymentInterface',
        'App\Repository\student_paymentRepo'

       );

       $this->app->bind(

        'App\Repository\AttendanceRepositoryInterface',
        'App\Repository\AttendanceRepository'

       );

       $this->app->bind(

        'App\Repository\SubjectRepositoryInterface',
        'App\Repository\SubjectRepository'

       );

       $this->app->bind(

        'App\Repository\ExamRepositoryInterface',
        'App\Repository\ExamRepository'

       );

       $this->app->bind(

        'App\Repository\QuizzRepositoryInterface',
        'App\Repository\QuizzRepository'

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
