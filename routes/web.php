<?php

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




// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});    


if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}



//===================== Admin Routes =====================//

Route::get("sitemap.xml" , function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
});


Route::get("robots.txt" , function () {
    return \Illuminate\Support\Facades\Redirect::to('robots.txt');
});



Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','prefix'=>'admin'], function () {


    Route::get('/','Admin\AdminController@dashboard');

    Route::get('/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');

    Route::get('account/settings','Admin\UsersController@getSettings');
    Route::post('account/settings','Admin\UsersController@saveSettings');

    Route::get('project', function () {
        return view('dashboard.index-project');
    });

    Route::get('analytics', function () {
        return view('admin.dashboard.index-analytics');
    });


    Route::get('logo/edit','Admin\AdminController@logoEdit')->name('admin.logo.edit');
    Route::post('logo/upload','Admin\AdminController@logoUpload')->name('logo_upload');

    Route::get('favicon/edit','Admin\AdminController@faviconEdit')->name('admin.favicon.edit');

    Route::post('favicon/upload','Admin\AdminController@faviconUpload')->name('favicon_upload');

    Route::get('config/setting', 'Admin\AdminController@configSetting')->name('admin.config.setting');

    Route::get('contact/inquiries','Admin\AdminController@contactSubmissions');
    Route::get('product/inquiries','Admin\AdminController@productInquirySubmissions');
    Route::get('contact/inquiries/{id}','Admin\AdminController@inquiryshow');
    Route::get('newsletter/inquiries','Admin\AdminController@newsletterInquiries');

    Route::any('contact/submissions/delete/{id}','Admin\AdminController@contactSubmissionsDelete');
    Route::any('newsletter/inquiries/delete/{id}','Admin\AdminController@newsletterInquiriesDelete');

    /* Config Setting Form Submit Route */
    Route::post('config/setting','Admin\AdminController@configSettingUpdate')->name('config_settings_update');




//==============================================================//

//==================== Error pages Routes ====================//
    Route::get('403',function (){
        return view('pages.403');
    });

    Route::get('404',function (){
        return view('pages.404');
    });

    Route::get('405',function (){
        return view('pages.405');
    });

    Route::get('500',function (){
        return view('pages.500');
    });
//============================================================//

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users','Admin\\UsersController@Index');
    Route::get('user/create','Admin\\UsersController@create');
    Route::post('user/create','Admin\\UsersController@save');
    Route::get('user/edit/{id}','Admin\\UsersController@edit');
    Route::post('user/edit/{id}','Admin\\UsersController@update');
    Route::get('user/delete/{id}','Admin\\UsersController@destroy');
    Route::get('user/deleted/','Admin\\UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','Admin\\UsersController@restoreUser');


    Route::resource('product', 'Admin\\ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'Admin\\ProductController@destroy']);
    Route::get('order/list', ['as' => 'order.list', 'uses' => 'Admin\\ProductController@orderList']);
    Route::get('order/detail/{id}', ['as' => 'order.list.detail', 'uses' => 'Admin\\ProductController@orderListDetail']);

     //Order Status Change Routes//
    Route::get('status/completed/{id}','Admin\\ProductController@updatestatuscompleted')->name('status.completed');
    Route::get('status/pending/{id}','Admin\\ProductController@updatestatusPending')->name('status.pending');


});

//==============================================================//

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


//===================== Account Area Routes =====================//


Route::get('signin','GuestController@signin')->name('signin');
Route::get('signup','GuestController@signup')->name('signup');
Route::get('account','LoggedInController@account')->name('account');
Route::get('orders','LoggedInController@orders')->name('orders');
Route::get('account-detail','LoggedInController@accountDetail')->name('accountDetail');

Route::post('update/account','LoggedInController@updateAccount')->name('update.account');
Route::get('signout', function() {
        Auth::logout();

        Session::flash('flash_message', 'You have logged out  Successfully');
        Session::flash('alert-class', 'alert-success');

        return redirect('signin');
});

Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::get('account/friends','LoggedInController@friends')->name('friends');
Route::get('account/upload','LoggedInController@upload')->name('upload');
Route::get('account/password','LoggedInController@password')->name('password');

Route::get('/success','OrderController@success')->name('success');

Route::post('update/profile','LoggedInController@update_profile')->name('update_profile');
Route::post('update/uploadPicture','LoggedInController@uploadPicture')->name('uploadPicture');


//===================== Front Routes =====================//

