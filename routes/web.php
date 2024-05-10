<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Language\LanguageController;


use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;

use App\Http\Controllers\Admin\Apps\Chat;
use App\Http\Controllers\Admin\Apps\Email;

use App\Http\Controllers\Admin\Pages\Dashboard;
use App\Http\Controllers\Admin\Pages\Calendar;
use App\Http\Controllers\Admin\Pages\Appointments;
use App\Http\Controllers\Admin\Pages\Payments;
use App\Http\Controllers\Admin\Pages\Customers;

use App\Http\Controllers\Admin\Resource\Agents;
use App\Http\Controllers\Admin\Resource\Coupons;
use App\Http\Controllers\Admin\Resource\LocationCategories;
use App\Http\Controllers\Admin\Resource\Locations;
use App\Http\Controllers\Admin\Resource\Services;
use App\Http\Controllers\Admin\Resource\Categories;
use App\Http\Controllers\Admin\Resource\Serviceextras;

use App\Http\Controllers\Admin\Settings\Profile;
use App\Http\Controllers\Admin\Settings\AddOns;
use App\Http\Controllers\Admin\Settings\General;
use App\Http\Controllers\Admin\Settings\Notifications;
use App\Http\Controllers\Admin\Settings\Payments as PaymentSetting;
use App\Http\Controllers\Admin\Settings\Roles;
use App\Http\Controllers\Admin\Settings\Schedule;
use App\Http\Controllers\Admin\Settings\Steps;
use App\Http\Controllers\Admin\Settings\System;
use App\Http\Controllers\Admin\Settings\Tax;
use App\Http\Controllers\Admin\Settings\Integrations\Calendars as CalendarsIntegration;
use App\Http\Controllers\Admin\Settings\Integrations\Marketing;
use App\Http\Controllers\Admin\Settings\Integrations\Meetings;
use App\Http\Controllers\Admin\Settings\Processes\ActivityLog;
use App\Http\Controllers\Admin\Settings\Processes\Processes;
use App\Http\Controllers\Admin\Settings\Processes\ScheduledJobs;
use App\Http\Controllers\Admin\Settings\FormFields;


use App\Http\Controllers\Agent\Auth\agent_AuthenticatedSessionController;
use App\Http\Controllers\Agent\Auth\agent_NewPasswordController;
use App\Http\Controllers\Agent\Auth\agent_PasswordResetLinkController;
use App\Http\Controllers\Agent\Auth\agent_RegisteredUserController;

use App\Http\Controllers\Agent\agent_Dashboard;
use App\Http\Controllers\Agent\agent_Calendar;
use App\Http\Controllers\Agent\agent_Customers;
use App\Http\Controllers\Agent\agent_Appointments;
use App\Http\Controllers\Agent\agent_Payments;
use App\Http\Controllers\Agent\agent_Login;

use App\Http\Controllers\Customer\Login as CustomerLogin;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Home::class, 'index'])->name('landing');

