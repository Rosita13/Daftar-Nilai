<?php

namespace App\Providers;

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
         // mendaftarkan contact 
       
       $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');

        $this->app->when('App\Http\Controllers\StudentController')
            ->needs('App\Domain\Contracts\StudentInterface')
            ->give('App\Domain\Repositories\StudentRepository');

        $this->app->when('App\Http\Controllers\ValueController')
            ->needs('App\Domain\Contracts\ValueInterface')
            ->give('App\Domain\Repositories\ValueRepository');

        $this->app->when('App\Http\Controllers\KelasController')
            ->needs('App\Domain\Contracts\KelasInterface')
            ->give('App\Domain\Repositories\KelasRepository');

        $this->app->when('App\Http\Controllers\SubjectController')
            ->needs('App\Domain\Contracts\SubjectInterface')
            ->give('App\Domain\Repositories\SubjectRepository');

        $this->app->when('App\Http\Controllers\TeacherController')
            ->needs('App\Domain\Contracts\TeacherInterface')
            ->give('App\Domain\Repositories\TeacherRepository');
    }
}
