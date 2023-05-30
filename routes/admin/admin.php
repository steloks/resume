<?php

use App\Http\Controllers\Admin\AllergenController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FoodPrepareController;
use App\Http\Controllers\Admin\KitchenController;
use App\Http\Controllers\Admin\ObjectController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\RecipeParametersController;
use App\Http\Controllers\Admin\ShoppingController;
use App\Http\Controllers\Admin\ZoningController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ClientPetController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Admin\OrderMenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\LoginHistoryController;
use App\Http\Controllers\Admin\CmsController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ProductDataController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminController::class, 'getLoginForm'])->name('adminLoginForm');
$locales = ['bg', 'en'];
Route::group(['middleware' =>  ['admin', 'localization:' . implode(',', $locales)], 'as' => 'admin.'], function () {

    Route::get('/set-locale', [AdminController::class, 'setLocale'])->name('setLocale');

    Route::get('/', [DashboardController::class, 'dashboardIndex'])->name('dashboard-index');
    Route::post('check-notification', [DashboardController::class, 'checkNotification'])->name('dashboard-index-check-notification');

    Route::prefix('/pdf')->group(function () {
        Route::post('/shopping/list', [PDFController::class, 'shoppingList'])->name('pdf.shopping.list');
        Route::post('/invoice/{invoiceId}', [PDFController::class, 'invoiceStore'])->name('pdf.invoice');
    });

    Route::prefix('/zoning')->group(function () {
        Route::get('/cities', [ZoningController::class, 'citiesView'])->name('zoning.cities');
        Route::get('/city/add', [ZoningController::class, 'cityAddView'])->name('zoning.city.add');
        Route::post('/city/add', [ZoningController::class, 'cityAdd'])->name('zoning.city.add');
        Route::get('/city/edit/{id}', [ZoningController::class, 'cityEditView'])->name('zoning.city.edit.view');
        Route::post('/city/edit', [ZoningController::class, 'cityEdit'])->name('zoning.city.edit');
        Route::post('/city/regions', [ZoningController::class, 'cityRegions'])->name('zoning.city.regions');
        Route::get('/regions', [ZoningController::class, 'regionsView'])->name('zoning.regions');
        Route::get('/regions/delivery/price', [ZoningController::class, 'regionsDeliveryPriceView'])->name('zoning.regions.delivery.price.view');
        Route::get('/regions/delivery/price/edit/{id}', [ZoningController::class, 'regionsDeliveryPriceEditView'])->name('zoning.regions.delivery.price.edit.view');
        Route::post('/regions/delivery/price/edit/', [ZoningController::class, 'regionsDeliveryPriceEdit'])->name('zoning.regions.delivery.price.edit');
        Route::get('/regions/add', [ZoningController::class, 'regionAddView'])->name('zoning.regions.add');
        Route::post('/regions/add', [ZoningController::class, 'regionAdd'])->name('zoning.regions.add');
        Route::get('/regions/edit/{id}', [ZoningController::class, 'regionEditView'])->name('zoning.regions.edit.view');
        Route::post('/regions/edit/', [ZoningController::class, 'regionEdit'])->name('zoning.regions.edit');
        Route::get('/regions/delete/{id}', [ZoningController::class, 'regionDelete'])->name('zoning.regions.delete');
        Route::post('/regions/bycity/', [ZoningController::class, 'regionByCity'])->name('zoning.regionByCity');
        Route::post('/region/subareas/', [ZoningController::class, 'regionSubAreas'])->name('zoning.region.subareas');
        Route::post('/subarea/delete/', [ZoningController::class, 'subAreaDelete'])->name('zoning.subarea.delete');
        Route::post('/subarea/byarea/', [ZoningController::class, 'subAreaByArea'])->name('zoning.subarea.byArea');
        Route::get('/postcodes', [ZoningController::class, 'postcodesView'])->name('zoning.postcodes');
        Route::post('/postcodes/grid', [ZoningController::class, 'postcodesGrid'])->name('zoning.postcodes.grid');
        Route::get('/postcodes/add/{id?}', [ZoningController::class, 'postcodesAddView'])->name('zoning.postcode.add');
        Route::get('/postcodes/edit/{id?}', [ZoningController::class, 'postcodesAddView'])->name('zoning.postcode.edit.view');
        Route::get('/postcodes/delete/{id?}', [ZoningController::class, 'postcodeDelete'])->name('zoning.postcode.delete');
        Route::post('/postcodes/add', [ZoningController::class, 'postcodesAdd'])->name('zoning.postcode.add');
        Route::get('/timeslots', [ZoningController::class, 'timeslotsView'])->name('zoning.timeslots');
        Route::get('/timeslots/add', [ZoningController::class, 'timeslotsAddView'])->name('zoning.timeslots.add.view');
        Route::post('/timeslots/add', [ZoningController::class, 'timeslotsAdd'])->name('zoning.timeslots.add');
        Route::get('/timeslots/edit/{id}', [ZoningController::class, 'timeslotsEdit'])->name('zoning.timeslots.edit.view');
        Route::get('/timeslots/delete/{id}', [ZoningController::class, 'timeslotsDelete'])->name('zoning.timeslots.delete');

        // Datatables
        Route::post('/grid-cities', [ZoningController::class, 'gridDataCities'])->name('zoning.gridDataCities');
        Route::post('/grid-postcodes', [ZoningController::class, 'gridDataPostcodes'])->name('zoning.gridDataPostcodes');
        Route::post('/grid-regions', [ZoningController::class, 'gridDataRegions'])->name('zoning.gridDataRegions');
        Route::post('/grid-timeslots', [ZoningController::class, 'gridDataTimeslots'])->name('zoning.gridDataTimeslots');

        Route::post('/import/csv', [ZoningController::class, 'importCSV'])->name('zoning.import.csv');
    });

    Route::prefix('/objects')->group(function () {
        Route::get('/', [ObjectController::class, 'objectsView'])->name('objects');
        Route::get('/add', [ObjectController::class, 'objectsAddView'])->name('objects.add');
        Route::post('/add', [ObjectController::class, 'objectsAdd'])->name('objects.add');
        Route::get('/edit/{id}', [ObjectController::class, 'objectsEditView'])->name('objects.edit.view');
        Route::get('/products/list', [ObjectController::class, 'productsList'])->name('objects.products.list');
        Route::get('/{objectId}/product/{id}', [ObjectController::class, 'objectProduct'])->name('objects.product.edit.view');
        Route::get('/delete/{objectId}/product/{id}', [ObjectController::class, 'objectProductDelete'])->name('objects.product.delete');
        Route::post('/edit/{objectId}/product/{id}', [ObjectController::class, 'objectProductEdit'])->name('objects.product.edit');
        Route::post('/{objectId}/{productId}', [ProductDataController::class, 'objectProductGrid'])->name('objects.product.grid');
        Route::post('/products/list/grid', [ObjectController::class, 'productsListGrid'])->name('objects.products.list.grid');
        Route::post('/batch', [ProductDataController::class, 'productBatch'])->name('objects.batch');
        Route::post('/grid-objects', [ObjectController::class, 'gridDataObjects'])->name('objects.gridDataObjects');
        Route::post('/addProductData', [ProductDataController::class, 'addProductData'])->name('objects.addProductData');
    });

    Route::prefix('/kitchen')->group(function () {
        Route::get('/', [KitchenController::class, 'indexKitchen'])->name('kitchen.index');
        Route::post('/by-region', [KitchenController::class, 'objectByRegion'])->name('kitchen.region');
        Route::get('/region/{regionId}/menus/{courierId}', [KitchenController::class, 'menusByRegion'])->name('kitchen.region.menus');
        Route::post('/region/{regionId}/courier/{courierId}/menus', [KitchenController::class, 'menusByRegionGrid'])->name('kitchen.region.menus.grid');
        Route::post('/couriers', [CourierController::class, 'courierByArea'])->name('kitchen.couriers.by.area');
        Route::get('/cooking/region/{regionId}/courier/{courierId}', [KitchenController::class, 'cooking'])->name('kitchen.cooking');
        Route::post('/cooking/menu/{recipeId}/pet/{petId}', [KitchenController::class, 'petRecipeProducts'])->name('kitchen.cooking.menu.products');
        Route::post('/cooking/menu/ready', [KitchenController::class, 'menuReady'])->name('kitchen.menu.ready');
        Route::post('/cooking/print', [KitchenController::class, 'printOrder'])->name('kitchen.menu.print');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'categoriesView'])->name('categories');
        Route::get('/add', [CategoryController::class, 'categoriesAddView'])->name('categories.add.view');
        Route::post('/add', [CategoryController::class, 'categoriesAdd'])->name('categories.add');
        Route::get('/edit/{id}', [CategoryController::class, 'categoriesAddEdit'])->name('categories.edit.view');
        Route::post('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('categories.delete');
        Route::post('/grid-categories', [CategoryController::class, 'gridDataCategories'])->name('categories.gridDataCategories');
    });

    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'productsView'])->name('products');
        Route::get('/add', [ProductController::class, 'productsAddView'])->name('products.add.view');
        Route::post('/add', [ProductController::class, 'productsAdd'])->name('products.add');
        Route::get('/edit/{id}', [ProductController::class, 'productsEditView'])->name('products.edit.view');
        Route::post('/grid-products', [ProductController::class, 'gridDataProducts'])->name('products.gridDataProducts');
        Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');
        Route::post('/productToObjects', [ProductController::class, 'addProductsFromObjects'])->name('products.attach.to.objects');
        Route::get('/productData', [ProductDataController::class, 'productData'])->name('products.product.data');
        Route::post('/productData/grid', [ProductDataController::class, 'productDataGrid'])->name('products.product.data.grid');
        Route::post('/productData/excel', [ProductDataController::class, 'productDataExcel'])->name('products.product.data.excel');
    });

    Route::prefix('/clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/edit/{id}', [ClientController::class, 'clientEditView'])->name('clients.edit.view');
        Route::post('/grid-clients', [ClientController::class, 'gridDataClients'])->name('clients.gridDataClients');
        Route::post('/grid-clients-addresses-{id}', [ClientController::class, 'gridDataClientsAddresses'])->name('clients.gridDataClientsAddresses');
        Route::post('/grid-clients-pets-{id}', [ClientController::class, 'gridDataClientsPets'])->name('clients.gridDataClientsPets');
        Route::post('/grid-clients-orders-{id}', [ClientController::class, 'gridDataClientsOrders'])->name('clients.gridDataClientsOrders');
        Route::post('/grid-clients-order-comments-{id}', [ClientController::class, 'gridDataClientsOrderComments'])->name('clients.gridDataClientsOrderComments');
        Route::post('/save-personal-data/{id}', [ClientController::class, 'personalData'])->name('clients.personalData');
        Route::post('/grid-favourite-menus-{id}', [ClientController::class, 'gridDataFavouriteMenus'])->name('clients.gridDataFavouriteMenus');
    });

    Route::prefix('/clients-pets')->group(function () {
        Route::get('/', [ClientPetController::class, 'index'])->name('clients-pets.index');
        Route::get('/edit/{id}', [ClientPetController::class, 'clientPetEditView'])->name('clients-pets.edit.view');
        Route::post('/grid-client-pets', [ClientPetController::class, 'gridDataClientPets'])->name('clients-pets.gridDataClientPets');
    });

    Route::prefix('/recipe')->group(function () {
        Route::get('/', [RecipeController::class, 'recipesView'])->name('recipes');
        Route::get('/calculated/recipes', [RecipeController::class, 'caclulatedRecipeList'])->name('recipes.calculated.list');
        Route::get('/calculated/recipes/{id}', [RecipeController::class, 'caclulatedRecipeEditView'])->name('recipes.calculated.edit.view');
        Route::get('/calculated/recipes/delete/{id}', [RecipeController::class, 'caclulatedRecipeListDelete'])->name('recipes.calculated.delete');
        Route::post('/calculated/recipes/grid', [RecipeController::class, 'caclulatedRecipeListGrid'])->name('recipes.calculated.list.grid');
        Route::get('/add', [RecipeController::class, 'recipeAddView'])->name('recipe.add.view');
        Route::post('/add', [RecipeController::class, 'recipeAdd'])->name('recipe.add');
        Route::get('/delete/{id}', [RecipeController::class, 'recipeDelete'])->name('recipe.delete');
        Route::get('/edit/{id}', [RecipeController::class, 'recipeEdit'])->name('recipe.edit.view');
        Route::get('/parameters', [RecipeParametersController::class, 'recipeParams'])->name('recipe.parameters.view');
        Route::post('/parameters/edit', [RecipeParametersController::class, 'recipeParamsEdit'])->name('recipe.parameters.edit');
        Route::post('/parameters/percentages/edit', [RecipeParametersController::class, 'recipeParamPercentagesEdit'])->name('recipe.parameters.percentages.edit');
        Route::post('/parameters/supplements/edit', [RecipeParametersController::class, 'recipeSupplementsEdit'])->name('recipe.parameters.supplements.edit');

        Route::post('/recipeParamsByType', [RecipeParametersController::class, 'recipeParamsByType'])->name('recipe.parameters.by.type');
        Route::post('/grid-recipes', [RecipeController::class, 'gridDataRecipes'])->name('recipes.gridDataRecipes');
    });

    Route::prefix('/allergens')->group(function () {
        Route::get('/', [AllergenController::class, 'index'])->name('allergens.index');
        Route::get('/add', [AllergenController::class, 'create'])->name('allergens.add.view');
        Route::post('/store', [AllergenController::class, 'store'])->name('allergens.store');
        Route::get('/show/{id}', [AllergenController::class, 'show'])->name('allergens.show.view');
        Route::get('/edit/{id}', [AllergenController::class, 'edit'])->name('allergens.edit.view');
        Route::post('/update/{id}', [AllergenController::class, 'update'])->name('allergens.update');
        Route::get('/delete/{id}', [AllergenController::class, 'delete'])->name('allergens.delete');
        Route::post('/grid-allergens', [AllergenController::class, 'gridDataAdminAllergens'])->name('allergens.gridDataAdminAllergens');
        Route::post('/grid-breeds', [BreedController::class, 'gridDataBreeds'])->name('breeds.gridDataBreeds');
    });

    Route::prefix('/orders')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('orders.edit.view');
        Route::post('/update/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::post('/grid-orders', [AdminOrderController::class, 'gridDataAdminOrders'])->name('orders.gridDataAdminOrders');
        Route::post('/grid-order-products/{id}', [AdminOrderController::class, 'gridDataAdminOrderProducts'])->name('orders.gridDataAdminOrderProducts');
    });

    Route::prefix('/invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'invoiceList'])->name('invoices');
        Route::post('/grid', [InvoiceController::class, 'invoiceListGrid'])->name('invoices.list.grid');
        Route::get('/view/{id}', [InvoiceController::class, 'invoiceView'])->name('invoices.edit.view');
//        Route::get('/pdf', [InvoiceController::class, 'generatePdf'])->name('invoices.pdf');
    });

    //какво има да преправяш, като вкарваш един празен стринг с id - Вержи
    Route::prefix('/couriers')->group(function () {
        Route::get('/', [CourierController::class, 'index'])->name('couriers.index');
        Route::get('/deliveries', [CourierController::class, 'deliveries'])->name('couriers.deliveries');
        Route::post('/deliveries/grid', [CourierController::class, 'gridDelivery'])->name('couriers.deliveries.grid');
        Route::post('/deliveries/status/change', [CourierController::class, 'deliveryStatusChange'])->name('couriers.deliveries.status.change');
        Route::post('/grid', [CourierController::class, 'grid'])->name('couriers.list.grid');
        Route::post('/filterObjects', [CourierController::class, 'filterObjects'])->name('courier.filter.objects');
        Route::post('/filterAreas', [CourierController::class, 'filterAreas'])->name('courier.filter.areas');
        Route::post('/assign', [CourierController::class, 'assign'])->name('courier.assign');
    });

    Route::prefix('/food-prepare')->group(function () {
        Route::get('/', [FoodPrepareController::class, 'index'])->name('food.prepare.index');
        Route::post('/grid', [FoodPrepareController::class, 'grid'])->name('food.prepare.grid');
        Route::post('/prepare/{id}', [FoodPrepareController::class, 'prepare'])->name('food.prepare');
    });

    Route::prefix('/shopping')->group(function () {
        Route::get('/list', [ShoppingController::class, 'list'])->name('shopping.list');
        Route::post('/list/grid', [ShoppingController::class, 'listGrid'])->name('shopping.list.grid');
        Route::post('/purchase/{shoppingListId}', [ShoppingController::class, 'purchase'])->name('shopping.purchase');
        Route::get('/purchased-list', [ShoppingController::class, 'purchasedList'])->name('shopping.purchased.list');
        Route::post('/purchased-list/grid', [ShoppingController::class, 'purchasedListGrid'])->name('shopping.purchased.list.grid');
        Route::post('/store-purchased', [ShoppingController::class, 'storePurchased'])->name('shopping.store.purchased');
        Route::post('/print-purchased', [ShoppingController::class, 'printPurchased'])->name('shopping.print.purchased');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/add', [UserController::class, 'add'])->name('users.add.view');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show.view');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit.view');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::post('/grid', [UserController::class, 'gridDataAdminUsers'])->name('users.gridDataAdminUsers');
    });

    Route::prefix('/company-info')->group(function () {
        Route::get('/', [CompanyInfoController::class, 'index'])->name('company-info.index');
        Route::get('/add', [CompanyInfoController::class, 'edit'])->name('company-info.edit.view');
        Route::get('/other/settings', [CompanyInfoController::class, 'otherSettings'])->name('company-info.other.settings');
        Route::post('/store', [CompanyInfoController::class, 'store'])->name('company-info.store');
        Route::post('/other/settings/store', [CompanyInfoController::class, 'otherSettingsStore'])->name('company-info.other.settings.store');
    });

    Route::prefix('/login-history')->group(function () {
        Route::get('/', [LoginHistoryController::class, 'index'])->name('login-history.index');
        Route::post('/grid-login-history', [LoginHistoryController::class, 'gridDataLoginHistory'])->name('login-history.gridDataLoginHistory');
    });

    Route::prefix('/cms')->group(function () {
        Route::get('/', [CmsController::class, 'index'])->name('cms.index');
        Route::get('/add', [CmsController::class, 'add'])->name('cms.add.view');
        Route::post('/store', [CmsController::class, 'store'])->name('cms.store');
        Route::get('/edit/{id}', [CmsController::class, 'edit'])->name('cms.edit.view');
        Route::post('/update/{id}', [CmsController::class, 'update'])->name('cms.update');
        Route::get('/delete/{id}', [CmsController::class, 'delete'])->name('cms.delete');
        Route::post('/grid', [CmsController::class, 'gridDataCms'])->name('cms.gridDataCms');
    });


    // Translation routes
    Route::group(['prefix' => 'translations', 'as' => 'Translation::'], function () {
        Route::get('/', [TranslationController::class, 'index'])->name('index');
        Route::get('specific/{code?}', [TranslationController::class, 'getSpecific'])->name('getSpecific');
        Route::get('get-translations', [TranslationController::class, 'getTranslations'])->name('getTranslations');
        Route::post('search-locale', [TranslationController::class, 'searchByLocale'])->name('searchByLocale');
        Route::post('translation/save', [TranslationController::class, 'saveTranslation'])
            ->name('saveTranslation');
    });

    Route::prefix('/breeds')->group(function () {
        Route::get('/', [BreedController::class, 'index'])->name('breeds.index');
        Route::get('/add', [BreedController::class, 'add'])->name('breeds.add.view');
        Route::post('/store', [BreedController::class, 'store'])->name('breeds.store');
        Route::get('/show/{id}', [BreedController::class, 'show'])->name('breeds.show.view');
        Route::get('/edit/{id}', [BreedController::class, 'edit'])->name('breeds.edit.view');
        Route::post('/edit/{id}', [BreedController::class, 'update'])->name('breeds.update');
        Route::get('/delete/{id}', [BreedController::class, 'delete'])->name('breeds.delete');
        Route::post('/grid-breeds', [BreedController::class, 'gridDataBreeds'])->name('breeds.gridDataBreeds');
    });

    Route::prefix('/favourite-menus')->group(function () {
        Route::get('/', [ClientPetController::class, 'favouriteMenus'])->name('favouriteMenus.index');
        Route::post('/grid-favourite-menus', [ClientPetController::class, 'gridDataFavouriteMenus'])->name('favouriteMenus.gridDataFavouriteMenus');
    });

    Route::prefix('/order-menus')->group(function () {
        Route::get('/', [OrderMenuController::class, 'index'])->name('order-menus.index');
        Route::post('/grid-order-menus', [OrderMenuController::class, 'gridDataAdminOrderMenus'])->name('order-menus.gridDataAdminOrderMenus');
        Route::post('/grid-order-menus-products/{id}', [OrderMenuController::class, 'renderRecipes'])->name('order-menus.renderRecipes');
        Route::post('/mark-as-recipe-returned-{orderId}', [OrderMenuController::class, 'markRecipeAsReturned'])->name('order-menus.markRecipeAsReturned');
    });

    Route::prefix('/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/add', [RoleController::class, 'add'])->name('roles.add.view');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('roles.show.view');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit.view');
        Route::post('/edit/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
        Route::post('/grid-roles', [RoleController::class, 'gridDataRoles'])->name('roles.gridDataRoles');

    });

    Route::get('/cookhouse-preparation', [DashboardController::class, 'dashboardCookhousePreparation'])->name('dashboard-cookhouse-preparation');
    Route::get('/cookhouse-prepare-orders-1', [DashboardController::class, 'dashboardCookhousePrepareOrders1'])->name('dashboard-cookhouse-prepare-orders-1');
    Route::get('/cookhouse-prepare-orders-2', [DashboardController::class, 'dashboardCookhousePrepareOrders2'])->name('dashboard-cookhouse-prepare-orders-2');
    Route::get('/cookhouse-order', [DashboardController::class, 'dashboardCookhouseOrder'])->name('dashboard-cookhouse-order');
    Route::get('/cookhouse-supply', [DashboardController::class, 'dashboardCookhouseSupply'])->name('dashboard-cookhouse-supply');

    Route::get('/clients-list', [DashboardController::class, 'dashboardClientsList'])->name('dashboard-clients-list');
    Route::get('/client-personal-data', [DashboardController::class, 'dashboardClientPersonalData'])->name('dashboard-client-personal-data');
    Route::get('/client-personal-data-edit', [DashboardController::class, 'dashboardClientPersonalDataEdit'])->name('dashboard-client-personal-data-edit');
    Route::get('/client-addresses', [DashboardController::class, 'dashboardClientAddresses'])->name('dashboard-client-addresses');
    Route::get('/client-address-edit', [DashboardController::class, 'dashboardClientAddressEdit'])->name('dashboard-client-address-edit');
    Route::get('/client-orders', [DashboardController::class, 'dashboardClientOrders'])->name('dashboard-client-orders');
    Route::get('/client-pets', [DashboardController::class, 'dashboardClientPets'])->name('dashboard-client-pets');
    Route::get('/client-menus-favourites', [DashboardController::class, 'dashboardClientMenusFavourites'])->name('dashboard-client-menus-favourites');
    Route::get('/client-comments', [DashboardController::class, 'dashboardClientComments'])->name('dashboard-client-comments');
    Route::get('/client-dogs-profiles', [DashboardController::class, 'dashboardClientDogsProfiles'])->name('dashboard-client-dogs-profiles');
    Route::get('/client-dog-profile', [DashboardController::class, 'dashboardClientDogProfile'])->name('dashboard-client-dog-profile');

    Route::get('/store-categories', [DashboardController::class, 'dashboardStoreCategories'])->name('dashboard-store-categories');
    Route::get('/store-category-new', [DashboardController::class, 'dashboardStoreCategoryNew'])->name('dashboard-store-category-new');
    Route::get('/store-category-detail', [DashboardController::class, 'dashboardStoreCategoryDetail'])->name('dashboard-store-category-detail');
    Route::get('/store-category-edit', [DashboardController::class, 'dashboardStoreCategoryEdit'])->name('dashboard-store-category-edit');
    Route::get('/store-nomenclature', [DashboardController::class, 'dashboardStoreNomenclature'])->name('dashboard-store-nomenclature');
    Route::get('/store-nomenclature-detail', [DashboardController::class, 'dashboardStoreNomenclatureDetail'])->name('dashboard-store-nomenclature-detail');
    Route::get('/store-nomenclature-edit', [DashboardController::class, 'dashboardStoreNomenclatureEdit'])->name('dashboard-store-nomenclature-edit');
    Route::get('/store-nomenclature-add', [DashboardController::class, 'dashboardStoreNomenclatureAdd'])->name('dashboard-store-nomenclature-add');

    Route::get('/regions-cities', [DashboardController::class, 'dashboardRegionsCities'])->name('dashboard-regions-cities');
    Route::get('/regions-cities-detail', [DashboardController::class, 'dashboardRegionsCitiesDetail'])->name('dashboard-regions-cities-detail');
    Route::get('/regions-cities-edit', [DashboardController::class, 'dashboardRegionsCitiesEdit'])->name('dashboard-regions-cities-edit');
    Route::get('/regions-cities-add', [DashboardController::class, 'dashboardRegionsCitiesAdd'])->name('dashboard-regions-cities-add');
    Route::get('/regions', [DashboardController::class, 'dashboardRegions'])->name('dashboard-regions');
    Route::get('/regions-detail', [DashboardController::class, 'dashboardRegionsDetail'])->name('dashboard-regions-detail');
    Route::get('/regions-edit', [DashboardController::class, 'dashboardRegionsEdit'])->name('dashboard-regions-edit');
    Route::get('/regions-add', [DashboardController::class, 'dashboardRegionsAdd'])->name('dashboard-regions-add');
    Route::get('/regions-pc-addresses', [DashboardController::class, 'dashboardRegionsPcAddresses'])->name('dashboard-regions-pc-addresses');
    Route::get('/regions-pc-addresses-detail', [DashboardController::class, 'dashboardRegionsPcAddressesDetail'])->name('dashboard-regions-pc-addresses-detail');
    Route::get('/regions-pc-addresses-edit', [DashboardController::class, 'dashboardRegionsPcAddressesEdit'])->name('dashboard-regions-pc-addresses-edit');
    Route::get('/regions-pc-addresses-add', [DashboardController::class, 'dashboardRegionsPcAddressesAdd'])->name('dashboard-regions-pc-addresses-add');
    Route::get('/regions-time-slots', [DashboardController::class, 'dashboardRegionsTimeSlots'])->name('dashboard-regions-time-slots');
    Route::get('/regions-time-slots-detail', [DashboardController::class, 'dashboardRegionsTimeSlotsDetail'])->name('dashboard-regions-time-slots-detail');
    Route::get('/regions-time-slots-edit', [DashboardController::class, 'dashboardRegionsTimeSlotsEdit'])->name('dashboard-regions-time-slots-edit');
    Route::get('/regions-time-slots-add', [DashboardController::class, 'dashboardRegionsTimeSlotsAdd'])->name('dashboard-regions-time-slots-add');
    Route::get('/regions-price-delivery-list', [DashboardController::class, 'dashboardRegionsPriceDeliveryList'])->name('dashboard-regions-price-delivery-list');
    Route::get('/regions-price-delivery-detail', [DashboardController::class, 'dashboardRegionsPriceDeliveryDetail'])->name('dashboard-regions-price-delivery-detail');
    Route::get('/regions-price-delivery-edit', [DashboardController::class, 'dashboardRegionsPriceDeliveryEdit'])->name('dashboard-regions-price-delivery-edit');
    Route::get('/regions-price-delivery-add', [DashboardController::class, 'dashboardRegionsPriceDeliveryAdd'])->name('dashboard-regions-price-delivery-add');

    Route::get('/orders-list', [DashboardController::class, 'dashboardOrdersList'])->name('dashboard-orders-list');

});