Route::get('/','HomeController@index')->name('home');
Route::get('about','HomeController@about')->name('about');
Route::get('blogs','HomeController@blog')->name('blogs');
Route::get('blog/{id}','HomeController@blog_detail')->name('blog-detail');
Route::get('news-press-release','HomeController@news_press_release')->name('news-press-release');
Route::get('kyocera-award','HomeController@kyocera_award')->name('kyocera-award');
Route::get('review','HomeController@review')->name('review');
Route::post('reviews','HomeController@reviews')->name('reviews');
Route::get('promotions','HomeController@promotions')->name('promotions');
Route::get('product-category/{id}', 'HomeController@product_category')->name('product-category');
// Route::get('store','HomeController@store')->name('store');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('business-solution-application','HomeController@business_solution_application')->name('business-solution-application');
Route::get('managed-document-services','HomeController@managed_document_services')->name('managed-document-services');
Route::get('rj-business-services','HomeController@rj_business_services')->name('rj-business-services');
Route::get('download-drivers','HomeController@download_drivers')->name('download-drivers');
Route::get('order-toner','HomeController@order_toner')->name('order-toner');
Route::get('it-solutions','HomeController@it_solutions')->name('it-solutions');
Route::get('toner-search','HomeController@toner_search')->name('toner-search');
Route::post('productFilter','HomeController@productFilter')->name('productFilter');
Route::post('tonerSearch','HomeController@tonerSearch')->name('tonerSearch');



Route::post('careerSubmit','HomeController@careerSubmit')->name('contactUsSubmit');
Route::post('newsletter-submit','HomeController@newsletterSubmit')->name('newsletterSubmit');
Route::post('update-content','HomeController@updateContent')->name('update-content');

//=================================================================//

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

/*
Route::get('/test', function() {
    App::setlocale('arab');
    dd(App::getlocale());
    if(App::setlocale('arab')) {

    }
});
*/
/* Form Validation */


//===================== Shop Routes Below ========================//

Route::get('store','ProductController@shop')->name('shop');
Route::get('products/{id}','ProductController@shopDetail')->name('shopDetail');
Route::get('category-detail/{id}','ProductController@categoryDetail')->name('categoryDetail');

Route::post('/cartAdd', 'ProductController@saveCart')->name('save_cart');
Route::any('/remove-cart/{id}', 'ProductController@removeCart')->name('remove_cart');
Route::post('/updateCart', 'ProductController@updateCart')->name('update_cart');
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('invoice/{id}','LoggedInController@invoice')->name('invoice');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('/checkout', 'OrderController@checkout')->name('checkout');
Route::post('/place-order', 'OrderController@placeOrder')->name('order.place');
Route::post('/new-order', 'OrderController@newOrder')->name('new.place');
Route::post('shipping', 'ProductController@shipping')->name('shipping');

/*wishlist*/
Route::get('/wishlist', 'WishlistController@index')->name('customer.wishlist.list');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
/*wishlist end*/

Route::post('/language-form', 'ProductController@language')->name('language');

//==============================================================//

Route::get('user-ip', 'HomeController@getusersysteminfo');

//===================== New Crud-Generators Routes Will Auto Display Below ========================//
route::get('status/delivered/{id}','admin\\productcontroller@updatestatusdelivered')->name('status.delivered');
route::get('status/cancelled/{id}','admin\\productcontroller@updatestatuscancelled')->name('status.cancelled');

Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/category', 'Admin\\CategoryController');

Route::resource('admin/banner', 'Admin\\BannerController', ['names' => 'admin.banner']);
Route::get('admin/banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'Admin\\BannerController@destroy']);
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/attributes', 'Admin\\AttributesController');
Route::resource('admin/attributes-value', 'Admin\\AttributesValueController');
Route::post('admin/get-attributes', 'Admin\\AttributesValueController@getdata')->name('get-attributes');
Route::post('admin/pro-img-id-delet', 'Admin\\AttributesValueController@img_delete')->name('pro-img-id-delet');
Route::post('admin/delete-product-variant', 'Admin\\AttributesValueController@deleteProVariant')->name('delete.product.variant');
Route::resource('admin/testimonial', 'Admin\\TestimonialController');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('about/about', 'Admin, User\\AboutController');
Route::resource('news/news', 'Admin\\NewsController');

Route::resource('traning-videos', 'TraningVideosController');
Route::resource('upcomingclasses', 'UpcomingclassesController');

Route::resource('subcategory/subcategory', 'subcategory\SubcategoryController');

Route::resource('newpressrelease/newpressrelease', 'newpressrelease\NewpressreleaseController');
Route::resource('newpressrelease/newpressrelease', 'newpressrelease\NewpressreleaseController');
Route::resource('kyoceraaward/kyoceraaward', 'kyoceraaward\KyoceraawardController');

Route::resource('promotions/promotions', 'promotions\PromotionsController');
Route::resource('media/media', 'media\MediaController');
Route::resource('bannermedia/bannermedia', 'bannermedia\BannermediaController');