<?php

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


Route::get('/', 'HomeController@index')->name('home'); 


Route::get('/terms_and_condition', 'HomeController@terms')->name('terms_and_condition_user'); 

Route::any('/view_profile/{id}', 'HomeController@view_profile')->name('view_profile'); 
Route::post('/add_comment', 'HomeController@add_comment')->name('add_comment'); 
Route::post('/add_complaint', 'HomeController@add_complaint')->name('add_complaint'); 

Route::post('/update_state_cookie', 'HomeController@update_cookie')->name('update_state_cookie'); 

Route::post('/fetch_state', 'HomeController@fetch_state')->name('fetch_state'); 
Route::post('/ajax_search_profile', 'HomeController@ajax_search_profile')->name('ajax_search_profile'); 
Route::post('/count_number', 'HomeController@count_number')->name('count_number'); 
Route::get('/recent_comment', 'HomeController@recent_comment')->name('recent_comment'); 


Route::get('/map', 'HomeController@map'); 
Route::get('/dynamic_map', 'HomeController@dynamic_map'); 
Route::get('/get_map_user', 'HomeController@get_map_user'); 

Route::post('/lock_photo_payment', 'LockPhotoController@paypal')->name('lock_photo_payment'); 
Route::post('/lock_photo_payment_res', 'LockPhotoController@paypalresponse')->name('lock_photo_payment_res'); 
Route::post('/like_photo', 'LockPhotoController@like_photo')->name('like_photo'); 



Route::get('/home_page_search', 'BasicController@home_page_search')->name('home_page_search'); 
Route::post('/add_image_counter', 'BasicController@add_image_counter')->name('add_image_counter'); 
Route::post('/report', 'BasicController@addreport')->name('report'); 








// Route::get('/payment', function () {
//     return view('payment');
// });

Route::get('/verification', function () {
    return view('verification');
});

Route::get('/report', function () {
    return view('report');
});



Route::any('/signup-signin', 'RegisterController@index')->name('user_signup'); 
Route::any('/verification', 'RegisterController@verification')->name('user_verification'); 

  Route::post('/resend_verification', 'RegisterController@resend_verification')->name('resend_verification'); 

Route::any('/signin', 'RegisterController@signin')->name('signin'); 
Route::any('/forgot-password', 'RegisterController@ForgotPassword')->name('forgot_password'); 
Route::any('/reset-password/{id}', 'RegisterController@ResetPassword')->name('reset_password'); 







  Route::any('/payment_response', 'PaymentController@payment_response')->name('payment_response'); 






  Route::middleware('auth')->group(function() {  



  Route::middleware('checkAdvertise')->group(function() {  

            Route::get('/advertise_profile', 'AdvertiseController@index')->name('advertise_profile'); 
            Route::post('/go_live', 'AdvertiseController@go_live')->name('go_live'); 
            Route::any('/advertise_edit_profile', 'AdvertiseController@edit')->name('advertise_edit_profile'); 
            
            Route::post('/user_upload_video', 'AdvertiseController@video')->name('user_upload_video'); 
            Route::post('/user_upload_image', 'AdvertiseController@image')->name('user_upload_image'); 
            Route::post('/user_image_lock', 'AdvertiseController@lock_image')->name('user_image_lock'); 
            Route::post('/user_delete_media', 'AdvertiseController@delete_media')->name('user_delete_media'); 
            Route::post('/request_verification', 'AdvertiseController@request_verification')->name('request_verification'); 
              
             Route::post('/change_notice_status', 'BasicController@change_notice_status')->name('change_notice_status');  
             


            //Boys Testimonial 

            Route::post('/add_testimonial', 'BoysTestimonialController@add_testimonial')->name('add_testimonial');  
            Route::post('/search_testimonial', 'BoysTestimonialController@search_testimonial')->name('search_testimonial');  
        });


//Payment Controller


  Route::get('/payment', 'PaymentController@index')->name('payment'); 
  Route::any('/payment_form', 'PaymentController@payment_form')->name('payment_form'); 
  Route::any('/payment_history', 'PaymentController@payment_history')->name('payment_history'); 
 

//Feature Controller
Route::get('/feature_pay', 'FeatureController@pay')->name('feature_pay'); 
Route::post('/feature_response', 'FeatureController@feature_response')->name('feature_response'); 

//Bump Up Controller
Route::post('/bump_up_profile', 'BumpUpController@bump_up')->name('bump_up_profile'); 
Route::post('/update_pump_up', 'BumpUpController@update_pump_up')->name('update_pump_up'); 

//Chat Controller
  Route::get('/chat', 'ChatController@index')->name('chat'); 
  Route::get('/chat_user_data', 'ChatController@get_user_data')->name('chat_user_data'); 
  Route::post('/chat_file_upload', 'ChatController@chat_file_upload')->name('chat_file_upload'); 
  Route::post('/add_to_block', 'ChatController@block')->name('add_to_block'); 


//Browser controller

  Route::middleware('checkBrowser')->group(function() { 


      Route::get('/browser_profile', 'BrowserController@index')->name('browser_profile'); 
      Route::any('/browser_edit_profile', 'BrowserController@edit')->name('browser_edit_profile'); 
   });



  Route::any('/change_password', 'BrowserController@change_password')->name('change_password'); 
  Route::any('/user_change_email', 'BrowserController@user_change_email')->name('user_change_email'); 



  Route::name('user_logout')->get('/logout',function(){
        Auth::logout();
        return Redirect::route('user_signup',['tab'=>'sign-in'])->with('message','Logout Successfull');

    });
   
  });




