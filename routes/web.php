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

//Route::get('/', function () {
//    return view('frontend.layout.header');
//});
Auth::routes();
Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/admin/userlogin', [App\Http\Controllers\Auth\LoginController::class, 'userlogin']);
Route::group(['middleware' =>['auth', 'admin']], function()
{
 Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboards');
    // Role
    Route::get('/deleterole/{id}',[App\Http\Controllers\User\UserController::class, 'deleterole']);
    Route::get('roles', [App\Http\Controllers\User\UserController::class, 'roles'])->name('roles');
    Route::get('role/{id?}',[App\Http\Controllers\User\UserController::class, 'role']);
    Route::post('/saverole', [App\Http\Controllers\User\UserController::class, 'saverole']);
     //Users
    Route::get('/deleteuser/{id}', [App\Http\Controllers\User\UserController::class, 'deleteuser']);
    Route::get('users', [App\Http\Controllers\User\UserController::class, 'users'])->name('users');
    Route::get('user/{id?}', [App\Http\Controllers\User\UserController::class, 'user']);
    Route::post('/saveuser', [App\Http\Controllers\User\UserController::class, 'saveuser']);
    //User Messages
    Route::get('/usermessages', [App\Http\Controllers\User\UserController::class, 'usermessages']);
    Route::get('/messagemodal/{id}', [App\Http\Controllers\User\UserController::class, 'usermessages']);
    //Users Videos
    Route::get('/deletevideo/{id}', [App\Http\Controllers\User\UserController::class, 'deletevideo']);
    Route::get('video', [App\Http\Controllers\User\UserController::class, 'video'])->name('video');
    Route::get('videos/{id?}', [App\Http\Controllers\User\UserController::class, 'videos']);
    Route::post('/savevideo', [App\Http\Controllers\User\UserController::class, 'savevideo']);

   //Settings
    Route::get('/settings', [App\Http\Controllers\Settings\SettingsController::class, 'settings']);
    Route::get('/setting/{id?}', [App\Http\Controllers\Membership\MembershipController::class, 'setting']);
    Route::post('/saveportalsettings', [App\Http\Controllers\Settings\SettingsController::class, 'saveportalsettings']);
    Route::get('/deletesetting/{id}', [App\Http\Controllers\Membership\MembershipController::class, 'deletesetting']);
   //Business
   Route::get('/business', [App\Http\Controllers\Business\BusinessController::class, 'business']);
   Route::get('/businesses/{id?}', [App\Http\Controllers\Business\BusinessController::class, 'businesses']);
   Route::post('/savebusiness', [App\Http\Controllers\Business\BusinessController::class, 'savebusiness']);
   Route::get('/deletebusiness/{id}', [App\Http\Controllers\Business\BusinessController::class, 'deletebusiness']);
   Route::post('/upload_file', [App\Http\Controllers\Business\BusinessController::class, 'upload_file']);
   Route::post('/uploadImage', [App\Http\Controllers\Business\BusinessController::class, 'uploadImage']);
    Route::post('/removeimg', [App\Http\Controllers\Business\BusinessController::class, 'removeimg']);
   //Business Request
   Route::get('/accepted', [App\Http\Controllers\Business\BusinessController::class, 'accepted']);
   Route::get('/rejected', [App\Http\Controllers\Business\BusinessController::class, 'rejected']);
   Route::get('/pending', [App\Http\Controllers\Business\BusinessController::class, 'pending']);
   Route::get('/business_details/{id}', [App\Http\Controllers\Business\BusinessController::class, 'businessdetails']);
    Route::get('/approve_request/{id}', [App\Http\Controllers\Business\BusinessController::class, 'approve_request']);
    Route::get('/reject_request/{id}', [App\Http\Controllers\Business\BusinessController::class, 'reject_request']);
    Route::get('/purchased', [App\Http\Controllers\Business\BusinessController::class, 'purchased']);
     Route::get('/reserved', [App\Http\Controllers\Business\BusinessController::class, 'reserved']);
   
   
   //Business Owners
   Route::get('/business_owners', [App\Http\Controllers\Business\BusinessController::class, 'business_owners']);
   //Vehicles
   Route::get('/vehicle', [App\Http\Controllers\Vehicles\VehiclesController::class, 'vehicle']);
   Route::get('/vehicles/{id?}', [App\Http\Controllers\Vehicles\VehiclesController::class, 'vehicles']);
   Route::post('/savevehicles', [App\Http\Controllers\Vehicles\VehiclesController::class, 'savevehicles']);
   Route::get('/deletevehicle/{id}', [App\Http\Controllers\Vehicles\VehiclesController::class, 'deletevehicle']);
   Route::get('/vehiclemodal/{id}', [App\Http\Controllers\Vehicles\VehiclesController::class, 'vehiclemodal']);
   //Packages
   Route::get('/package', [App\Http\Controllers\Packages\PackagesController::class, 'package']);
   Route::get('/packagemodal/{id}', [App\Http\Controllers\Packages\PackagesController::class, 'packagemodal']);
   Route::get('/packages/{id?}', [App\Http\Controllers\Packages\PackagesController::class, 'packages']);
   Route::post('/savepackage', [App\Http\Controllers\Packages\PackagesController::class, 'savepackage']);
   Route::get('/deletepackage/{id}', [App\Http\Controllers\Packages\PackagesController::class, 'deletepackage']);
   //Customers
   Route::get('/customer', [App\Http\Controllers\Customers\CustomersController::class, 'customer']);
   Route::get('/customers/{id?}', [App\Http\Controllers\Customers\CustomersController::class, 'customers']);
   Route::post('/savecustomer', [App\Http\Controllers\Customers\CustomersController::class, 'savecustomer']);
   Route::get('/deletecustomer/{id}', [App\Http\Controllers\Customers\CustomersController::class, 'deletecustomer']);
   Route::get('/customermodal/{id}', [App\Http\Controllers\Customers\CustomersController::class, 'customermodal']);
   //Affiliates
   Route::get('/affiliate', [App\Http\Controllers\Affiliate\AffiliateController::class, 'affiliate']);
   Route::get('/affiliates/{id?}', [App\Http\Controllers\Affiliate\AffiliateController::class, 'affiliates']);
   Route::post('/saveAffiliate', [App\Http\Controllers\Affiliate\AffiliateController::class, 'saveAffiliate']);
   Route::get('/deleteAffiliate/{id}', [App\Http\Controllers\Affiliate\AffiliateController::class, 'deleteAffiliate']);
   Route::post('/upload_file', [App\Http\Controllers\Affiliate\AffiliateController::class, 'upload_file']);
   //Position
   Route::get('/position', [App\Http\Controllers\Careers\CareerController::class, 'position']);
   Route::get('/positions/{id?}', [App\Http\Controllers\Careers\CareerController::class, 'positions']);
   Route::post('/saveposition', [App\Http\Controllers\Careers\CareerController::class, 'saveposition']);
   Route::get('/deleteposition/{id}', [App\Http\Controllers\Careers\CareerController::class, 'deleteposition']);
   //Careers
   Route::get('/career', [App\Http\Controllers\Careers\CareerController::class, 'career']);
   Route::get('/careermodal/{id}', [App\Http\Controllers\Careers\CareerController::class, 'careermodal']);
   Route::get('/careers/{id?}', [App\Http\Controllers\Careers\CareerController::class, 'careers']);
   Route::post('/savecareer', [App\Http\Controllers\Careers\CareerController::class, 'savecareer']);
   Route::get('/deletecareers/{id}', [App\Http\Controllers\Careers\CareerController::class, 'deletecareers']);
   //Bookings
   Route::get('/booking', [App\Http\Controllers\Business\BusinessController::class, 'booking']);
   

  //logout Route
   Route::get('/adminlogout', [App\Http\Controllers\User\UserController::class, 'adminlogout']);
 //Country
   Route::get('/country', [App\Http\Controllers\Location\LocationController::class, 'country']);
   Route::get('/countries/{id?}',[App\Http\Controllers\Location\LocationController::class, 'countries']);
   Route::post('/savecountries', [App\Http\Controllers\Location\LocationController::class, 'savecountries']);
   Route::get('/deletecountry/{id}', [App\Http\Controllers\Location\LocationController::class, 'deletecountry']);
//Location
   Route::get('/loction', [App\Http\Controllers\Location\LocationController::class, 'loction']);
   Route::get('/loctions/{id?}',[App\Http\Controllers\Location\LocationController::class, 'loctions']);
   Route::post('/saveloction', [App\Http\Controllers\Location\LocationController::class, 'saveloction']);
   Route::get('/deleteloction/{id}', [App\Http\Controllers\Location\LocationController::class, 'deleteloction']);
   Route::get('/getcities/{id}', [App\Http\Controllers\Location\LocationController::class, 'getcities']);

});

});
//Frontend
  Route::get('/businesreg',[App\Http\Controllers\Frontend\LoginController::class,'userlogin']);
  Route::post('/userlog',[App\Http\Controllers\Frontend\LoginController::class,'userlog']);
  Route::get('/logout',[App\Http\Controllers\Frontend\LoginController::class,'logout']);
  Route::post('/businesregsave',[App\Http\Controllers\Frontend\LoginController::class, 'register_user']);

  Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'home']);

  Route::get('/forget-password',[App\Http\Controllers\Frontend\PagesController::class,'forget_pass']);
  Route::get('/about',[App\Http\Controllers\Frontend\PagesController::class,'about']);
  Route::get('/contacts',[App\Http\Controllers\Frontend\ContactController::class,'contacts']);
  Route::post('/savesubscriber',[App\Http\Controllers\Frontend\ContactController::class,'save_subscriber']);
  Route::post('/savecontact',[App\Http\Controllers\Frontend\ContactController::class,'savecontact']);
  Route::get('/businesses/{type}',[App\Http\Controllers\Frontend\PagesController::class,'businesses']);
  Route::get('/business_details/{id}',[App\Http\Controllers\Frontend\PagesController::class,'business_details']);
  Route::get('/memberships',[App\Http\Controllers\Frontend\PagesController::class,'memberships']);
  Route::get('/bookings/{id}',[App\Http\Controllers\Frontend\PagesController::class,'bookings']);
 Route::post('/savebookings',[App\Http\Controllers\Frontend\PagesController::class,'savebookings']);
  Route::get('/getcity/{id}', [App\Http\Controllers\Frontend\PagesController::class, 'getcity']);
  Route::get('/reservation/{id}/{type}', [App\Http\Controllers\Frontend\PagesController::class, 'reservation']);
  Route::post('save_reservation', [App\Http\Controllers\Frontend\PagesController::class, 'save_reservation']);
  Route::get('/dashboard/{id}/{type?}',[App\Http\Controllers\Frontend\PagesController::class,'dashboard']);
  Route::post('/saveinfo',[App\Http\Controllers\Frontend\PagesController::class,'saveinfo']);
  Route::post('/saveinfo1',[App\Http\Controllers\Frontend\PagesController::class,'saveinfo1']);
  Route::post('/saveinfo2',[App\Http\Controllers\Frontend\PagesController::class,'saveinfo2']);
 Route::post('/savevideos',[App\Http\Controllers\Frontend\PagesController::class,'savevideos']);
 Route::post('/saveimages',[App\Http\Controllers\Frontend\PagesController::class,'saveimages']);
 Route::post('/savelogo',[App\Http\Controllers\Frontend\PagesController::class,'savelogo']);
 Route::post('/saveprofile',[App\Http\Controllers\Frontend\PagesController::class,'saveprofile']);
 Route::post('/videomodal',[App\Http\Controllers\Frontend\PagesController::class,'videomodal']);
 Route::get('/deletevideo/{id}',[App\Http\Controllers\Frontend\PagesController::class,'deletevideo']);
 Route::get('/getcities/{id}',[App\Http\Controllers\Frontend\PagesController::class,'getcities']);
 Route::get('/dashboards/{id}',[App\Http\Controllers\Frontend\PagesController::class,'customer_dashboard']);
 Route::get('/dashboards1/{id}/{type}',[App\Http\Controllers\Frontend\PagesController::class,'affiliate_dashboard']);
  Route::get('/reservationmodal/{id}/{type}',[App\Http\Controllers\Frontend\PagesController::class,'reservationmodal']);
 Route::get('/dropzone',[App\Http\Controllers\Frontend\PagesController::class,'dropzone']);
 Route::post('/uploadfile',[App\Http\Controllers\Frontend\PagesController::class,'uploadfile']);
Route::post('/paymentintent',[App\Http\Controllers\Frontend\PagesController::class,'paymentintent']);



  




