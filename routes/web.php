<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    return view('pages/home');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


/* ================================   ADMIN SECTION ==================================================*/
Route::group(['namespace' => 'Admin', 'prefix' => 'control_panel'], function () {

Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');
    

});

Route::group(['namespace' => 'Admin', 'prefix' => 'control_panel', 'middleware' => 'auth.control_panel'], function () {
     /* route by manoj */
	
    Route::get('home', 'HomeController@index');

    Route::get('/access', 'HomeController@access');
    Route::resource('country', 'CountryController');
    Route::get('/country/{id}/delete', 'CountryController@delete');
    
	Route::resource('state', 'StateController');
    Route::get('/state/{id}/delete', 'StateController@delete');

    Route::resource('city', 'CityController');
    Route::get('/city/{id}/delete', 'CityController@delete');
    Route::get('/city/ajax-country/{id}', 'CityController@getajax');
	
    Route::resource('account', 'Auth\RegisterController');
    Route::get('/account/{id}/delete', 'Auth\RegisterController@delete');
    Route::get('/profile', 'Auth\RegisterController@profile');
	Route::get('profile/change/pin/{id}', 'Auth\RegisterController@changepin');
	Route::post('add/pin', ['as' => 'pin_store', 'uses' => 'Auth\RegisterController@profilestore']);
	Route::get('/account/ajax-dep/{id}', 'Auth\RegisterController@index');



    Route::resource('emailtemplate', 'EmailtemplateController');
    Route::get('/emailtemplate/{id}/delete', 'EmailtemplateController@delete');
    Route::get('/emailtemplate/type/{id}', 'EmailtemplateController@emailusertype');

    Route::resource('newssubscribe', 'NewssubscribeController');
    Route::get('/newssubscribe/{id}/delete', 'NewssubscribeController@delete');

    Route::resource('newsletter', 'NewsletterController');
    Route::get('/newsletter/{id}/delete', 'NewsletterController@delete');
    Route::get('/newsletter/subscribe/{id}', 'NewsletterController@subscribelist'); 

	Route::resource('siteconfig', 'SiteconfigController');
	
	 
	 
	Route::resource('dept', 'DepartmentController');
    Route::get('/dept/{id}/delete', 'DepartmentController@delete');
	
	Route::resource('role', 'RoleController');
    Route::get('/role/{id}/delete', 'RoleController@delete');
	Route::get('/role/{id}/permission', 'RoleController@permission');
	Route::post('add/permission', ['as' => 'per_store', 'uses' => 'RoleController@permissionstore']);
	Route::get('/role/ajax-action/{id}/{add}/{edit}/{delete}/{role_id}', 'RoleController@action_permission');
	Route::get('/role/ajax-getaction/{id}/{role_id}', 'RoleController@getcheckaction');
	
    Route::resource('make', 'MakeController');
    Route::get('/make/{id}/delete', 'MakeController@delete');

    Route::resource('model', 'ModelController');
    Route::get('/model/{id}/delete', 'ModelController@delete');

    Route::resource('version', 'VersionController');
    Route::get('/version/{id}/delete', 'VersionController@delete');
    Route::get('/version/ajax-make/{id}', 'VersionController@getajax');
	
	Route::resource('drive', 'DriveController');
    Route::get('/drive/{id}/delete', 'DriveController@delete');
	Route::get('/drive/ajax-pos/{id}', 'DriveController@posdrag');
	
	
	Route::resource('module', 'ModuleController');
    Route::get('/module/{id}/delete', 'ModuleController@delete');
	
	Route::resource('mileage', 'MileageController');
    Route::get('/mileage/{id}/delete', 'MileageController@delete');
	Route::get('/mileage/ajax-mile/{id}', 'MileageController@posdrag');
	
	Route::resource('vehicletype', 'VehicletypeController');
    Route::get('/vehicletype/{id}/delete', 'VehicletypeController@delete');
	Route::get('/vehicletype/ajax-vtype/{id}', 'VehicletypeController@posdrag');
   
    Route::resource('customer', 'CustomerController');
    Route::get('/customer/{id}/delete', 'CustomerController@delete');
	
    Route::resource('inspection', 'InspectionController'); 	
	Route::get('/inspection/add/{id}', 'InspectionController@addinspection')->name('addInspection');
	Route::get('/inspection/view/{id}', 'InspectionController@viewinspection');
	Route::get('/inspection/ajax-stock/{id}', 'InspectionController@getstock');
	Route::post('add/status', ['as' => 'ins_store', 'uses' => 'InspectionController@changestatus']);
	
	Route::get('/title', 'TitleController@index');
	Route::get('/title/edit/{id}', 'TitleController@Edittitle');
	Route::get('/title/delete/{id}', 'TitleController@Deletetitle');
	Route::get('/outtitle/delete/{id}', 'TitleController@Deleteouttitle');
	Route::post('title/update', ['as' => 'title_edit', 'uses' => 'TitleController@Updatetitle']);
	Route::get('/title/logintitle/{stockid}', 'TitleController@logintitle');
	Route::get('/title/outofsale', 'TitleController@show');
	Route::get('/title/outofsale/outloginfrm/{stockid}', 'TitleController@loginout');
	Route::post('title/add', ['as' => 'title_store', 'uses' => 'TitleController@addtitle']);
    Route::post('title/outstate/add', ['as' => 'titleout_store', 'uses' => 'TitleController@addtitleout']); 

    
	
	Route::resource('income', 'IncomeController');
	Route::resource('compare', 'CompareController');
	Route::get('/compare/add/{id}', 'CompareController@create')->name('createCompare');
	Route::get('/compare/list/{id}', 'CompareController@listcompare');
	Route::post('add/compare', ['as' => 'compare_store', 'uses' => 'CompareController@addcompare']);
	Route::get('/compare/{id}/delete', 'CompareController@delete');
	
	Route::get('deal/carinfo/{id}', 'VehicleController@carinfo');
	Route::get('userAutoComplete',array('as'=>'userAutoComplete','uses'=>'AutoCompleteController@userAutoComplete'));
	Route::get('/carinfo/duplicate/{id}', 'VehicleController@duplicate');
	
	Route::resource('items', 'ActionitemController');
	Route::get('/items/ajax-deptuser/{id}', 'ActionitemController@getajax');
	Route::get('deal/carinfo/ajax-getstatus/{id}/{vid}', 'ActionitemController@getstatus');
	Route::get('/items/view/{id}', 'ActionitemController@viewcomplete');
	Route::get('/items/view/car/{carid}', 'ActionitemController@searchbycar')->name('searchbycar');
	
	Route::get('/items/{id}/delete', 'ActionitemController@delete');
	Route::post('add/complete', ['as' => 'action_store', 'uses' => 'ActionitemController@addcomlete']);
	Route::get('/items/send/{id}', 'ActionitemController@sendmail');
	
	Route::get('ins/inspectionsearch',array('as'=>'inspectionsearch','uses'=>'InspectionController@inspectionsearch'));
	
	
	
	/* End route by manoj */
	
	
	/*Mehul*/
	Route::resource('deal', 'DealController');  
    Route::any('updateDeal', array('as'=>'updateDeal','uses'=>'DealController@updateDeal'));  
    // Route::get('/vehicledeal/{id}/delete', 'InspectionController@delete');

    // Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
    Route::get('customerAutoComplete',array('as'=>'customerAutoComplete','uses'=>'AutoCompleteController@customerAutoComplete')); 
    Route::get('entityAutoComplete',array('as'=>'entityAutoComplete','uses'=>'AutoCompleteController@entityAutoComplete'));
    Route::get('vehicleAutoComplete',array('as'=>'vehicleAutoComplete','uses'=>'AutoCompleteController@vehicleAutoComplete'));
    Route::get('populateDeal',array('as'=>'populateDeal','uses'=>'AutoCompleteController@populateDeal'));

    /*Route::any('saveCustomer',array('as'=>'saveCustomer','uses'=>'DealController@saveCustomer'));
    Route::any('saveEntity',array('as'=>'saveEntity','uses'=>'DealController@saveEntity'));
    Route::any('saveTrade',array('as'=>'saveTrade','uses'=>'DealController@saveTrade'));
    Route::resource('trade', 'TradeController'); */

    Route::get('/deal/{id}/delete', 'DealController@delete');
    Route::get('/trade/{id}/delete', 'TradeController@delete');
    Route::any('sellCar', array('as' => 'sellCar', 'uses'=>'DealController@sellCar'));
    Route::any('getVehicleDetails', array('as' => 'getVehicleDetails', 'uses' => 'AutoCompleteController@getVehicleDetails'));
    Route::any('getEntity', array('as' => 'getEntity', 'uses' => 'AutoCompleteController@getEntity'));

    Route::any('calcFProfit', array('as' => 'calcFProfit', 'uses' => 'DealController@calcFProfit'));

    Route::any('calcBProfit', array('as' => 'calcBProfit', 'uses' => 'DealController@calcBProfit'));


    Route::get('/compare/compare/{id}', 'CompareController@compareVehicle')->name('compareVehicle');
    Route::get('vehicle/cap/{id}', 'VehicleController@vehicleCap')->name('vehicleCap');

    Route::resource('commission', 'CommissionController');  


    Route::get('deal2/carDeal/{vehicleId}',array('as'=>'carDeal','uses'=>'Deal2Controller@carDeal')); 
    Route::resource('deal2', 'Deal2Controller'); 
    Route::get('/deal2/{id}/delete', 'Deal2Controller@delete');
    Route::any('getBuyerDetails', array('as' => 'getBuyerDetails', 'uses' => 'AutoCompleteController@getBuyerDetails'));
    Route::any('saveCustomer',array('as'=>'saveCustomer','uses'=>'Deal2Controller@saveCustomer'));
    Route::any('saveEntity',array('as'=>'saveEntity','uses'=>'Deal2Controller@saveEntity'));
    Route::any('saveTrade',array('as'=>'saveTrade','uses'=>'Deal2Controller@saveTrade'));
    Route::resource('trade', 'TradeController'); 

    Route::get('vehicle/showERP/{id}','VehicleController@showERP')->name('showERP');
    Route::any('sellCar2', array('as' => 'sellCar2', 'uses'=>'Deal2Controller@sellCar'));

    Route::any('holdDeal', array('as' => 'holdDeal', 'uses'=>'Deal2Controller@holdDeal' ));
    Route::any('vehicle/vehicleTitle/{id}', array('as' => 'vehicleTitle', 'uses'=>'VehicleController@vehicleTitle' ));
    Route::any('saveVehicleTitle', array('as' => 'saveVehicleTitle', 'uses'=>'VehicleController@saveVehicleTitle' ));

    Route::any('vehicle/vehicleLeadsDeals/{id}', array('as' => 'vehicleLeadsDeals', 'uses'=>'VehicleController@vehicleLeadsDeals' ));
    
    Route::any('vehicle/vehicleInfo/{id}', array('as' => 'vehicleInfo', 'uses'=>'VehicleController@vehicleInfo' ));

    Route::resource('lead', 'LeadController'); 

    Route::get('populateDeal2',array('as'=>'populateDeal2','uses'=>'AutoCompleteController@populateDeal2'));

    Route::get('cloneVehicle/{id}',array('as'=>'cloneVehicle','uses'=>'VehicleController@cloneVehicle'));
    Route::get('refreshVehicleAutoniq/{id}',array('as'=>'refreshVehicleAutoniq','uses'=>'VehicleController@refreshVehicleAutoniq'));
    Route::get('vehicle/vehicleAuction/{id}',array('as'=>'vehicleAuction','uses'=>'VehicleController@vehicleAuction'));
    Route::any('saveAuction',array('as'=>'saveAuction','uses'=>'VehicleController@saveAuction'));
    Route::resource('payMethod', 'PayMethodController'); 
    Route::get('payMethod/{id}/delete', array('as'=>'deletePayMethod','uses'=>'PayMethodController@delete')); 


    Route::any('clockin', array('as'=>'clockin','uses'=>'HomeController@clockin'));
    Route::any('clockout', array('as'=>'clockout','uses'=>'HomeController@clockout'));

    // Route::any('payroll', array('as'=>'payroll','uses'=>'PayrollController@index'));
    // Route::resource('payroll', 'PayrollController');
    Route::get('payPeriod/payroll/{payperiodid}', array('as'=>'payroll','uses'=>'PayrollController@payroll'));
    Route::any('savePayroll', array('as'=>'savePayroll','uses'=>'PayrollController@savePayroll'));
    Route::any('savePayPeriod', array('as'=>'savePayPeriod','uses'=>'PayrollController@savePayPeriod'));
    Route::any('getPayPeriod', array('as'=>'getPayPeriod','uses'=>'PayrollController@getPayPeriod'));

    Route::resource('payPeriod', 'PayperiodController');
    
    Route::any('deletePayPeriod/{id}', array('as'=>'deletePayPeriod','uses'=>'PayperiodController@delete'));

    Route::get('teamReport',array('as'=>'teamReport', 'uses'=>'HomeController@teamReport'));
    Route::post('teamReportSave', array('as'=>'teamReportSave', 'uses'=>'HomeController@teamReportSave'));

    Route::resource('clockTime', 'ClockController');
    Route::any('deleteclockTime/{id}', array('as'=>'deleteclockTime','uses'=>'ClockController@delete'));

    Route::get('exportVehicle/{id}', array('as'=>'exportVehicle','uses'=>'ExportDataController@exportVehicle'));
    Route::get('exportDeal/{id}', array('as'=>'exportDeal','uses'=>'ExportDataController@exportDeal'));
    Route::any('exportAllVehicles', array('as'=>'exportAllVehicles','uses'=>'ExportDataController@exportAllVehicles'));
    Route::post('exportAllDeals', array('as'=>'exportAllDeals','uses'=>'ExportDataController@exportAllDeals'));
    Route::any('exportVehicleDeals/{vehicleid}', array('as'=>'exportVehicleDeals','uses'=>'ExportDataController@exportVehicleDeals'));


    Route::get('sendReminder/{userId}/{payperiodId}/{payrollId}', array('as'=>'sendReminder','uses'=>'EmailtemplateController@sendReminder'));
    /*Mehul*/ 
	
	
	
	
	
	

    /* route by bhupendra */
    Route::resource('carrier', 'CarrierController');
    Route::resource('vehicle', 'VehicleController'); 
    Route::resource('entity', 'EntityController'); 
    Route::resource('vehicleStatus', 'VehicleStatusController'); 
    Route::resource('vehicleFuelType', 'VehicleFuelTypeController');  
    Route::resource('transmissionType', 'TransmissionTypeController'); 
    Route::resource('saleMode', 'SaleModeController'); 
    Route::resource('powerWindow', 'PowerWindowController'); 
    Route::resource('powerDoorLock', 'PowerDoorLockController'); 
    Route::resource('inspectionStatus', 'InspectionStatusController'); 
    Route::resource('paymentMethod', 'PaymentMethodController');  
    Route::resource('expense', 'ExpenseController'); 
    Route::any('expense/create/{vehicleId}', 'ExpenseController@addVehicleExpense')->name('addVehicleExpense');  
    Route::get('gallery', 'GalleryController@allGallery')->name('allGallery');  
    Route::get('gallery/{vehicleId}', 'GalleryController@index')->name('galleryList');  
    Route::post('gallery/uploadImages', 'GalleryController@uploadImages')->name('uploadImages');     
    Route::get('gallery/deleteImages/{vehicleId}', 'GalleryController@deleteImages')->name('deleteImages');
    Route::post('gallery/updateImages/{vehicleId}','GalleryController@updateImages')->name('updateImages');
    Route::post('gallery/uploadVideos','GalleryController@uploadVideos')->name('uploadVideos');
    Route::post('gallery/updateVideos/{vehicleId}','GalleryController@updateVideos')->name('updateVideos');
    Route::post('gallery/reorderImages','GalleryController@reorderImages')->name('reorderImages'); 
    Route::post('gallery/reorderVideos','GalleryController@reorderVideos')->name('reorderVideos');
    Route::get('dashboard','HomeController@dashboard')->name('dashboard'); 

    //Route::get('/title/tracking', 'TitleController@titleTracking'); 
    Route::get('titleTracking','TitleTrackingController@index')->name('titleTracking');
    Route::post('titleTracking/initialLogin','TitleTrackingController@initialLogin')->name('initialLogin');
    Route::post('titleTracking/saveInitialLogin','TitleTrackingController@saveInitialLogin')->name('saveInitialLogin');

    Route::get('titleTransmittalList','TitleTrackingController@titleTransmittalList')->name('titleTransmittalList'); 
    Route::post('ajaxSaveTitleTransmittal','TitleTrackingController@ajaxSaveTitleTransmittal')->name('ajaxSaveTitleTransmittal'); 

    Route::get('TitleTransmittalReport','TitleTrackingController@TitleTransmittalReport')->name('TitleTransmittalReport');
    
    //Route::get('titleTracking/titleTransmittalList','TitleTrackingController@titleTransmittalList')->name('titleTransmittalList'); 

    Route::get('titleTracking/login/{vehicleId}','TitleTrackingController@titleLogin')->name('titleLogin'); 
    Route::post('titleTracking/saveTitleLogin/{vehicleId}','TitleTrackingController@saveTitleLogin')->name('saveTitleLogin');  

    
    Route::get('titleTracking/titleTransmittal/{vehicleId}','TitleTrackingController@titleTransmittal')->name('titleTransmittal'); 
    Route::post('titleTracking/saveTitleTransmittal/{vehicleId}','TitleTrackingController@saveTitleTransmittal')->name('saveTitleTransmittal'); 

    //this route provide vehicle aoutocomplete based on filter 
    Route::get('vehicleList','ActionitemController@vehicleList')->name('vehicleList'); 
    Route::resource('leadActionsItems','LeadActionItemController');  
    Route::resource('vehicleOptions','VehicleOptionController');  

    Route::get('vehiclesForInspection','VehicleInspectionController@vehiclesForInspection')->name('vehiclesForInspection'); 
    Route::get('vehiclesForInspection/vehicleInspection/{vehicleId}','VehicleInspectionController@index')->name('vehicleInspection'); 
    Route::post('vehiclesForInspection/vehicleInspectionStore/{vehicleId}','VehicleInspectionController@store')->name('vehicleInspectionStore');
    Route::get('vehiclesForInspection/vehicleInspection/show/{vehicleId}','VehicleInspectionController@showInspection')->name('showInspection');

    Route::get('vehiclesForInspection/vehicleInspection/edit/{vehicleId}','VehicleInspectionController@editInspection')->name('editInspection');
    Route::post('vehiclesForInspection/vehicleInspection/update/{vehicleId}','VehicleInspectionController@updateInspection')->name('updateInspection'); 


    Route::get('autoniqInventaryList','VehicleController@autoniqInventaryList')->name('autoniqInventaryList');
    Route::get('autoniqInventaryList/addAutoniqInventary/{autiniqId}','VehicleController@addAutoniqInventary')->name('addAutoniqInventary');
    Route::post('autoniqInventaryList/storeAutoniqInventary/{autiniqId}','VehicleController@storeAutoniqInventary')->name('storeAutoniqInventary'); 
    Route::delete('autoniqInventaryList/deleteAutoniqInventary/{autiniqId}','VehicleController@deleteAutoniqInventary')->name('deleteAutoniqInventary'); 


    Route::get('printPreview/windowBookSheet/{dealId}','PrintReportController@windowBookSheet')->name('printPreviewWindowBookSheet'); 

    Route::get('printPreview/billOfSale/{dealId}','PrintReportController@billOfSale')->name('printPreviewBillOfSale');  
    Route::get('printPreview/holdReciept/{dealId}','PrintReportController@holdReciept')->name('printPreviewHoldReciept'); 
    Route::get('printPreview/smartServicePlan/{dealId}','PrintReportController@smartServicePlan')->name('printPreviewSmartServicePlan'); 
    Route::get('printPreview/Report502/{dealId}','PrintReportController@Report502')->name('printPreviewReport502');
    Route::get('printPreview/tempRegistration/{dealId}','PrintReportController@tempRegistration')->name('printPreviewTempRegistration'); 
    Route::get('printPreview/buyersGuide/{dealId}','PrintReportController@buyersGuide')->name('printPreviewBuyersGuide');
    Route::get('printPreview/odometerCertificate/{dealId}','PrintReportController@odometerCertificate')->name('printPreviewOdometerCertificate'); 
    Route::get('printPreview/weOwe/{dealId}','PrintReportController@weOwe')->name('printPreviewWeOwe');
    
    Route::get('printPreview/authForLoanPayoff/{dealId}','PrintReportController@authForLoanPayoff')->name('printPreviewAuthForLoanPayoff');
    Route::get('printPreview/references/{dealId}','PrintReportController@references')->name('printPreviewReferences');
    Route::get('printPreview/agreementForInsurance/{dealId}','PrintReportController@agreementForInsurance')->name('printPreviewAgreementForInsurance');
    Route::get('printPreview/installmentContract/{dealId}','PrintReportController@installmentContract')->name('printPreviewInstallmentContract');
    Route::get('printPreview/powerOfAttorneyPurchase/{dealId}','PrintReportController@powerOfAttorneyPurchase')->name('powerOfAttorneyPurchase');
    Route::get('printPreview/powerOfAttorneyTrade/{dealId}','PrintReportController@powerOfAttorneyTrade')->name('powerOfAttorneyTrade');
    Route::get('printPreview/wholesaleOnly/{dealId}','PrintReportController@wholesaleOnly')->name('wholesaleOnly'); 
    
    Route::match(['get', 'post'],'printPreview/reportAccountRecievable','PrintReportController@accountRecievable')->name('reportAccountRecievable'); 

    Route::get('printPreview/reportOfSale/{dealId}','PrintReportController@reportOfSale')->name('reportOfSale'); 

    Route::get('exportData',['as'=>'exportData','uses'=>'ExportDataController@index']);
}); 


  Route::group(['namespace' => 'Api', 'prefix' => 'WebApi'], function () {
    //Route::resource('bookapi', 'BookapiController');
    Route::post('bookapi', 'BookapiController@bookapi');

  });