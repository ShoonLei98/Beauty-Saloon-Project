<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CounterController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DailyExpenseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonthlyExpenseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceInvoiceController;
use App\Http\Controllers\YearlyExpenseController;


Route::get('/', function () {
    return view('welcome');
})->name('#home');

Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('#itemList');
    Route::get('createItem',function(){return view('item.addItem');})->name('#addItem');
    Route::post('insertItem', [ItemController::class, 'insertItem'])->name('#insertItem');
    Route::get('editItem/{id}', [ItemController::class, 'editItem'])->name('#editItem');
    Route::post('updateItem', [ItemController::class, 'updateItem'])->name('#updateItem');
    Route::get('deleteItem/{id}', [ItemController::class, 'deleteItem'])->name('#deleteItem');
}); 

Route::prefix('inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('#inventoryList');
    Route::get('searchItem', [InventoryController::class, 'searchItem'])->name('#searchItem');
}); 

Route::prefix('promotion')->group(function () {
    Route::get('/', [PromotionController::class, 'index'])->name('#promotionList');
    Route::get('ajaxList', [PromotionController::class, 'ajaxList'])->name('#ajaxList');
    Route::post('dateSearch',[PromotionController::class, 'dateList'])->name('#dateList');
    Route::get('createPromotion',[PromotionController::class, 'addPromotion'])->name('#addPromotion');
    Route::post('insertPromotion', [PromotionController::class, 'insertPromotion'])->name('#insertPromotion');
    Route::get('editPromotion/{id}', [PromotionController::class, 'editPromotion'])->name('#editPromotion');
    Route::post('updatePromotion', [PromotionController::class, 'updatePromotion'])->name('#updatePromotion');
    Route::get('deletePromotion/{id}', [PromotionController::class, 'deletePromotion'])->name('#deletePromotion');
}); 

Route::prefix('counter')->group(function () {
    Route::get('/', [CounterController::class, 'index'])->name('#counterList');
    Route::get('createCounter',function(){return view('counter.addCounter');})->name('#addCounter');
    Route::post('insertCounter', [CounterController::class, 'insertCounter'])->name('#insertCounter');
    Route::get('editCounter/{id}', [CounterController::class, 'editCounter'])->name('#editCounter');
    Route::post('updateCounter', [CounterController::class, 'updateCounter'])->name('#updateCounter');
    Route::get('deleteCounter/{id}', [CounterController::class, 'deleteCounter'])->name('#deleteCounter');
}); 

Route::prefix('card')->group(function () {
    Route::get('/', [CardController::class, 'index'])->name('#cardList');
    Route::get('addCard', [CardController::class, 'addCard'])->name('#addCard');
    Route::post('createCard', [CardController::class, 'createCard'])->name('#createCard');
    Route::get('editCard/{id}', [CardController::class, 'editCard'])->name('#editCard');
    Route::post('updateCard', [CardController::class, 'updateCard'])->name('#updateCard');
    Route::get('deleteCard/{id}', [CardController::class, 'deleteCard'])->name('#deleteCard');
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('#employeeList');
    Route::get('createEmployee',function(){return view('employees.createEmployee');})->name('#addEmployee');
    Route::post('insertEmployee', [EmployeeController::class, 'addEmployee'])->name('#insertEmployee');
    Route::get('editEmployee/{id}', [EmployeeController::class, 'editEmployee'])->name('#editEmployee');
    Route::post('updateEmployee', [EmployeeController::class, 'updateEmployee'])->name('#updateEmployee');
    Route::get('deleteEmployee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('#deleteEmployee');
}); 

Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('#custoemrList');
    Route::get('addCustomer', [CustomerController::class, 'addCustomer'])->name('#addCustomer');
    Route::post('createCustomer', [CustomerController::class, 'createCustomer'])->name('#createCustomer');
    Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('#editCustomer');
    Route::post('updateCustomer', [CustomerController::class, 'updateCustomer'])->name('#updateCustomer');
    Route::get('deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('#deleteCustomer');
});

Route::group(['prefix' => 'service'], function(){
    Route::get('/', [ServiceController::class, 'index'])->name('#serviceList');
    Route::get('addService', function(){ return view('serivces.addService');})->name('#addService');
    Route::post('createService', [ServiceController::class, 'createService'])->name('#createService');
    Route::get('editService/{id}', [ServiceController::class, 'editService'])->name('#editService');
    Route::post('updateService', [ServiceController::class, 'updateService'])->name('#updateService');
    Route::get('deleteService/{id}', [ServiceController::class , 'deleteService'])->name('#deleteService');
});

Route::group(['prefix' => 'purchase'], function(){
    
    Route::get('ajaxPurchaseData', [PurchaseController::class, 'ajaxData'])->name('#ajaxPurchaseDataList');
    Route::get('/', [PurchaseController::class, 'index'])->name('#purchaseList');
    Route::get('addPurchase', [PurchaseController::class, 'addPurchase'])->name('#addPurchase');
    Route::get('createPurchase', [PurchaseController::class, 'createPurchase'])->name('#createPurchase');
    Route::get('editPurchase/{id}', [PurchaseController::class, 'editPurchase'])->name('#editPurchase');
    Route::get('updatePurchase', [PurchaseController::class, 'updatePurchase'])->name('#updatePurchase');
    Route::get('deletePurchase', [PurchaseController::class, 'deletePurchase'])->name('#deletePurchase');
    Route::get('deleteVoucher/{id}', [PurchaseController::class, 'deleteVoucher'])->name('#deleteVoucher');
});

