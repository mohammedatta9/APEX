<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

//    Route::get('/', [App\Http\Controllers\Auth\HomeController::class, 'index']);
    
    Route::get('/clear-cache', function() {
         Artisan::call('cache:clear');
         Artisan::call('route:clear');
         Artisan::call('view:clear');
         Artisan::call('config:cache');
        return '<h1>cache cleared</h1>';
    // return what you want
})->name('clear');
 Route::get('/runn', function() {
         Artisan::call('schedule:run');
          
        return '<h1>run</h1>';
    // return what you want
})->name('runn');


    //Auth::routes();
    ////////////////// Registeration \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showForm'])->name('register');
    Route::get('register/{type}', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('registerbytype');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');

    ////////////////// Login \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('dologin', [App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('dologin');


    ////////////////// Mentors \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('mentors', [App\Http\Controllers\MentorController::class, 'index'])->name('mentors');

     ////////////////// coaches \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('coaches', [App\Http\Controllers\CoacheController::class, 'index'])->name('coaches');

     ////////////////// participate \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('participate', [App\Http\Controllers\SiteController::class, 'participate'])->name('participate');

     ////////////////// communities \\\\\\\\\\\\\\\\\\\\\\\

     ////////////////// quizzes \\\\\\\\\\\\\\\\\\\\\\\
    Route::get('quizzes', [App\Http\Controllers\QuizzeController::class, 'quizzes'])->name('quizzes'); 
    Route::get('quiz/{id}', [App\Http\Controllers\QuizzeController::class, 'quiz_view'])->name('quiz.view');
    Route::get('quiz/start/{id}', [App\Http\Controllers\QuizzeController::class, 'start_quiz'])->name('quiz.start');

//////////// Contact us ////////////////////
    Route::get('contactus' , [App\Http\Controllers\ContactsController::class , 'index'])->name('contactus');

///////////// Pages ////////////////////
    Route::get('aboutus' , [App\Http\Controllers\PagesController::class , 'aboutus'])->name('aboutus');
    Route::get('help' , [App\Http\Controllers\PagesController::class , 'help'])->name('help');
    Route::get('privacy' , [App\Http\Controllers\PagesController::class , 'privacy'])->name('privacy');
    Route::get('terms' , [App\Http\Controllers\PagesController::class , 'terms'])->name('terms');
    Route::get('faqs' , [App\Http\Controllers\PagesController::class , 'faqs'])->name('faqs');
    Route::post('save_nl' , [App\Http\Controllers\NewsletterController::class , 'save'])->name('save_nl');





    Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('home');

    Route::group(['middleware' => ['auth'] ] , function() {
        Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');


        Route::get('settings', [App\Http\Controllers\UserController::class, 'index'])->name('user.settings');

        Route::post('user_update_cover', [App\Http\Controllers\UserController::class, 'update_cover'])->name('user_update_cover');
        Route::post('user_update_photo', [App\Http\Controllers\UserController::class, 'update_photo'])->name('user_update_photo'); 

        Route::get('subscription', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription.index');

        Route::post('learner/settings', [App\Http\Controllers\UserController::class, 'update'])->name('user.learnersettings.save');
        Route::post('learner/securitysettings', [App\Http\Controllers\UserController::class, 'security_settings'])->name('user.learnersettings_security.save');
        Route::post('learner/privacysettings', [App\Http\Controllers\UserController::class, 'privacy_settings'])->name('user.learnersettings_privacy.save');
        Route::post('learner/paymentssettings', [App\Http\Controllers\UserController::class, 'payments_settings'])->name('user.learnersettings_payments.save');
        Route::post('learner/notificationssettings', [App\Http\Controllers\UserController::class, 'notification_settings'])->name('user.notificationssettings_payments.save');

        Route::get('profile_settings', [App\Http\Controllers\UserController::class, 'account_settings'])->name('user.profilesettings');
        Route::post('profile_settings', [App\Http\Controllers\UserController::class, 'update'])->name('user.profilesettings.save');

        Route::get('privacysettings', [App\Http\Controllers\UserController::class, 'index'])->name('user.privacysettings');
        Route::post('privacysettings', [App\Http\Controllers\UserController::class, 'update'])->name('user.privacysettings.save');

        Route::get('paymentmethods', [App\Http\Controllers\UserController::class, 'index'])->name('user.paymentmethods');
        Route::post('paymentmethods', [App\Http\Controllers\UserController::class, 'update'])->name('user.paymentmethods.save');

        Route::get('notificationsettings', [App\Http\Controllers\UserController::class, 'index'])->name('user.notificationsettings');
        Route::post('notificationsettings', [App\Http\Controllers\UserController::class, 'update'])->name('user.notificationsettings.save');

        Route::get('sessionplans', [App\Http\Controllers\UserController::class, 'index'])->name('user.sessionplans');
        Route::post('sessionplans', [App\Http\Controllers\UserController::class, 'update'])->name('user.sessionplans.save');

        Route::get('developmentplans', [App\Http\Controllers\UserController::class, 'index'])->name('user.developmentplans');
        Route::post('developmentplans', [App\Http\Controllers\UserController::class, 'update'])->name('user.developmentplans.save');

        Route::get('communitiessettings', [App\Http\Controllers\UserController::class, 'index'])->name('user.communitiessettings');
        Route::post('communitiessettings', [App\Http\Controllers\UserController::class, 'update'])->name('user.communitiessettings.save');

        Route::get('participatearchive', [App\Http\Controllers\UserController::class, 'index'])->name('user.participatearchive');
        Route::post('participatearchive', [App\Http\Controllers\UserController::class, 'update'])->name('user.participatearchive.save');

        Route::get('mywallet', [App\Http\Controllers\UserController::class, 'index'])->name('user.mywallet');
        Route::post('mywallet', [App\Http\Controllers\UserController::class, 'update'])->name('user.mywallet.save');

        Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
        
      // Route::get('messages', [App\Http\Controllers\MessageController::class, 'index'])->name('user.messages');
        Route::get('files', [App\Http\Controllers\FileController::class, 'index'])->name('user.files');
        
        Route::get('quiz-create/{id}', [App\Http\Controllers\UserController::class, 'quiz_create'])->name('quiz.create');
        Route::get('exercise-create', [App\Http\Controllers\UserController::class, 'exercise_create'])->name('exercise.create');
        Route::get('calender', [App\Http\Controllers\UserController::class, 'calender'])->name('calender');

        
        Route::post('hourly_price_store', [App\Http\Controllers\UserController::class, 'hourly_price_store'])->name('hourly_price.store');
        Route::post('qualification_store', [App\Http\Controllers\UserController::class, 'qualification_store'])->name('qualification.store');

        Route::post('about_store', [App\Http\Controllers\UserController::class, 'about_store'])->name('about.store');
        Route::post('skill_store', [App\Http\Controllers\UserController::class, 'skill_store'])->name('skill.store');

        Route::post('skill_destroy', [App\Http\Controllers\UserController::class, 'skill_destroy'])->name('destroy.skill');
        
        Route::post('service_store', [App\Http\Controllers\UserController::class, 'service_store'])->name('service.store');

        Route::post('serviceb_store', [App\Http\Controllers\UserController::class, 'servicbstore'])->name('servicbstore');

        Route::post('service_edit', [App\Http\Controllers\UserController::class, 'service_edit'])->name('service.edit');
        Route::post('service_delete', [App\Http\Controllers\UserController::class, 'service_delete'])->name('service.delete');
        
        Route::post('serviceedit', [App\Http\Controllers\UserController::class, 'service_edit2'])->name('service.edit2');
        Route::post('date_delete', [App\Http\Controllers\UserController::class, 'date_delete'])->name('sd_time.delete');
        
        Route::post('skill_destroy', [App\Http\Controllers\UserController::class, 'skill_destroy'])->name('destroy.skill');
        Route::post('qualification_destroy', [App\Http\Controllers\UserController::class, 'qualification_destroy'])->name('destroy.qua');
        Route::post('boi_store', [App\Http\Controllers\UserController::class, 'bio_store'])->name('bio.store');
        Route::post('user_img_store', [App\Http\Controllers\UserController::class, 'user_img_store'])->name('user_img.store');
        Route::post('user_imgb_store', [App\Http\Controllers\UserController::class, 'user_imgb_store'])->name('user_imgb.store');
        Route::post('user_video_store', [App\Http\Controllers\UserController::class, 'user_video_store'])->name('user_video.store');
        Route::post('user_video_del', [App\Http\Controllers\UserController::class, 'user_video_del'])->name('user_video.del');


        Route::post('job_title_store', [App\Http\Controllers\UserController::class, 'job_title_store'])->name('job_title.store');
        
        Route::post('pd_plan_store', [App\Http\Controllers\UserController::class, 'pd_plan_store'])->name('pd_plan.store');
        Route::post('pd_plan_edit', [App\Http\Controllers\UserController::class, 'pd_plan_edit'])->name('pd_plan.edit');
        Route::post('pd_plan_delete', [App\Http\Controllers\UserController::class, 'pd_plan_delete'])->name('pd_plan.delete');
        Route::post('pd_gools_store', [App\Http\Controllers\UserController::class, 'pd_gools_store'])->name('pd_gools.store');
        Route::get('dp_profile/{id}', [App\Http\Controllers\SiteController::class, 'dp_profile'])->name('dp.profile');
        Route::post('pd_gools_delete', [App\Http\Controllers\UserController::class, 'pd_gools_delete'])->name('pd_gools.delete');
        Route::get('gool_done', [App\Http\Controllers\UserController::class, 'gool_done'])->name('gool.done');
        Route::post('subgool_delet', [App\Http\Controllers\UserController::class, 'subgool_delet'])->name('subgool.delet');

        Route::get('mentor_profile/{slug}', [App\Http\Controllers\SiteController::class, 'mentor_profile'])->name('mentor.profile');
        Route::get('mentor_search', [App\Http\Controllers\SiteController::class, 'mentor_search'])->name('mentor.search');
        Route::get('mentor_filter', [App\Http\Controllers\SiteController::class, 'mentor_filter'])->name('mentor.filter');
        Route::get('coache_profile/{slug}', [App\Http\Controllers\SiteController::class, 'coache_profile'])->name('coache.profile');
        Route::get('coache_search', [App\Http\Controllers\SiteController::class, 'coache_search'])->name('coache.search');
        Route::get('coache_filter', [App\Http\Controllers\SiteController::class, 'coache_filter'])->name('coache.filter');
        Route::get('learner_profile/{id}', [App\Http\Controllers\SiteController::class, 'learner_profile'])->name('learner.profile');

        Route::post('event_store', [App\Http\Controllers\UserController::class, 'event_store'])->name('event.store');
        Route::post('event_delete', [App\Http\Controllers\UserController::class, 'event_delete'])->name('event.delete');
        
         Route::post('session_store', [App\Http\Controllers\SessionController::class, 'session_store'])->name('session.store');
        Route::post('session_edit', [App\Http\Controllers\SessionController::class, 'session_edit'])->name('session.edit');
        Route::post('session_delete', [App\Http\Controllers\SessionController::class, 'session_delete'])->name('session.delete');
        Route::post('session_time_delete', [App\Http\Controllers\SessionController::class, 'session_time_delete'])->name('s_time.delete');
        
        Route::post('session_plan_store', [App\Http\Controllers\SessionController::class, 'session_plan_store'])->name('session_plan.store');
        Route::get('sp_profile/{id}', [App\Http\Controllers\SessionController::class, 'sp_profile'])->name('sp.profile');
        Route::post('session_plan_edit', [App\Http\Controllers\SessionController::class, 'session_plan_edit'])->name('session_plan.edit');
        Route::post('session_plan_delete', [App\Http\Controllers\SessionController::class, 'session_plan_delete'])->name('session_plan.delete');


        Route::get('get_users/{id}', [App\Http\Controllers\SessionController::class, 'get_users'])->name('get.users');
        Route::get('get_sessions/{id}', [App\Http\Controllers\SessionController::class, 'get_sessions'])->name('get.sessions');
        Route::get('get_session_times/{id}', [App\Http\Controllers\SessionController::class, 'get_session_times'])->name('get.session.times');

        Route::post('sp_session_store', [App\Http\Controllers\SessionController::class, 'sp_session_store'])->name('sp_session.store');
        Route::post('sp_session_delete', [App\Http\Controllers\SessionController::class, 'sp_session_delete'])->name('sp_session.delete');
        Route::get('goal_done', [App\Http\Controllers\SessionController::class, 'goal_done'])->name('goal.done');
        Route::post('goal_delete', [App\Http\Controllers\SessionController::class, 'goal_delet'])->name('goal.delet');
        Route::get('status_sp', [App\Http\Controllers\SessionController::class, 'status_sp'])->name('status.sp');
        
         Route::post('quizze_store', [App\Http\Controllers\QuizzeController::class, 'quizze_store'])->name('quizze.store');
        Route::post('question_store', [App\Http\Controllers\QuizzeController::class, 'question_store'])->name('question.store');
        Route::post('publish_quiz', [App\Http\Controllers\QuizzeController::class, 'publish_quiz'])->name('publish_quiz');

        Route::post('community_store', [App\Http\Controllers\CommunityController::class, 'community_store'])->name('community.store');
        Route::post('community_update_photo', [App\Http\Controllers\CommunityController::class, 'update_photo'])->name('community_update_photo'); 
        Route::post('community_update_cover', [App\Http\Controllers\CommunityController::class, 'update_cover'])->name('community_update_cover'); 
        Route::post('communityedit', [App\Http\Controllers\CommunityController::class, 'community_edit'])->name('community.edit');
        Route::post('leave_community', [App\Http\Controllers\CommunityController::class, 'leave_community'])->name('leavec');
        Route::post('request_join', [App\Http\Controllers\CommunityController::class, 'request_join'])->name('request_join');
        Route::post('cancelrequest', [App\Http\Controllers\CommunityController::class, 'cancelrequest'])->name('cancelrequest');

        Route::post('accept_request', [App\Http\Controllers\CommunityController::class, 'accept_request'])->name('accept_request');
        Route::post('make_admin', [App\Http\Controllers\CommunityController::class, 'make_admin'])->name('make_admin');
        Route::post('delete_admin', [App\Http\Controllers\CommunityController::class, 'delete_admin'])->name('delete_admin');
        Route::post('delete_member', [App\Http\Controllers\CommunityController::class, 'delete_member'])->name('delete_member');
        Route::post('community_delete', [App\Http\Controllers\CommunityController::class, 'community_delete'])->name('community.delete');

        Route::post('post.store', [App\Http\Controllers\CommunityController::class, 'post_store'])->name('post.store');
        Route::post('post.edit', [App\Http\Controllers\CommunityController::class, 'post_edit'])->name('post.edit');
        Route::post('post.delete', [App\Http\Controllers\CommunityController::class, 'post_delete'])->name('post.delete');
        Route::get('post_profile/{id}', [App\Http\Controllers\CommunityController::class, 'post_profile'])->name('post_profile');
        
        Route::post('article_store', [App\Http\Controllers\ArticleController::class, 'article_store'])->name('article_store');
        Route::post('article_edit', [App\Http\Controllers\ArticleController::class, 'article_edit'])->name('article_edit');
        Route::post('article_delete', [App\Http\Controllers\ArticleController::class, 'article_delete'])->name('article_delete');

        
        Route::post('quiz_result', [App\Http\Controllers\QuizzeController::class, 'quiz_result'])->name('quiz_result');
        Route::post('quizze_edit', [App\Http\Controllers\QuizzeController::class, 'quizze_edit'])->name('quizze.edit');
        Route::post('quizze_delete', [App\Http\Controllers\QuizzeController::class, 'quizze_delete'])->name('quizze.delete');
        Route::post('question_edit', [App\Http\Controllers\QuizzeController::class, 'question_edit'])->name('question.edit');
        Route::post('question_delete', [App\Http\Controllers\QuizzeController::class, 'question_delete'])->name('question.delete');
        Route::post('delete_option', [App\Http\Controllers\QuizzeController::class, 'delete_option'])->name('delete_option');
        Route::post('delete_skill', [App\Http\Controllers\QuizzeController::class, 'delete_skill'])->name('delete_skill');
        
        Route::post('result_store', [App\Http\Controllers\QuizzeController::class, 'result_store'])->name('result.store');
        Route::post('result_edit', [App\Http\Controllers\QuizzeController::class, 'result_edit'])->name('result.edit');
        Route::post('result_delete', [App\Http\Controllers\QuizzeController::class, 'result_delete'])->name('result.delete');
       
         // pay_participate_w
       Route::post('pay_participate_w', [App\Http\Controllers\User_participateController::class, 'pay_participate_w'])->name('pay_participate_w');
       Route::get('status_ss', [App\Http\Controllers\User_participateController::class, 'status_ss'])->name('status.s.session');
        Route::post('cancel_participate', [App\Http\Controllers\User_participateController::class, 'cancel_participate'])->name('cancel.participate');



       Route::post('file_store', [App\Http\Controllers\UserFileController::class, 'file_store'])->name('file.store');
       Route::post('file_delete', [App\Http\Controllers\UserFileController::class, 'file_delete'])->name('file.delete');
       Route::get('files', [App\Http\Controllers\UserFileController::class, 'index'])->name('user.files');

       Route::post('folder_store', [App\Http\Controllers\UserFileController::class, 'folder_store'])->name('folder.store');
       Route::post('folder_delete', [App\Http\Controllers\UserFileController::class, 'folder_delete'])->name('folder.delete');
       Route::post('folder_edit', [App\Http\Controllers\UserFileController::class, 'folder_edit'])->name('folder.edit');
       Route::get('folder/{id}', [App\Http\Controllers\UserFileController::class, 'folder'])->name('folder');
       Route::post('file_delete2', [App\Http\Controllers\UserFileController::class, 'file_delete2'])->name('file.delete2');
       Route::post('file_edit', [App\Http\Controllers\UserFileController::class, 'file_edit'])->name('file.edit');
       
      Route::get('session-profile/{id}', [App\Http\Controllers\SessionController::class, 'session_profile'])->name('session_profile');
      Route::get('ss-profile/{id}', [App\Http\Controllers\SessionController::class, 'ss_profile'])->name('ss_profile');

      Route::post('review_user', [App\Http\Controllers\ReviewController::class, 'review_user'])->name('review.user');
      Route::post('review_destroy', [App\Http\Controllers\ReviewController::class, 'review_destroy'])->name('destroy.review');

      Route::post('c_review', [App\Http\Controllers\CommReviewController::class, 'review'])->name('review.c');
      Route::post('c_review_destroy', [App\Http\Controllers\CommReviewController::class, 'review_destroy'])->name('c.destroy.review');

      Route::post('cp_review', [App\Http\Controllers\CommPostReviewController::class, 'review'])->name('review.cp');
      Route::post('cp_review_destroy', [App\Http\Controllers\CommPostReviewController::class, 'review_destroy'])->name('cp.destroy.review');

    });
    Route::get('quiz/result/{id}', [App\Http\Controllers\QuizzeController::class, 'result_quiz'])->name('quiz.result');

     Route::get('communities', [App\Http\Controllers\MentorController::class, 'communities'])->name('communities');
     Route::get('community_search', [App\Http\Controllers\CommunityController::class, 'community_search'])->name('community_search');
     Route::get('community_profile/{slug}', [App\Http\Controllers\CommunityController::class, 'community_profile'])->name('community.profile');
     Route::get('community_filter', [App\Http\Controllers\CommunityController::class, 'community_filter'])->name('community.filter');
     
      Route::get('articles', [App\Http\Controllers\ArticleController::class, 'articles'])->name('articles');
      Route::get('article_search', [App\Http\Controllers\ArticleController::class, 'article_search'])->name('article_search');
      Route::get('article_profile/{slug}', [App\Http\Controllers\ArticleController::class, 'article_profile'])->name('article_profile');

      Route::get('JoinRequest', [App\Http\Controllers\JoinRequestController::class, 'index']);
      Route::get('success', [App\Http\Controllers\JoinRequestController::class, 'success']);
      Route::post('JoinRequestt', [App\Http\Controllers\JoinRequestController::class, 'store'])->name('JoinRequest.save');
    
        Route::get('mentor_profile/{slug}', [App\Http\Controllers\SiteController::class, 'mentor_profile'])->name('mentor.profile');
        Route::get('mentor_search', [App\Http\Controllers\SiteController::class, 'mentor_search'])->name('mentor.search');
        Route::get('mentor_filter', [App\Http\Controllers\SiteController::class, 'mentor_filter'])->name('mentor.filter');
        Route::get('coache_profile/{slug}', [App\Http\Controllers\SiteController::class, 'coache_profile'])->name('coache.profile');
        Route::get('coache_search', [App\Http\Controllers\SiteController::class, 'coache_search'])->name('coache.search');
        Route::get('coache_filter', [App\Http\Controllers\SiteController::class, 'coache_filter'])->name('coache.filter');
        Route::get('get_cities/{name}', [App\Http\Controllers\SiteController::class, 'get_cities'])->name('get.cities');
        Route::get('company_profile/{slug}', [App\Http\Controllers\SiteController::class, 'company_profile'])->name('company.profile');
           
        Route::get('details_service/{slug}', [App\Http\Controllers\SiteController::class, 'Details'])->name('details.service');
        Route::get('service_search', [App\Http\Controllers\SiteController::class, 'service_search'])->name('service.search');
        Route::get('service_filter', [App\Http\Controllers\SiteController::class, 'service_filter'])->name('service.filter');

        Route::get('quizze_search', [App\Http\Controllers\QuizzeController::class, 'quizze_search'])->name('quiz.search');
        Route::get('quizze_filter', [App\Http\Controllers\QuizzeController::class, 'quizze_filter'])->name('quizze.filter');
        // Google login
        Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
        Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
        
        // Facebook login
        Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');

        
        //cron job
        Route::get('sessintime', [App\Http\Controllers\CronJobController::class, 'sessintime'])->name('sessintime');
        Route::get('sessintime2', [App\Http\Controllers\CronJobController::class, 'sessintime2'])->name('sessintime2');


});