Route::get('login', [CustomerLogin::class, 'login'])->name('login');
Route::get('agentLogin', [agent_Login::class, 'login'])->name('agentLogin');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::get('verify-email', [RegisteredUserController::class, 'verify_email'])->name('verify.email');

        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'login_act']);

        Route::get('oauth/{driver}', [AuthenticatedSessionController::class, 'redirectToProvider'], )->name('social.oauth');
        Route::get('oauth/{driver}/callback', [AuthenticatedSessionController::class, 'handleProviderCallback'])->name('social.callback');

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');


        Route::get('verify/{token}', [RegisteredUserController::class, 'verifyAccount'])->name('verify');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [RegisteredUserController::class, 'destroy'])->name('logout');

        Route::get('/app/chat', [Chat::class, 'index'])->name('app-chat');
        Route::get('/app/email', [Email::class, 'index'])->name('app-email');
        Route::get('/user/profile', [Profile::class, 'index'])->name('user-profile');
        Route::get('/user/editprofile', [Profile::class, 'edit'])->name('user-editprofile');
        Route::post('/user/updateprofile', [Profile::class, 'update'])->name('user-updateprofile');


        // Main Page Route
        Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
        Route::get('/calendar', [Calendar::class, 'index'])->name('app-calendar');

        Route::get('/appointments', [Appointments::class, 'index'])->name('app-appointments');
        Route::post('/store_appointments', [Appointments::class, 'store'])->name('app-storeappointments');
        
        Route::get('/get-events', [EventController::class, 'index'])->name('app-events');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');
        Route::post('/store_events', [EventController::class, 'store'])->name('app-storeevents');

        Route::get('/payments', [Payments::class, 'index'])->name('app-payments');
        Route::get('/customers', [Customers::class, 'index'])->name('app-customers');

        // Customer Section
        Route::get('/customers/new', [Customers::class, 'add']);
        Route::get('/customers/list', [Customers::class, 'list']);
        Route::post('/add_customer', [Customers::class, 'add_customer'])->name('add_customer');
        Route::get('/edit_customer/{id}', [Customers::class, 'edit_customer'])->name('edit_customer');
        Route::post('/update_customers', [Customers::class, 'update_customer'])->name('update_customer');
        Route::get('/delete_customer/{id}', [Customers::class, 'delete_customer']);


        // Resources Section
        Route::get('/resource/services', [Services::class, 'index'])->name('resource-services');
        Route::get('/resource/getservices', [Services::class, 'get'])->name('resource-getservices');
        Route::get('/resource/createservices', [Services::class, 'create'])->name('resource-createservices');
        Route::get('/resource/editservices/{id}', [Services::class, 'edit'])->name('resource-editservices');
        Route::post('/resource/storeservice', [Services::class, 'store'])->name('resource-storeservices');
        Route::post('/resource/updateservices', [Services::class, 'update'])->name('resource-updateservices');
        Route::get('/resource/deleteservice/{id}', [Services::class, 'destroy']);



        // Category Section
        Route::get('/resource/categories', [Categories::class, 'index'])->name('resource-categories');
        Route::get('/resource/getcategories', [Categories::class, 'get'])->name('resource-getcategories');
        Route::post('/resource/storecategories', [Categories::class, 'store'])->name('resource-storecategories');
        Route::get('/resource/deletecategories/{id}', [Categories::class, 'destroy']);
        Route::post('/resource/updatecategories/{id}', [Categories::class, 'update'])->name('resource-updatecategories');


        // Service Extra Section
        Route::get('/resource/serviceextras', [Serviceextras::class, 'index'])->name('resource-serviceextras');
        Route::get('/resource/getserviceextras', [Serviceextras::class, 'get'])->name('resource-getserviceextras');
        Route::get('/resource/createserviceextras', [Serviceextras::class, 'create'])->name('resource-createserviceextras');
        Route::get('/resource/editserviceextras/{id}', [Serviceextras::class, 'edit'])->name('resource-editserviceextras');
        Route::post('/resource/storeserviceextras', [Serviceextras::class, 'store'])->name('resource-storeserviceextras');
        Route::get('/resource/deleteserviceextras/{id}', [Serviceextras::class, 'destroy']);
        Route::post('/resource/updateserviceextras', [Serviceextras::class, 'update'])->name('resource-updateserviceextras');


        // Resources Section->Agents part
        Route::get('/resource/agents', [Agents::class, 'index'])->name('resource-agents');
        Route::get('/resource/getagents', [Agents::class, 'get'])->name('resource-getagents');
        Route::get('/resource/createagents', [Agents::class, 'create'])->name('resource-createagents');
        Route::get('/resource/editagents/{id}', [Agents::class, 'edit'])->name('resource-editagents');
        Route::post('/resource/storeagent', [Agents::class, 'store'])->name('resource-storeagent');
        Route::post('/resource/updateagent', [Agents::class, 'update'])->name('resource-updateagent');


        // Resources Section->Coupons part
        Route::get('/resource/coupons', [Coupons::class, 'index'])->name('resource-coupons');
        Route::post('/resource/updatecoupons/{id}', [Coupons::class, 'update'])->name('resource-updatecoupons');
        Route::post('/resource/storecoupons', [Coupons::class, 'store'])->name('resource-storecoupons');
        Route::get('/resource/deletecoupons/{id}', [Coupons::class, 'destroy']);




        // Resources Section->Locations part
        Route::get('/resource/locations', [Locations::class, 'index'])->name('resource-locations');
        Route::get('/resource/createlocations', [Locations::class, 'create'])->name('resource-createlocations');
        Route::get('/resource/editlocations/{id}', [Locations::class, 'edit'])->name('resource-editlocations');
        Route::post('/resource/storelocations', [Locations::class, 'store'])->name('resource-storelocations');
        Route::post('/resource/updatelocations', [Locations::class, 'update'])->name('resource-updatelocations');


        // Resources Section -> Locations/Categories part
        Route::get('/resource/locationcategories', [LocationCategories::class, 'index'])->name('resource-locationcategories');
        Route::post('/resource/storelocationcategories', [LocationCategories::class, 'store'])->name('resource-storelocationcategories');


        // Settings Section -> Settings
        Route::get('/settings/general', [General::class, 'index'])->name('settings-general');
        Route::post('/settings/storegeneral', [General::class, 'store'])->name('settings-storegeneral');
        Route::post('/settings/updategeneral', [General::class, 'update'])->name('settings-updategeneral');

        Route::get('/settings/tax', [Tax::class, 'index'])->name('settings-tax');
        Route::post('/settings/storetax', [Tax::class, 'store'])->name('settings-storetax');
        Route::post('/settings/updatetax', [Tax::class, 'update'])->name('settings-updatetax');
        Route::get('/resource/deletetax/{id}', [Tax::class, 'destroy']);

        Route::get('/settings/steps', [Steps::class, 'index'])->name('settings-steps');
        Route::post('/settings/storesteps', [Steps::class, 'store'])->name('settings-storesteps');
        Route::post('/settings/createsteps', [Steps::class, 'create'])->name('settings-createsteps');


        Route::get('/settings/payments', [PaymentSetting::class, 'index'])->name('settings-payments');
        Route::post('/settings/storepayments', [PaymentSetting::class, 'store'])->name('settings-storepayments');


        Route::get('/settings/notifications', [Notifications::class, 'index'])->name('settings-notifications');
        Route::post('/settings/storenotifications', [Notifications::class, 'store'])->name('settings-storenotifications');
        Route::post('/settings/updatenotifications/{id}', [Notifications::class, 'update'])->name('settings-updatenotifications');



        Route::get('/settings/roles', [Roles::class, 'index'])->name('settings-roles');
        Route::post('/settings/storeroles', [Roles::class, 'store'])->name('settings-storeroles');
        Route::post('/settings/updateroles/{id}', [Roles::class, 'update'])->name('settings-updateroles');
        Route::get('/settings/deleteroles/{id}', [Roles::class, 'destroy']);


        Route::get('/settings/processes', [Processes::class, 'index'])->name('settings-processes');
        Route::post('/settings/storeprocesses', [Processes::class, 'store'])->name('settings-storeprocesses');
        Route::post('/settings/updateprocesses/{id}', [Processes::class, 'update'])->name('settings-updateprocesses');
        Route::get('/resource/deleteprocesses/{id}', [Processes::class, 'destroy']);

        Route::get('/settings/process_jobs', [ScheduledJobs::class, 'index'])->name('settings-process_jobs');
        Route::get('/settings/activities', [ActivityLog::class, 'index'])->name('settings-activities');

        Route::get('/settings/integrations-calendars', [CalendarsIntegration::class, 'index'])->name('settings-integrations-calendars');
        Route::post('/settings/integrations-storecalendars', [CalendarsIntegration::class, 'store'])->name('settings-integrations-storecalendars');
        Route::post('/settings/integrations-updatecalendars/{id}', [CalendarsIntegration::class, 'store'])->name('settings-integrations-updatecalendars');

        Route::get('/settings/integrations-meeting', [Meetings::class, 'index'])->name('settings-integrations-meeting');
        Route::post('/settings/integrations-storemeeting', [Meetings::class, 'store'])->name('settings-integrations-storemeeting');
        Route::post('/settings/integrations-updatemeeting/{id}', [Meetings::class, 'update'])->name('settings-integrations-updatemeeting');

        Route::get('/settings/form-fields', [FormFields::class, 'index'])->name('settings-form-fields');
        Route::post('/settings/storeform-fields', [FormFields::class, 'store'])->name('settings-storeform-fields');
        Route::post('/settings/storeform-otherfields', [FormFields::class, 'create'])->name('settings-storeform-otherfields');
        Route::post('/settings/updateform-otherfields/{id}', [FormFields::class, 'update'])->name('settings-updateform-otherfields');
        Route::get('/settings/deleteform-otherfields/{id}', [FormFields::class, 'destroy']);

        Route::get('/settings/schedule', [Schedule::class, 'index'])->name('settings-schedule');
        Route::post('/settings/store-schedule', [Schedule::class, 'store'])->name('settings-storeschedule');

        Route::get('/settings/integrations-marketing', [Marketing::class, 'index'])->name('settings-integrations-marketing');
        Route::get('/settings/add-ons', [AddOns::class, 'index'])->name('settings-add-ons');
        Route::get('/settings/system', [System::class, 'index'])->name('settings-system');
    });

});

