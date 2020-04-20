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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'WelcomeController@frontend')->name('welcome');
});

route::get('list', 'FrontendController@list');
route::get('list/search', 'FrontendController@product_find');
route::get('product/{id}', 'FrontendController@product_detail');

route::get('contact', 'FrontendController@contact');
route::get('faq', 'FrontendController@faq');
route::get('blog', 'FrontendController@blog');
route::get('blog/{id}', 'FrontendController@detail_blog');

Route::post('/subscription','FrontendController@subscription');

// Route::get('/admin', 'WelcomeController@admin');

// Authentication Routes
Auth::routes();

Route::get('/ip-admin', 'WelcomeController@admin')->middleware(['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']);
Route::group(['prefix' => 'ip-admin', 'middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function(){
    //Maintenance
    Route::get('/maintenance', function(){
        Artisan::call('down');
    });
    
    //Banner
    route::get('banner','BannerController@index');
    route::post('banner/post','BannerController@update');

    //Blog
    route::get('blog','BlogController@index');
    route::get('blog/post','BlogController@create');
    route::post('blog/post/store','BlogController@store');
    
    // Category
    route::get('category', 'CategoryController@index');
    route::post('category/add', 'CategoryController@store');
    route::get('category/edit/{id}', 'CategoryController@edit');
    route::post('category/update/{id}', 'CategoryController@update');
    route::get('category/delete/{id}', 'CategoryController@destroy');

    // Product
    route::get('product', 'ProductController@index');
    route::get('product/add', 'ProductController@create');
    route::post('product/add/store', 'ProductController@store');
    route::get('product/edit/{id}', 'ProductController@edit');
    route::post('product/update/{id}', 'ProductController@update');
    route::get('product/destroy', 'ProductController@destroy');

    // Site Setting
    route::get('site', 'SiteController@index');
    route::post('site/update', 'SiteController@updatesite');

    // Site Payment
    route::post('site/payment/add', 'SiteController@store_payment');
    route::get('site/payment/edit/{id}', 'SiteController@edit_payment');
    route::post('site/payment/update/{id}', 'SiteController@update_payment');
    route::get('site/payment/delete/{id}', 'SiteController@delete_payment');

    // Contact
    route::get('contact', 'ContactController@index');
    route::post('contact/update', 'ContactController@update');

    // Faq
    route::get('faq', 'FaqController@index');
    route::post('faq/store', 'FaqController@store');
    route::get('faq/edit/{id}', 'FaqController@edit');
    route::post('faq/update/{id}', 'FaqController@update');
    route::get('faq/delete/{id}', 'FaqController@destroy');

    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');
});


Route::get('/member-area', 'MemberAreaController@index')->middleware(['auth', 'activated', 'activity', 'twostep', 'checkblocked']);
Route::group(['prefix' => 'member-area', 'middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function(){

    route::get('account','MemberAreaController@account');

     // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController',
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    
});
    
























































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

     // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController',
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );

   
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    
});

Route::redirect('/php', '/phpinfo', 301);