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

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('agent/login', 'Agent\LoginController@showLoginForm')->name('agent.login');
// Route::post('agent/login', 'Agent\LoginController@login');
// Route::post('agent/logout', 'Agent\LoginController@logout')->name('agent.logout');

Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
//services
Route::get('/categories', 'ServiceController@viewCategory');
Route::get('/categories/{id}', 'ServiceController@editCategory');
Route::get('/delete-categories/{id}', 'ServiceController@deleteCategory');
Route::post('/create-categories', 'ServiceController@createCategory');
Route::post('/update-categories', 'ServiceController@updateCategory');

Route::get('/services/{id}', 'ServiceController@viewService');
Route::post('/create-services', 'ServiceController@createService');
Route::post('/update-services', 'ServiceController@updateService');
Route::get('/edit-services/{id}', 'ServiceController@editService');
Route::get('/delete-services/{id}', 'ServiceController@deleteService');
//customer
Route::get('/customer', 'CustomerController@viewCustomer');
Route::get('/get-customer', 'CustomerController@getCustomer');
Route::get('/manage-address/{id}', 'CustomerController@manageAddress');
Route::get('/edit-address/{id}', 'CustomerController@editAddress');
//order
Route::get('/order', 'OrderController@orders');
Route::get('/changeStatus', 'OrderController@changeStatus');
Route::get('/changeStatusview', 'OrderController@changeStatusview');
Route::get('/get-order/{filter}', 'OrderController@getOrder');
Route::get('/view-order/{id}', 'OrderController@viewOrder');
Route::POST('/assign-agent', 'OrderController@assignAgent');
Route::get('/assign-agent-view', 'OrderController@assignAgentview');
Route::get('/add-item/{id}', 'OrderController@addItem');
Route::get('/get-item-price/{id}', 'OrderController@getItemPrice');
Route::post('/save-item', 'OrderController@saveItem');

Route::get('/order-print/{id}', 'OrderController@OrderPrint');
Route::get('/invoice-send-mail/{id}', 'OrderController@invoiceSendMail');


// coupon Management
Route::get('/coupon','CouponController@index');
Route::get('/addCoupon','CouponController@addCoupon');
Route::get('/viewCoupon/{id}','CouponController@viewCoupon');
Route::post('/CouponSave','CouponController@CouponSave');
Route::post('/CouponUpdate','CouponController@CouponUpdate');
Route::get('/CouponEdit/{id}','CouponController@CouponEdit');
Route::get('/CouponDelete/{id}','CouponController@CouponDelete');
Route::get('/get_coupon_service/{id}','CouponController@get_coupon_service');
Route::get('/get_coupon_user/{id}','CouponController@get_coupon_user');


// user Management
Route::get('/user','UserController@index');
Route::post('/UserSave','UserController@UserSave');
Route::post('/UserUpdate','UserController@UserUpdate');
Route::get('/UserEdit/{id}','UserController@UserEdit');
Route::get('/UserDelete/{id}','UserController@UserDelete');

// Role Management
Route::get('/role','UserController@viewRole');
Route::post('/roleSave','UserController@roleSave');
Route::post('/roleUpdate','UserController@roleUpdate');
Route::get('/roleEdit/{id}','UserController@roleEdit');
Route::get('/roleDelete/{id}','UserController@roleDelete');

// HomeSlider Management
Route::get('/homeSlider','SettingController@homeSlider');
Route::post('/sliderSave','SettingController@sliderSave');
Route::post('/sliderUpdate','SettingController@sliderUpdate');
Route::post('/changeSliderOrder','SettingController@changeSliderOrder');
Route::get('/sliderEdit/{id}','SettingController@sliderEdit');
Route::get('/sliderDelete/{id}','SettingController@sliderDelete');


// Agent Management
Route::get('/agent','SettingController@Agent');
Route::post('/AgentSave','SettingController@AgentSave');
Route::post('/AgentUpdate','SettingController@AgentUpdate');
Route::get('/AgentEdit/{id}','SettingController@AgentEdit');
Route::get('/AgentDelete/{id}','SettingController@AgentDelete');


// Item Management
Route::get('/item','ServiceController@Item');
Route::post('/ItemSave','ServiceController@ItemSave');
Route::post('/ItemUpdate','ServiceController@ItemUpdate');
Route::get('/ItemEdit/{id}','ServiceController@ItemEdit');
Route::get('/ItemDelete/{id}','ServiceController@ItemDelete');


Route::get('order-report', 'ReportController@viewOrderReport');
Route::post('order-report', 'ReportController@getOrderReport');


Route::get('order-item-report', 'ReportController@viewOrderItemReport');
Route::post('order-item-report', 'ReportController@getOrderItemReport');




//week
Route::get('/weeks', 'ScheduleController@showWeeks');

Route::get('/schedule/{id}', 'ScheduleController@viewSchedule');
Route::post('/save-schedule', 'ScheduleController@saveSchedule');
Route::post('/update-schedule', 'ScheduleController@updateSchedule');
Route::get('/edit-schedule/{id}', 'ScheduleController@editSchedule');
Route::get('/delete-schedule/{id}', 'ScheduleController@deleteSchedule');

//notification
Route::POST('/save-notification', 'NotificationController@saveNotification');
Route::POST('/update-notification', 'NotificationController@updateNotification');
Route::get('/notification/{id}', 'NotificationController@editNotification');
Route::get('/push-notification', 'NotificationController@Notification');
Route::get('/notification-delete/{id}', 'NotificationController@deleteNotification');

//city
	// Route::POST('/save-city', 'AreaController@saveCity');
	// Route::POST('/update-city', 'AreaController@updateCity');
	// Route::get('/city/{id}', 'AreaController@editCity');
	// Route::get('/city', 'AreaController@City');
	// Route::get('/city-delete/{id}', 'AreaController@deleteCity');

	//area
	Route::POST('/save-area', 'AreaController@saveArea');
	Route::POST('/update-area', 'AreaController@updateArea');
	Route::get('/edit-area/{id}', 'AreaController@editArea');
	Route::get('/area', 'AreaController@Area');
	Route::get('/area-delete/{id}', 'AreaController@deleteArea');


	Route::POST('/update-settings', 'SettingController@updateSettings');
	Route::get('/settings', 'SettingController@settings');

Auth::routes();
