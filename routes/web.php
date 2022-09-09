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

// Autho Routes
require __DIR__.'/auth.php';

// Language Switch
Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('home', 'FrontendController@index')->name('home');

    //blog
    Route::get('blog', ['as' => "blog", 'uses' => "FrontendController@blog"]);
    Route::get('blog/{slug}', ['as' => "details-blog", 'uses' => "FrontendController@blogDetails"]);
    Route::get('blog/category/{slug}', ['as' => "category-post", 'uses' => "FrontendController@categoryPost"]);

    //service
    Route::get('service', ['as' => "service", 'uses' => "FrontendController@service"]);
    Route::get('service/{slug}', ['as' => "details-service", 'uses' => "FrontendController@serviceDetails"]);
    Route::get('service/category/{slug}', ['as' => "service-category-post", 'uses' => "FrontendController@serviceCategoryPost"]);
    
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');
    
    //Contact----------------------------
    Route::get('contact', ['as' => "contact", 'uses' => "FrontendController@contact"]);
    Route::post('contact/save', ['as' => "contact_save", 'uses' => "FrontendController@contact_save"]);
    
    // Api integration
    Route::post('api_check', ['as' => "api_check", 'uses' => "ApiController@api_check"]);
    Route::get('get_contacts', ['as' => "get_contacts", 'uses' => "ApiController@get_contacts"]);
    
    Route::post('book_api_check', ['as' => "book_api_check", 'uses' => "ApiController@book_api_check"]);
    Route::get('get_bookings', ['as' => "get_bookings", 'uses' => "ApiController@get_bookings"]);
    
    // booking
    Route::get('booking', ['as' => "booking", 'uses' => "FrontendController@booking"]);
    Route::post('booking/success', ['as' => "update_booking", 'uses' => "FrontendController@updateBooking"]);

    Route::get('booking_success/{slug}', ['as' => "booking_success", 'uses' => "FrontendController@booking_success"]);
    
    
    Route::get('faq', ['as' => "faq", 'uses' => "FrontendController@faq"]);
    Route::get('testimonial', ['as' => "testimonial", 'uses' => "FrontendController@testmonial"]);
    
    Route::get('about', ['as' => "about", 'uses' => "FrontendController@about"]);
    Route::get('director/messages', ['as' => "director_messages", 'uses' => "FrontendController@director_messages"]);
    Route::get('mission/vision', ['as' => "mission_vision", 'uses' => "FrontendController@mission_vision"]);
    Route::get('our/leaders', ['as' => "our_leaders", 'uses' => "FrontendController@our_leaders"]);
    
    Route::get('career', ['as' => "carrer", 'uses' => "FrontendController@carrer"]);
    Route::get('franchise', ['as' => "carrer", 'uses' => "FrontendController@franchise"]);
    
    //partner
    Route::get('partner', ['as' => "partner", 'uses' => "FrontendController@partner"]);
    
    //studyabroad
    Route::get('studyabroad', ['as' => "studyabroad", 'uses' => "FrontendController@studyabroad"]);
    Route::get('studyabroad/{slug}', ['as' => "details-studyabroad", 'uses' => "FrontendController@studyabroadDetails"]);
    
    //scholarship
    Route::get('scholarship', ['as' => "scholarship", 'uses' => "FrontendController@scholarship"]);
    
    

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::get('profile/changePassword/{username}', ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch('profile/changePassword/{username}', ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::delete('users/userProviderDestroy', ['as' => 'users.userProviderDestroy', 'uses' => 'UserController@userProviderDestroy']);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');
    
    //Pages
    Route::get('add/page', ['as' => "addpage", 'uses' => "PageController@addpage"]);
    Route::post('save/page', ['as' => "savepage", 'uses' => "PageController@savepage"]);
    Route::get('all/page', ['as' => "allpages", 'uses' => "PageController@allpages"]);
    Route::get('page/delete/{id}', ['as' => "page_delete", 'uses' => "PageController@page_delete"]);
    Route::get('page/edit/{id}', ['as' => "page_edit", 'uses' => "PageController@page_edit"]);
    Route::post('page/update', ['as' => "pageupdate", 'uses' => "PageController@page_update"]);

    /*===================================================================================
                                            Section Start
    =====================================================================================*/

    //section
    Route::get('section/add', ['as' => 'add-section','uses' => 'SectionController@addSection']);
    Route::get('section/list', ['as' => 'manage-section','uses' => 'SectionController@manageSection']);
    Route::post('section/save', ['as' => 'save-section','uses' => 'SectionController@saveSection']);
    Route::get('section/edit/{id}', ['as' => 'section_edit','uses' => 'SectionController@editSection']);
    Route::post('section/update', ['as' => 'update_section','uses' => 'SectionController@updateSection']);
    Route::get('section/delete/{id}', ['as' => 'delete-section','uses' => 'SectionController@deleteSection']);


    /*===================================================================================
                                            Section End
    =====================================================================================*/


    //user Section-----------------------
    Route::get('create/user', ['as' => 'create-user','uses' => 'UserManageController@create_user']);
    Route::post('user/save', ['as' => 'saveuser','uses' => 'UserManageController@save_user']);
    Route::get('user/list', ['as' => 'allusers','uses' => 'UserManageController@all_users']);
    Route::get('user/edit/{id}', ['as' => 'user-edit','uses' => 'UserManageController@edit_user']);
    Route::post('user/update', ['as' => 'updateuser','uses' => 'UserManageController@update_user']);
    Route::get('user/delete/{id}', ['as' => 'user-delete','uses' => 'UserManageController@delete_user']);
    
    
    //Current Scholorship Section delete------------------------
    Route::get('Current_scholarship/delete', ['as' => 'delete_current_image','uses' => 'SectionController@delete_current_image']);
    
    //Company image delete--------------------------------------
    Route::get('company_image/delete', ['as' => 'delete_company_image','uses' => 'SectionController@delete_company_image']);

    //Our Team Section--------------------
    Route::get('our-team/list', ['as' => 'our_team','uses' => 'SettingsController@our_team']);
    Route::get('our-team/create', ['as' => 'create_our_team','uses' => 'SettingsController@create']);
    Route::post('our-team/save', ['as' => 'save_our_team','uses' => 'SettingsController@save_our_team']);
    Route::get('our-team/delete/{id}', ['as' => 'our_team_delete','uses' => 'SettingsController@our_team_delete']);
    Route::get('our-team/edit/{id}', ['as' => 'our_team_edit','uses' => 'SettingsController@our_team_edit']);
    Route::post('our-team/update', ['as' => 'update_our_team','uses' => 'SettingsController@update_our_team']);

    //Services Category
    Route::get('service/category/add', ['as' => 'add-service-category','uses' => 'ServiceController@addCategory']);
    Route::get('service/category/list', ['as' => 'manage-service-category','uses' => 'ServiceController@manageCategory']);
    Route::post('service/category/save', ['as' => 'save-service-category','uses' => 'ServiceController@saveCategory']);
    Route::get('service/category/edit/{id}', ['as' => 'edit-service-category','uses' => 'ServiceController@editCategory']);
    Route::post('service/category/update', ['as' => 'update-service-category','uses' => 'ServiceController@updateCategory']);
    Route::get('service/category/delete/{id}', ['as' => 'delete-service-category','uses' => 'ServiceController@deleteCategory']);

    //Services
    Route::get('service/add', ['as' => 'add-service','uses' => 'ServiceController@addService']);
    Route::get('service/list', ['as' => 'manage-service','uses' => 'ServiceController@manageService']);
    Route::post('service/save', ['as' => 'save-service','uses' => 'ServiceController@saveService']);
    Route::get('service/edit/{id}', ['as' => 'edit-service','uses' => 'ServiceController@editService']);
    Route::post('service/update', ['as' => 'update-service','uses' => 'ServiceController@updateService']);
    Route::get('service/view/{id}', ['as' => 'view-service','uses' => 'ServiceController@viewService']);
    Route::get('service/delete/{id}', ['as' => 'delete-service','uses' => 'ServiceController@deleteService']);

    // Blog Category
    Route::get('blog/category/add', ['as' => 'add-category','uses' => 'BlogController@addCategory']);
    Route::get('blog/category/list', ['as' => 'manage-category','uses' => 'BlogController@manageCategory']);
    Route::post('blog/category/save', ['as' => 'save-category','uses' => 'BlogController@saveCategory']);
    Route::get('blog/category/edit/{id}', ['as' => 'edit-category','uses' => 'BlogController@editCategory']);
    Route::post('blog/category/update', ['as' => 'update-category','uses' => 'BlogController@updateCategory']);
    Route::get('blog/category/delete/{id}', ['as' => 'delete-category','uses' => 'BlogController@deleteCategory']);

    // Blog Section
    Route::get('blog/add', ['as' => 'add-blog','uses' => 'BlogController@addBlog']);
    Route::get('blog/list', ['as' => 'manage-blog','uses' => 'BlogController@manageBlog']);
    Route::post('blog/save', ['as' => 'save-blog','uses' => 'BlogController@saveBlog']);
    Route::get('blog/edit/{id}', ['as' => 'edit-blog','uses' => 'BlogController@editBlog']);
    Route::post('blog/update', ['as' => 'update-blog','uses' => 'BlogController@updateBlog']);
    Route::get('blog/delete/{id}', ['as' => 'delete-blog','uses' => 'BlogController@deleteBlog']);
    Route::get('blog/view/{id}', ['as' => 'view-blog','uses' => 'BlogController@viewBlog']);
    Route::get('blog/unpublished/{id}', ['as' => 'unpublished-blog','uses' => 'BlogController@unpublishedBlog']);
    Route::get('blog/published/{id}', ['as' => 'published-blog','uses' => 'BlogController@publishedBlog']);
    
    // Study Abroad Section
    Route::get('studyabroad/add', ['as' => 'add-studyabroad','uses' => 'StudyabroadController@addStudyabroad']);
    Route::get('studyabroad/list', ['as' => 'manage-studyabroad','uses' => 'StudyabroadController@manageStudyabroad']);
    Route::post('studyabroad/save', ['as' => 'save-studyabroad','uses' => 'StudyabroadController@saveStudyabroad']);
    Route::get('studyabroad/edit/{id}', ['as' => 'edit-studyabroad','uses' => 'StudyabroadController@editStudyabroad']);
    Route::post('studyabroad/update', ['as' => 'update-studyabroad','uses' => 'StudyabroadController@updateStudyabroad']);
    Route::get('studyabroad/delete/{id}', ['as' => 'delete-studyabroad','uses' => 'StudyabroadController@deleteStudyabroad']);
    
    // Scholarship
    Route::get('scholarship/add', ['as' => 'add-scholarship','uses' => 'ScholarshipController@addScholarship']);
    Route::get('scholarship/list', ['as' => 'manage-scholarship','uses' => 'ScholarshipController@manageScholarship']);
    Route::post('scholarship/save', ['as' => 'save-scholarship','uses' => 'ScholarshipController@saveScholarship']);
    Route::get('scholarship/edit/{id}', ['as' => 'edit-scholarship','uses' => 'ScholarshipController@editScholarship']);
    Route::post('scholarship/update', ['as' => 'update-scholarship','uses' => 'ScholarshipController@updateScholarship']);
    Route::get('scholarship/delete/{id}', ['as' => 'delete-scholarship','uses' => 'ScholarshipController@deleteScholarship']);

    // Partner Section
    Route::get('partner/add', ['as' => 'add-partner','uses' => 'PartnerController@addPartner']);
    Route::get('partner/list', ['as' => 'manage-partner','uses' => 'PartnerController@managePartner']);
    Route::post('partner/save', ['as' => 'save-partner','uses' => 'PartnerController@savePartner']);
    Route::get('partner/edit/{id}', ['as' => 'edit-partner','uses' => 'PartnerController@editPartner']);
    Route::post('partner/update', ['as' => 'update-partner','uses' => 'PartnerController@updatePartner']);
    Route::get('partner/delete/{id}', ['as' => 'delete-partner','uses' => 'PartnerController@deletePartner']);

    // Testimonial Section
    Route::get('testimonial/add', ['as' => 'add-testimonial','uses' => 'TestimonialController@addTestimonial']);
    Route::get('testimonial/list', ['as' => 'manage-testimonial','uses' => 'TestimonialController@manageTestimonial']);
    Route::post('testimonial/save', ['as' => 'save-testimonial','uses' => 'TestimonialController@saveTestimonial']);
    Route::get('testimonial/edit/{id}', ['as' => 'edit-testimonial','uses' => 'TestimonialController@editTestimonial']);
    Route::post('testimonial/update', ['as' => 'update-testimonial','uses' => 'TestimonialController@updateTestimonial']);
    Route::get('testimonial/delete/{id}', ['as' => 'delete-testimonial','uses' => 'TestimonialController@deleteTestimonial']);
    Route::get('testimonial/view/{id}', ['as' => 'view-testimonial','uses' => 'TestimonialController@viewTestimonial']);

    //USer Contact----------------------
    Route::get('user/contact/list', ['as' => 'user_contact_list','uses' => 'ContactController@contact_list']);
    Route::post('user/contact/reply', ['as' => 'reply_user_contact','uses' => 'ContactController@reply_user_contact']);

    // Booking
    Route::get('booking/manage', ['as' => 'booking-manage','uses' => 'BookingController@bookingManage']);
    Route::get('booking/delete/{id}', ['as' => 'booking-delete','uses' => 'BookingController@bookingDelete']);
    
    
    //Setting

    // Faq
    Route::get('faq/add', ['as' => 'add-faq','uses' => 'SettingsController@addFaq']);
    Route::get('faq/list', ['as' => 'manage-faq','uses' => 'SettingsController@manageFaq']);
    Route::post('faq/save', ['as' => 'save-faq','uses' => 'SettingsController@saveFaq']);
    Route::get('faq/edit/{id}', ['as' => 'edit-faq','uses' => 'SettingsController@editFaq']);
    Route::post('faq/update', ['as' => 'update-faq','uses' => 'SettingsController@updateFaq']);
    Route::get('faq/delete/{id}', ['as' => 'delete-faq','uses' => 'SettingsController@deleteFaq']);

     //Contact-------------------------------
    Route::get('contact/list', ['as' => 'contact_list','uses' => 'SettingsController@contact_list']);
    Route::get('contact/create', ['as' => 'contact_create','uses' => 'SettingsController@contact_create']);
    Route::post('contact/save', ['as' => 'contact_save','uses' => 'SettingsController@contact_save']);
    Route::get('contact/delete/{id}', ['as' => 'contact_delete','uses' => 'SettingsController@contact_delete']);
    Route::get('contact/edit/{id}', ['as' => 'contact_edit','uses' => 'SettingsController@contact_edit']);
    Route::post('contact/update', ['as' => 'contact_update','uses' => 'SettingsController@contact_update']);

   //Contact admin email setting---------------------
    Route::get('contact/email', ['as' => 'contact_email','uses' => 'SettingsController@contact_email']);
    Route::post('contact/email/update', ['as' => 'contact_email_update','uses' => 'SettingsController@contact_email_update']);

    //Social setting--------------------
    Route::get('setting/social', ['as' => 'social_setting','uses' => 'SettingsController@social_setting']);
    Route::post('setting/social/update', ['as' => 'social_setting_update','uses' => 'SettingsController@social_setting_update']);
    
    //Profile Setting-------------------
    Route::get('setting/account', ['as' => 'my_account','uses' => 'SettingsController@my_account']);
    Route::post('account/update', ['as' => 'update_my_account','uses' => 'SettingsController@update_my_account']);
    
    //Google analytics-------------------
    Route::get('setting/google/ads', ['as' => 'google_ads','uses' => 'SettingsController@google_ads']);
    Route::post('setting/google/ads/update', ['as' => 'google_ads_update','uses' => 'SettingsController@google_ads_update']);

    //Facebbok Pixel-------------------
    Route::get('setting/facebook/pixel', ['as' => 'facebook_pixel','uses' => 'SettingsController@facebook_pixel']);
    Route::post('setting/facebook/pixel/update', ['as' => 'facebook_pixel_update','uses' => 'SettingsController@facebook_pixel_update']);
    
    //Social link settings------------------
    Route::get('setting/social/link', ['as' => 'social_link','uses' => 'SettingsController@social_link']);
    Route::post('setting/social/link/update', ['as' => 'social_link_update','uses' => 'SettingsController@social_link_update']);
    
    //Others
    Route::get('setting/other', ['as' => 'edit-other','uses' => 'SettingsController@editOther']);
    Route::post('setting/other/update', ['as' => 'update-other','uses' => 'SettingsController@updateOther']);
    
    //Wizard
    Route::get('setting/wizard', ['as' => 'edit-wizard','uses' => 'SettingsController@editWizard']);
    Route::post('setting/wizard/update', ['as' => 'update-wizard','uses' => 'SettingsController@updateWizard']);
    
    //Global settings----------
    Route::get('global/settings/{id}', ['as' => 'global_settings','uses' => 'SettingsController@global_settings']);
    Route::get('global/settings', ['as' => 'global_settings','uses' => 'SettingsController@global_settings']);
    Route::post('global/settings/update', ['as' => 'global_settings_update','uses' => 'SettingsController@global_settings_update']);
    

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});
