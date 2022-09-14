<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function () {

    Route::get('login' , [App\Http\Controllers\Admin\AuthController::class , 'login'])->name('admin.login');
    Route::post('login' , [App\Http\Controllers\Admin\AuthController::class , 'dologin'])->name('admin.dologin');

    Route::group(['namespace' => 'Admin', 'middleware' => ['auth:web','is_admin']], function () {
        Route::get('/' , [App\Http\Controllers\Admin\HomeController::class , 'index'])->name('admin.home');
        Route::get('home' , [App\Http\Controllers\Admin\HomeController::class , 'index'])->name('admin.home');
        Route::get('logout' , [App\Http\Controllers\Admin\AuthController::class , 'logout'])->name('admin.logout');

        ////////// Join Requests ///////////
        Route::get('requests' , [App\Http\Controllers\Admin\UsersController::class , 'join_requests'])->name('admin.requests');
        Route::get('getrequests' , [App\Http\Controllers\Admin\UsersController::class , 'join_requestsajax'])->name('admin.requestsajax');
        Route::get('requests/view/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'join_requests_view'])->name('admin.request.view');
        Route::post('requests/save' , [App\Http\Controllers\Admin\UsersController::class , 'save_request'])->name('admin.save_request');

        //////////////// Mentors /////////////////
        Route::get('mentors/list' , [App\Http\Controllers\Admin\UsersController::class , 'mentors_list'])->name('admin.mentors');
        Route::get('mentors/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'mentor_profile'])->name('admin.mentor.profile');
        Route::post('mentors/save/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'mentor_save'])->name('admin.mentor.save');

        //////////////// Coaches /////////////////
        Route::get('coaches/list' , [App\Http\Controllers\Admin\UsersController::class , 'coaches_list'])->name('admin.coaches');
        Route::get('coaches/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'coaches_profile'])->name('admin.coaches.profile');
        Route::post('coaches/save/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'coaches_save'])->name('admin.coaches.save');

        //////////////// Learner /////////////////
        Route::get('learners/list' , [App\Http\Controllers\Admin\UsersController::class , 'learner_list'])->name('admin.learners');
        Route::get('learners/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'learner_profile'])->name('admin.learners.profile');
        Route::post('learners/save/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'learner_save'])->name('admin.learners.save');

        //////////////// Company /////////////////
        Route::get('company/list' , [App\Http\Controllers\Admin\UsersController::class , 'company_list'])->name('admin.company');
        Route::get('company/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'company_profile'])->name('admin.company.profile');
        Route::post('company/save/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'company_save'])->name('admin.company.save');

        //////////////// Institution /////////////////
        Route::get('institution/list' , [App\Http\Controllers\Admin\UsersController::class , 'institution_list'])->name('admin.institution');
        Route::get('institution/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'institution_profile'])->name('admin.institution.profile');
        Route::post('institution/save/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'institution_save'])->name('admin.institution.save');
        
        //////////////// services /////////////////
        Route::get('services/list' , [App\Http\Controllers\Admin\UsersController::class , 'services_list'])->name('admin.services');
        Route::get('services/profile/{id}' , [App\Http\Controllers\Admin\UsersController::class , 'services_profile'])->name('admin.services.profile');
        Route::get('services' , [App\Http\Controllers\Admin\UsersController::class , 'servicesajax'])->name('admin.servicesajax');
        Route::post('services/edit' , [App\Http\Controllers\Admin\UsersController::class , 'services_edit'])->name('admin.service.edit');

         //////////////// communities /////////////////
         Route::get('communities/list' , [App\Http\Controllers\Admin\CommunityController::class , 'communities_list'])->name('admin.communities');
         Route::get('communities/profile/{id}' , [App\Http\Controllers\Admin\CommunityController::class , 'communities_profile'])->name('admin.communities.profile');
         Route::get('communities' , [App\Http\Controllers\Admin\CommunityController::class , 'communitiesajax'])->name('admin.communitiesajax');
         Route::post('communities/edit' , [App\Http\Controllers\Admin\CommunityController::class , 'communities_edit'])->name('admin.communities.edit');
         Route::get('communities/post/{id}' , [App\Http\Controllers\Admin\CommunityController::class , 'communities_post'])->name('admin.communities.post');
         Route::post('post/edit' , [App\Http\Controllers\Admin\CommunityController::class , 'post_edit'])->name('admin.community.post.edit');

         
         //////////////// quizzes /////////////////
         Route::get('quizzes/list' , [App\Http\Controllers\Admin\QuizzeController::class , 'quizzes_list'])->name('admin.quizzes');
         Route::get('quizzes/profile/{id}' , [App\Http\Controllers\Admin\QuizzeController::class , 'quizzes_profile'])->name('admin.quizzes.profile');
         Route::get('quizzes' , [App\Http\Controllers\Admin\QuizzeController::class , 'quizzesajax'])->name('admin.quizzesajax');
         Route::post('quizzes/edit' , [App\Http\Controllers\Admin\QuizzeController::class , 'quizzes_edit'])->name('admin.quizzes.edit');
         Route::get('quizzes/question/{id}' , [App\Http\Controllers\Admin\QuizzeController::class , 'quizzes_question'])->name('admin.quizzes.question');
         Route::post('question/edit' , [App\Http\Controllers\Admin\QuizzeController::class , 'question_edit'])->name('admin.question.edit');


         
        //////////////// articles /////////////////
        Route::get('articles/list' , [App\Http\Controllers\Admin\ArticleController::class , 'articles_list'])->name('admin.articles');
        Route::get('articles/profile/{id}' , [App\Http\Controllers\Admin\ArticleController::class , 'articles_profile'])->name('admin.articles.profile');
        Route::get('articles' , [App\Http\Controllers\Admin\ArticleController::class , 'articlesajax'])->name('admin.articlesajax');
        Route::post('articles/edit' , [App\Http\Controllers\Admin\ArticleController::class , 'articles_edit'])->name('admin.article.edit');
        Route::post('articles/store' , [App\Http\Controllers\Admin\ArticleController::class , 'articles_save'])->name('admin.article.save');

 //////////////// settings /////////////////
        Route::get('settings' , [App\Http\Controllers\Admin\SettingController::class , 'index'])->name('settings.index');
        Route::post('/settings/{settings}' , [App\Http\Controllers\Admin\SettingController::class , 'update'])->name('settings.update');
       

    });

});