Route::group(['prefix' => 'usage'], function(){
    Route::get('/', [UsageController::class, 'index'])->name('#usageList');
    Route::get('addUsage', function(){return view('usage.addUsage');})->name('#addUsage');
    Route::post('createUsage', [UsageController::class, 'createUsage'])->name('#createUsage');
    Route::get('editUsage/{id}', [UsageController::class, 'editUsage'])->name('#editUsage');
    Route::post('updateUsage', [UsageController::class, 'updateUsage'])->name('#updateUsage');
    Route::get('deleteUsage/{id}', [UsageController::class, 'deleteUsage'])->name('#deleteUsage');
});

Route::group(['prefix' => 'invoice'], function(){
    Route::get('ajaxServiceList', [ServiceInvoiceController::class, 'ajaxServiceList'])->name('#ajaxServiceList');
    Route::get('service', [ServiceInvoiceController::class, 'serviceInvoice'])->name('#serviceInvoice');
    Route::get('addService', [ServiceInvoiceController::class, 'addServiceInvoice'])->name('#addServiceInvoice');
    Route::post('createService', [ServiceInvoiceController::class, 'createSerivceInvoice'])->name('#createServiceInvoice');
    Route::get('addNewService', function(){
        return view('Invoice.service.detailServiceInvoice');
    })->name('#addNewService');
    Route::post('createNewService', [ServiceInvoiceController::class, 'addNewService'])->name('#createNewService');

    Route::get('ajaxSaleData', [SaleController::class, 'ajaxData'])->name('#ajaxSaleDataList');
    Route::get('ajaxItemList', [SaleController::class, 'ajaxItemList'])->name('#ajaxItemList');
    Route::get('/', [SaleController::class, 'index'])->name('#saleInvoiceList');
    Route::get('addSaleInvoice', [SaleController::class, 'addSaleInvoice'])->name('#addSaleInvoice');
    Route::get('createSaleInvoice', [SaleController::class, 'createSaleInvoice'])->name('#createSaleInvoice');
    Route::get('editSaleInvoice/{voucherId}/{voucherCode}', [SaleController::class, 'editSaleInvoice'])->name('#editSaleInvoice');
    Route::get('updateSaleInvoice', [SaleController::class, 'updateSaleInvoice'])->name('#updateSaleInvoice');
    Route::get('deleteSaleInvoice/{voucherId}/{voucherCode}', [SaleController::class, 'deleteSaleInvoice'])->name('#deleteSaleInvoice');
});

Route::group(['prefix' => 'general/expense'], function(){
    Route::get('expense1', [DailyExpenseController::class, 'index'])->name('#expense1');
    Route::get('addExpense1', function(){return view('general expense.expense1.add_expense1');})->name('#addExpense1');
    Route::post('createExpense1', [DailyExpenseController::class, 'createExpense'])->name('#createExpense1');
    Route::get('editExpense1/{id}', [DailyExpenseController::class, 'editExpense'])->name('#editExpense1');
    Route::post('updateExpense1', [DailyExpenseController::class, 'updateExpense'])->name('#updateExpense1');
    Route::get('deleteExpense1/{id}', [DailyExpenseController::class, 'deleteExpense'])->name('#deleteExpense1');

    Route::get('expense2', [MonthlyExpenseController::class, 'index'])->name('#expense2');
    Route::get('addExpense2', function(){return view('general expense.expense2.add_expense2');})->name('#addExpense2');
    Route::post('createExpense2', [MonthlyExpenseController::class, 'createExpense'])->name('#createExpense2');
    Route::get('editExpense2/{id}', [MonthlyExpenseController::class, 'editExpense'])->name('#editExpense2');
    Route::post('updateExpense2', [MonthlyExpenseController::class, 'updateExpense'])->name('#updateExpense2');
    Route::get('deleteExpense2/{id}', [MonthlyExpenseController::class, 'deleteExpense'])->name('#deleteExpense2');

    Route::get('expense3', [YearlyExpenseController::class, 'index'])->name('#expense3');
    Route::get('addExpense3', function(){return view('general expense.expense3.add_expense3');})->name('#addExpense3');
    Route::post('createExpense3', [YearlyExpenseController::class, 'createExpense'])->name('#createExpense3');
    Route::get('editExpense3/{id}', [YearlyExpenseController::class, 'editExpense'])->name('#editExpense3');
    Route::post('updateExpense3', [YearlyExpenseController::class, 'updateExpense'])->name('#updateExpense3');
    Route::get('deleteExpense3/{id}', [YearlyExpenseController::class, 'deleteExpense'])->name('#deleteExpense3');
});