//Admin routes
 Route::any('/admin', 'admin\AdminLoginController@adminLogin')->name('admin_login'); 

Route::prefix('admin')->namespace('admin')->group(function(){
  



  Route::middleware('admin')->group(function() {  
 
  Route::get('/dashboard', 'AdminDashboardController@index')->name('admin_dashboard'); 
  Route::any('/change_password', 'AdminDashboardController@change_password')->name('change_admin_password');

  Route::any('/admin_profile', 'AdminDashboardController@admin_profile')->name('admin_profile'); 




   //Services route

  Route::any('/services', 'ServiceController@index')->name('services'); 
  Route::any('/services/{id}', 'ServiceController@edit')->name('edit_service'); 
  Route::post('/delete_service', 'ServiceController@delete')->name('delete_service'); 


   //Notice route

  Route::any('/notice', 'NoticeController@index')->name('notice'); 
  Route::any('/notice/{id}', 'NoticeController@edit')->name('edit_notice'); 
  Route::any('/notice_send', 'NoticeController@send')->name('notice_send'); 
  Route::post('/notice_delete', 'NoticeController@delete')->name('notice_delete'); 




   //Packages route

  Route::any('/packages', 'PackagesController@index')->name('packages'); 
  Route::any('/packages/{id}', 'PackagesController@edit')->name('edit_package'); 
  Route::post('/delete_package', 'PackagesController@delete')->name('delete_package'); 


//States Controller
  
  Route::any('/states', 'StatesController@index')->name('states'); 
  Route::any('/states/{id}', 'StatesController@edit')->name('edit_states'); 


  //Users routes
  Route::any('/users', 'UserController@index')->name('users'); 
  Route::post('/users_verification', 'UserController@verify')->name('users_verification'); 
  Route::post('/user_change_password', 'UserController@Changepassword')->name('user_change_password'); 
  Route::post('/add_wallet_amount', 'UserController@add_amount')->name('add_wallet_amount'); 
  Route::any('/view_users_profile/{id}', 'UserController@view')->name('view_users_profile'); 


//Girls profile 
  Route::any('/girls_profile', 'GirlsController@index')->name('girls_profile'); 
  Route::any('/view_advertise_profile/{id}', 'GirlsController@view')->name('view_advertise_profile'); 

  Route::post('/advertise_upload_video/{id}', 'GirlsController@video')->name('advertise_upload_video'); 
  Route::post('/advertise_upload_image/{id}', 'GirlsController@image')->name('advertise_upload_image'); 
  Route::post('/advertise_image_lock/{id}', 'GirlsController@lock_image')->name('advertise_image_lock'); 
Route::post('/advertise_add_comment', 'GirlsController@add_comment')->name('advertise_add_comment'); 
Route::post('/advertise_add_complaint', 'GirlsController@add_complaint')->name('advertise_add_complaint'); 

  Route::post('/advertise_delete_media', 'GirlsController@delete_media')->name('advertise_delete_media'); 

  Route::post('/advertise_delete_comment', 'GirlsController@delete_comment')->name('advertise_delete_comment'); 
  Route::post('/advertise_delete_complaint', 'GirlsController@delete_complaint')->name('advertise_delete_complaint'); 



//Terms and Condition profile 
  Route::any('/terms_and_conditions', 'TermsConditionController@index')->name('terms_and_conditions'); 


//Custom Fields
  Route::get('/custom_field', 'CustomFieldController@index')->name('custom_field'); 
  Route::post('/add_custom_field', 'CustomFieldController@add')->name('add_custom_field'); 
  Route::any('/update_custom_field/{id}', 'CustomFieldController@edit')->name('update_custom_field'); 
  Route::any('/delete_custom_field', 'CustomFieldController@delete')->name('delete_custom_field'); 
  

//Other Contact Field
  Route::get('/contacts', 'CustomFieldController@contact')->name('contacts'); 
  Route::any('/update_contact_field/{id}', 'CustomFieldController@editcontact')->name('update_contact_field'); 
     

//Go Live Controller
  Route::get('/live', 'LiveController@index')->name('live'); 
  Route::post('/live_config', 'LiveController@live_config')->name('live_config'); 
  Route::post('/change_live_status', 'LiveController@change_status')->name('change_live_status'); 
  Route::post('/change_online_status', 'LiveController@online_status')->name('change_online_status'); 
  Route::post('/change_expiry_date', 'LiveController@change_expiry_date')->name('change_expiry_date'); 

//FeatureController
  Route::get('/feature', 'FeatureController@index')->name('feature'); 
  Route::post('/feature_config', 'FeatureController@feature_config')->name('feature_config'); 


//BumpUpController
  Route::get('/bump_up', 'BumpUpController@index')->name('bump_up'); 
  Route::post('/bump_up_config', 'BumpUpController@config')->name('bump_up_config'); 

//TransactionController
  Route::get('/transaction', 'TransactionController@index')->name('transaction'); 
  Route::any('/get_transaction', 'TransactionController@table')->name('get_transaction'); 
//Reports controller
  Route::get('/reports', 'BasicController@reports')->name('reports'); 
  Route::post('/change_report_status', 'BasicController@report_status')->name('change_report_status'); 
  Route::post('/report_config', 'BasicController@report_config')->name('report_config'); 

  
  Route::get('/admin_notification', 'BasicController@notification')->name('admin_notification'); 
  Route::post('/change_notification_status', 'BasicController@notificationstatus')->name('change_notification_status'); 
 

//Unlock photo controller
  Route::any('/unlock_photo_admin', 'LockPhotoController@index')->name('unlock_photo_admin'); 
  Route::any('/lock_photo_config', 'LockPhotoController@config')->name('lock_photo_config'); 
  Route::any('/pay_photo_amount', 'LockPhotoController@pay_photo_amount')->name('pay_photo_amount'); 

//Chat Controller

  Route::any('/chat', 'ChatController@index')->name('admin_chat'); 
  Route::get('/recent_chat_user', 'ChatController@recent')->name('recent_chat_user'); 



   Route::name('admin_logout')->get('/logout',function(){
        Auth::guard('admin')->logout();
        return Redirect::route('admin_login');

    });


  });
});
