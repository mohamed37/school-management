<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class); 

        $this->app->bind(
                'App\Repository\TeacherRepositoryInterface',
                'App\Repository\TeacherRepository'
            );

            $this->app->bind(
                'App\Repository\StudentRepositoryInterface',
                'App\Repository\StudentRepository'
            );

            $this->app->bind(
                'App\Repository\PromotionRepositoryInterface',
                'App\Repository\PromotionRepository'
            );

            $this->app->bind(
                'App\Repository\GraduateRepositoryInterface',
                'App\Repository\GraduateRepository'
            );
            $this->app->bind(
                'App\Repository\FeesRepositoryInterface',
                'App\Repository\FeesRepository'
            );
            $this->app->bind(
                'App\Repository\FeesInvoicesRepositoryInterface',
                'App\Repository\FeesInvoicesRepository'
            );
            $this->app->bind(
                'App\Repository\ReceiptStudentsRepositoryInterface',
                'App\Repository\ReceiptStudentsRepository'
            );

            $this->app->bind(
                'App\Repository\ProcessingFeeRepositoryInterface',
                'App\Repository\ProcessingFeeRepository'
            );

            $this->app->bind(
                'App\Repository\PaymentStudentRepositoryInterface',
                'App\Repository\PaymentStudentRepository'
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
                'App\Repository\QuizzeRepositoryInterface',
                'App\Repository\QuizzeRepository'
            );

            $this->app->bind(
                'App\Repository\QuestionRepositoryInterface',
                'App\Repository\QuestionRepository'
            );

            $this->app->bind(
                'App\Repository\LibraryRepositoryInterface',
                'App\Repository\LibraryRepository'
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