Route::prefix('agent')->name('agent.')->group(function () {
  Route::middleware('guest')->group(function () {
    Route::get('register', [agent_RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [agent_RegisteredUserController::class, 'store']);
    Route::get('verify-email', [agent_RegisteredUserController::class, 'verify_email'])->name('verify.email');

    Route::get('login', [agent_AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [agent_AuthenticatedSessionController::class, 'login_act']);

    Route::get('oauth/{driver}', [agent_AuthenticatedSessionController::class, 'redirectToProvider'], )->name('social.oauth');
    Route::get('oauth/{driver}/callback', [agent_AuthenticatedSessionController::class, 'handleProviderCallback'])->name('social.callback');

    Route::get('forgot-password', [agent_PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [agent_PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [agent_NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('reset-password', [agent_NewPasswordController::class, 'store'])->name('password.update');


    Route::get('verify/{token}', [agent_RegisteredUserController::class, 'verifyAccount'])->name('verify');
  });

  Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [agent_Dashboard::class, 'index'])->name('dashboard');
    Route::get('/calendar', [agent_Calendar::class, 'index'])->name('app-calendar');
    Route::get('/appointments', [agent_Appointments::class, 'index'])->name('app-appointments');
    Route::post('/store_appointments', [agent_Appointments::class, 'store'])->name('app-storeappointments');

    Route::get('/payments', [agent_Payments::class, 'index'])->name('app-payments');
    Route::get('/customers', [agent_Customers::class, 'index'])->name('app-customers');

    Route::get('/customers/new', [agent_Customers::class, 'add']);
    Route::get('/customers/new', [agent_Customers::class, 'add']);
    Route::get('/customers/list', [agent_Customers::class, 'list']);
    Route::post('/add_customer', [agent_Customers::class, 'add_customer'])->name('add_customer');
    Route::get('/edit_customer/{id}', [agent_Customers::class, 'edit_customer'])->name('edit_customer');
    Route::post('/update_customers', [agent_Customers::class, 'update_customer'])->name('update_customer');
    Route::get('/delete_customer/{id}', [agent_Customers::class, 'delete_customer']);
    Route::post('/store_events', [EventController::class, 'store'])->name('app-storeevents');

  });
});

// --------------------------- FOR TEST ----------------------------- //
Route::get('/run-artisan', function () {
    $exitCode = Artisan::call(request()->get('command'));
    $output = Artisan::output();

    return response()->json([
        'exitCode' => $exitCode,
        'output' => $output
    ]);
});