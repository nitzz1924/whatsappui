<?php
#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”
use App\Http\Controllers\AdminStores;
use App\Http\Controllers\AdminViews;
use App\Http\Controllers\UserStores;
use App\Http\Controllers\UserViews;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelContactSheet;
use App\Http\Middleware\VerifyCsrfToken;



Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::post('/logoutuser', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logoutuser');

Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('AdminPanel.dashboard');
    })->name('dashboard');
});



//Admin Panel Routes
Route::controller(AdminViews::class)->group(function () {
    Route::get('userregister', 'userregister')->name('userregister');
    Route::get('alluserslist', 'alluserslist')->name('alluserslist');
});

Route::controller(AdminStores::class)->group(function () {
    Route::post('insertregisterusers', 'insertregisterusers')->name('insertregisterusers');
    Route::get('deleteregisteruser/{id}', 'deleteregisteruser')->name('deleteregisteruser');
    Route::post('/updateaccountstatus', 'updateaccountstatus')->name('updateaccountstatus');
    Route::post('/updateuser', 'updateuser')->name('updateuser');
});






//User Panel Routes
Route::controller(UserViews::class)->group(function () {
    Route::get('/', 'userloginpage')->name('userloginpage');
    Route::get('userdashboard', 'userdashboard')->name('userdashboard');
    Route::get('logoutuserpanel', 'logoutuserpanel')->name('logoutuserpanel');
    Route::get('indexchat', 'indexchat')->name('indexchat');
    Route::get('campaignspage', 'campaignspage')->name('campaignspage');
    Route::get('addnewcampaign', 'addnewcampaign')->name('addnewcampaign');
    Route::get('automationpage', 'automationpage')->name('automationpage');
    Route::get('addnewautomation', 'addnewautomation')->name('addnewautomation');
    Route::get('analyticspage', 'analyticspage')->name('analyticspage');
    Route::get('wahapage', 'wahapage')->name('wahapage');
    Route::get('templatespage', 'templatespage')->name('templatespage');
    Route::get('groupspage', 'groupspage')->name('groupspage');
    Route::get('contactspage', 'contactspage')->name('contactspage');
    Route::get('/webhook/whatsapp', 'verify')->name('verify')->middleware(VerifyCsrfToken::class);
    Route::get('showsentmessage/{phone}', 'showsentmessage')->name('showsentmessage');
    Route::get('/mediaPage', 'mediaPage')->name('mediaPage');
    Route::get('/showMediaGallery', 'showMediaGallery')->name('showMediaGallery');

});


Route::controller(UserStores::class)->group(function () {
    Route::post('/signup_user_otp', 'signup_user_otp')->name('signup_user_otp');
    Route::post('verifyotp', 'verifyotp')->name('verifyotp');
    Route::post('insertgroups', 'insertgroups')->name('insertgroups');
    Route::get('deletegroup/{id}', 'deletegroup')->name('deletegroup');
    Route::post('insertcontacts', 'insertcontacts')->name('insertcontacts');
    Route::post('send-message', 'sendmessage')->name('send-message');
    Route::get('deletecampaign/{id}', 'deletecampaign')->name('deletecampaign');
    Route::get('deletecontact/{id}', 'deletecontact')->name('deletecontact');
    Route::post('updatecontact', 'updatecontact')->name('updatecontact');
    Route::post('updategroups', 'updategroups')->name('updategroups');
    Route::post('sendsinglemessage', 'sendsinglemessage')->name('sendsinglemessage');
    Route::post('webhook', 'handleWebhook')->name('handleWebhook');
    Route::get('refreshtemplates', 'refreshtemplates')->name('refreshtemplates');
    Route::post('replyamessage', 'replyamessage')->name('replyamessage');
    Route::get('filtercontacts', 'filtercontacts')->name('filtercontacts');
    Route::get('filtercontactsbycampaign', 'filtercontactsbycampaign')->name('filtercontactsbycampaign');
    Route::post('/insertMedia', 'insertMedia')->name('insertMedia');
    Route::get('/removegalleryitem', 'removegalleryitem')->name('removegalleryitem');
});


Route::post('/webhooknew', [WhatsAppController::class, 'handleWebhooknew'])->name('webhooknew');

//Excel Routes
Route::get('/import-excel', [ExcelContactSheet::class, 'index'])->name('import.excel');
Route::post('/import-excel', [ExcelContactSheet::class, 'import']);

