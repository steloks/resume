<?php

use App\Http\Controllers\Admin\ZoningController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CmsController;


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
    return view('welcome');
});

Route::post('/unsuccessful-payment', function () {
    return view('front.user-order.user-order-fail');
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

//todo add success
Route::post('/unsuccessful-payment', [OrderController::class, 'bankUnSuccessful'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::post('/successful-payment', [OrderController::class, 'bankSuccess'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

Route::post('/transaction-payment', function () {
    echo json_encode(request()->all());
    die();
    return view('front.user-order.user-order-fail');
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

Route::get('/', [FrontController::class, 'homePage']);
Route::get('/home-page', [FrontController::class, 'frontHomePage']);
Route::get('/contact', [FrontController::class, 'contactPage']);
//Route::get('/blog', [FrontController::class, 'blogPage']);
Route::get('/news-article', [FrontController::class, 'newsArticlePage']);
Route::get('/our-philosophy', [FrontController::class, 'frontOurPhilosophy']);
Route::get('/our-beliefs', [FrontController::class, 'frontOurBeliefs']);
Route::get('/our-menus', [FrontController::class, 'frontOurMenus']);

Route::get('/user-profile-addresses', [FrontController::class, 'userPageProfileAddresses'])
    ->name('user-profile-addresses');
Route::get('/user-profile-no-addresses', [FrontController::class, 'userPageProfileNoAddresses'])
    ->name('user-profile-no-addresses');
Route::get('/user-profile-my-orders-history', [FrontController::class, 'userPageProfileMyOrdersHistory'])
    ->name('user-profile-my-orders-history');
Route::get('/user-profile-my-order-history', [FrontController::class, 'userPageProfileMyOrderHistory'])
    ->name('user-profile-my-order-history');
Route::get('/user-profile-details', [FrontController::class, 'userPageProfileDetails'])->name('user-profile-details');

Route::get('/user-pet-profile', [FrontController::class, 'userPagePetProfile'])->name('user-pet-profile');
Route::get('/user-pet-profiles-listing', [FrontController::class, 'userPagePetProfilesListing'])
    ->name('user-pet-profiles-listing');
Route::get('/user-pet-profile-diary', [FrontController::class, 'userPagePetProfileDiary'])
    ->name('user-pet-profile-diary');
Route::get('/user-pet-profile-create-1', [FrontController::class, 'userPagePetProfileCreate1'])
    ->name('user-pet-profile-create-1');
Route::get('/user-pet-profile-create-2', [FrontController::class, 'userPagePetProfileCreate2'])
    ->name('user-pet-profile-create-2');
Route::get('/user-pet-profile-create-3', [FrontController::class, 'userPagePetProfileCreate3'])
    ->name('user-pet-profile-create-3');
Route::get('/user-pet-profile-edit-1', [FrontController::class, 'userPagePetProfileEdit1'])
    ->name('user-pet-profile-edit-1');
Route::get('/user-pet-profile-edit-2', [FrontController::class, 'userPagePetProfileEdit2'])
    ->name('user-pet-profile-edit-2');
Route::get('/user-pet-profile-edit-3', [FrontController::class, 'userPagePetProfileEdit3'])
    ->name('user-pet-profile-edit-3');
Route::get('/user-pet-profile-no-pets', [FrontController::class, 'userPagePetProfileNoPets'])
    ->name('user-pet-profile-no-pets');

Route::get('/order-steps', [FrontController::class, 'userOrderSteps'])->name('user-order-steps');
Route::get('/order-step-1', [FrontController::class, 'userOrderStep1'])->name('user-order-step-1');
Route::get('/order-step-2-menu', [FrontController::class, 'userOrderStep2Menu'])->name('user-order-step-2-menu');
Route::get('/order-step-2-cart', [FrontController::class, 'userOrderStep2Cart'])->name('user-order-step-2-cart');
Route::get('/order-step-3', [FrontController::class, 'userOrderStep3'])->name('user-order-step-3');
Route::get('/order-success', [FrontController::class, 'userOrderSuccess'])->name('user-order-success');
Route::get('/order-has-not-been-processed', [FrontController::class, 'userOrderHasNotBeenProcessed'])->name('user-order-has-not-been-processed');
Route::get('/editor/{id}', [CmsController::class, 'editor'])->name('editor');
Route::post('/editor-store/{id}', [CmsController::class, 'store'])->name('editorStore');

Route::get('/all-modals', [FrontController::class, 'allModals'])->name('all-modals');

Route::get('/admin-modals', [FrontController::class, 'adminModals'])->name('admin-modals');

Route::get('/user-favourites', [FrontController::class, 'userFavourites'])->name('user-favourites');

Route::prefix('/admin')->namespace('Admin')
    //    ->middleware(['admin'])
    ->group(function () {
        foreach (File::allFiles(__DIR__ . '/admin') as $partial) {
            require $partial->getPathname();
        }
    });

Route::namespace('Front')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::get('/logout/{isAdmin?}', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/postcodes/valid', [ZoningController::class, 'validPostcode'])->name('zoning.postcode.valid');
    Route::post('/contact-form', [HomeController::class, 'contactForm'])->name('contact.form');


    Route::group(['as' => 'profile.', 'prefix' => 'profile', 'middleware' => 'auth'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('pets', [UserController::class, 'pets'])->name('pets');
        Route::get('addresses', [UserController::class, 'addresses'])->name('addresses');
        Route::get('orders', [UserController::class, 'orders'])->name('orders');
        Route::get('diary/{id}', [UserController::class, 'diary'])->name('diary');
        Route::post('diary-check-notification/{id}', [UserController::class, 'diaryCheckNotification'])->name('diaryCheckNotification');
        Route::get('favourites', [UserController::class, 'favourites'])->name('favourites');
        Route::get('create-pet', [UserController::class, 'createPet'])->name('createPet');
        Route::get('edit-pet/{id}', [UserController::class, 'editPet'])->name('editPet');
        Route::post('/archive-pet/{id}', [UserController::class, 'archivePet'])->name('archivePet');
        //update profile details
        Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
        //create pet
        Route::post('/store-pet-first-step', [UserController::class, 'storePetFirstStep'])->name('storePetFirstStep');
        Route::post('/store-pet-second-step', [UserController::class, 'storePetSecondStep'])->name('storePetSecondStep');
        Route::post('/store-pet-third-step', [UserController::class, 'storePetThirdStep'])->name('storePetThirdStep');
        //Update pet
        Route::post('/update-pet-first-step', [UserController::class, 'updatePetFirstStep'])->name('updatePetFirstStep');
        Route::post('/update-pet-second-step', [UserController::class, 'updatePetSecondStep'])->name('updatePetSecondStep');
        Route::post('/update-pet-third-step', [UserController::class, 'updatePetThirdStep'])->name('updatePetThirdStep');
        Route::post('/grid-orders', [UserController::class, 'gridOrderData'])->name('gridOrderData');
        Route::get('/view-order/{id}', [UserController::class, 'viewOrder'])->name('viewOrder');

        Route::post('/add-new-address', [UserController::class, 'addNewAddress'])->name('addNewAddress');
        Route::post('/update-address/{id}', [UserController::class, 'updateAddress'])->name('updateAddress');
        Route::post('/delete-address/{id}', [UserController::class, 'deleteAddress'])->name('deleteAddress');

        Route::post('/invoice/{invoiceId}', [UserController::class, 'invoiceStore'])->name('invoice');
    });

    Route::group(['as' => 'order.', 'prefix' => 'order', 'middleware' => 'auth'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/recipes/{id}', [OrderController::class, 'orderRecipes'])->name('recipes');
        Route::get('/dogs/{id}', [OrderController::class, 'orderDogs'])->name('dogs');
        Route::get('/timeslots/{id}', [OrderController::class, 'timeslotsByArea'])->name('timeslots.by.area');
        Route::post('/addToCart', [OrderController::class, 'addToCart'])->name('add.to.cart');
        Route::post('/cart', [OrderController::class, 'cart'])->name('cart');
        Route::post('/delete-cart-item/{id}', [OrderController::class, 'deleteCartItem'])->name('deleteCartItem');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::post('/favourite-recipe', [OrderController::class, 'favouriteRecipe'])->name('favouriteRecipe');
        Route::post('/confirm-cancel-menu', [OrderController::class, 'confirmCancelMenu'])->name('confirmCancelMenu');
        Route::post('/checkout-order-step', [OrderController::class, 'checkoutOrderStep'])->name('checkoutOrderStep');
        Route::post('/confirm-cancel-order', [OrderController::class, 'confirmCancelOrder'])->name('confirmCancelOrder');

        Route::get('/success/{id}', [OrderController::class, 'successPage'])->name('successPage');
    });

    Route::group(['as' => 'cms.'], function () {
        $scope = \App\Models\Cms::query()->pluck('slug')->toArray();
        Route::get('/blog', [CmsController::class, 'blogIndex'])->name('blogIndex');
        if (!empty(request()->segment(1)) && in_array(request()->segment(1), $scope)) {
            Route::get('/{slug}', [CmsController::class, 'index'])->name('index')->where('slug', implode('|', $scope));
            Route::post('/{slug}/store-cms/{id}', [CmsController::class, 'store'])->name('store.content');
        }
    });

    Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function () {
        Route::post('/create', [OrderController::class, 'paypalCreate'])->name('paypalCreate');
        Route::post('/capture', [OrderController::class, 'paypalCapture'])->name('paypalCapture');
    });


    Route::get('/cookhouse-preparation', [DashboardController::class, 'dashboardCookhousePreparation'])->name('dashboard-cookhouse-preparation');
    Route::get('/cookhouse-prepare-orders-1', [DashboardController::class, 'dashboardCookhousePrepareOrders1'])->name('dashboard-cookhouse-prepare-orders-1');
    Route::get('/cookhouse-prepare-orders-2', [DashboardController::class, 'dashboardCookhousePrepareOrders2'])->name('dashboard-cookhouse-prepare-orders-2');
    Route::get('/cookhouse-order', [DashboardController::class, 'dashboardCookhouseOrder'])->name('dashboard-cookhouse-order');

    Route::get('/cookhouse-supply', [DashboardController::class, 'dashboardCookhouseSupply'])->name('dashboard-cookhouse-supply');


    Route::get('/clients-list', [DashboardController::class, 'dashboardClientsList'])->name('dashboard-clients-list');
    Route::get('/client-personal-data', [DashboardController::class, 'dashboardClientPersonalData'])->name('dashboard-client-personal-data');
    Route::get('/client-personal-data-edit', [DashboardController::class, 'dashboardClientPersonalDataEdit'])->name('dashboard-client-personal-data-edit');
    Route::get('/client-tabs', [DashboardController::class, 'dashboardClientTabs'])->name('dashboard-client-tabs');
    Route::get('/client-addresses', [DashboardController::class, 'dashboardClientAddresses'])->name('dashboard-client-addresses');
    Route::get('/client-address-edit', [DashboardController::class, 'dashboardClientAddressEdit'])->name('dashboard-client-address-edit');
    Route::get('/client-orders', [DashboardController::class, 'dashboardClientOrders'])->name('dashboard-client-orders');
    Route::get('/client-pets', [DashboardController::class, 'dashboardClientPets'])->name('dashboard-client-pets');
    Route::get('/client-menus-favourites', [DashboardController::class, 'dashboardClientMenusFavourites'])->name('dashboard-client-menus-favourites');
    Route::get('/client-comments', [DashboardController::class, 'dashboardClientComments'])->name('dashboard-client-comments');
    Route::get('/client-dogs-profiles', [DashboardController::class, 'dashboardClientDogsProfiles'])->name('dashboard-client-dogs-profiles');
    Route::get('/client-dog-profile', [DashboardController::class, 'dashboardClientDogProfile'])->name('dashboard-client-dog-profile');

    Route::get('/clients-orders', [DashboardController::class, 'dashboardClientsOrders'])->name('dashboard-clients-orders');
    Route::get('/clients-order-detail', [DashboardController::class, 'dashboardClientsOrderDetail'])->name('dashboard-clients-order-detail');
    Route::get('/clients-order-edit', [DashboardController::class, 'dashboardClientsOrderEdit'])->name('dashboard-clients-order-edit');
    Route::get('/clients-invoice-list', [DashboardController::class, 'dashboardClientsInvoiceList'])->name('dashboard-clients-invoice-list');
    Route::get('/clients-invoice-detail', [DashboardController::class, 'dashboardClientsInvoiceDetail'])->name('dashboard-clients-invoice-detail');
    Route::get('/admin-invoice-pdf', [DashboardController::class, 'dashboardClientsInvoicePdf'])->name('dashboard-invoice-1');
    Route::get('/clients-orders-from-menu-1', [DashboardController::class, 'dashboardClientsOrdersFromMenu1'])->name('dashboard-clients-orders-from-menu-1');
    Route::get('/clients-orders-from-menu-2', [DashboardController::class, 'dashboardClientsOrdersFromMenu2'])->name('dashboard-clients-orders-from-menu-2');
    Route::get('/clients-orders-from-menu-3', [DashboardController::class, 'dashboardClientsOrdersFromMenu3'])->name('dashboard-clients-orders-from-menu-3');
    Route::get('/clients-courier-list', [DashboardController::class, 'dashboardClientsCourierList'])->name('dashboard-clients-courier-list');
    Route::get('/clients-favourite-menu', [DashboardController::class, 'dashboardClientsFavouriteMenu'])->name('dashboard-clients-favourite-menu');
    Route::get('/customers-list', [DashboardController::class, 'dashboardCustomersList'])->name('dashboard-customers-list');
    Route::get('/customer-data', [DashboardController::class, 'dashboardCustomerData'])->name('dashboard-customer-data');
    Route::get('/customer-data-edit', [DashboardController::class, 'dashboardCustomerDataEdit'])->name('dashboard-customer-data-edit');
    Route::get('/customer-change-password', [DashboardController::class, 'dashboardCustomerChangePassword'])->name('dashboard-customer-change-password');
    Route::get('/customer-objects-detail', [DashboardController::class, 'dashboardCustomerObjectsDetail'])->name('dashboard-customer-objects-detail');
    Route::get('/customer-objects-edit', [DashboardController::class, 'dashboardCustomerObjectsEdit'])->name('dashboard-customer-objects-edit');
    Route::get('/customer-kind-detail', [DashboardController::class, 'dashboardCustomerKindDetail'])->name('dashboard-customer-kind-detail');
    Route::get('/customer-kind-edit', [DashboardController::class, 'dashboardCustomerKindEdit'])->name('dashboard-customer-kind-edit');
    Route::get('/customer-permissions-detail', [DashboardController::class, 'dashboardCustomerPermissionsDetail'])->name('dashboard-customer-permissions-detail');
    Route::get('/customer-create', [DashboardController::class, 'dashboardCustomerCreate'])->name('dashboard-customer-create');
    Route::get('/customer-create-objects', [DashboardController::class, 'dashboardCustomerCreateObjects'])->name('dashboard-customer-create-objects');
    Route::get('/customer-create-kind', [DashboardController::class, 'dashboardCustomerCreateKind'])->name('dashboard-customer-create-kind');
    Route::get('/customers-permissions-list', [DashboardController::class, 'dashboardCustomersPermissionsList'])->name('dashboard-customers-permissions-list');
    Route::get('/customers-permission-detail', [DashboardController::class, 'dashboardCustomersPermissionDetail'])->name('dashboard-customers-permission-detail');
    Route::get('/customers-permission-edit', [DashboardController::class, 'dashboardCustomersPermissionEdit'])->name('dashboard-customers-permission-edit');
    Route::get('/customers-permissions-global-detail', [DashboardController::class, 'dashboardCustomersPermissionsGlobalDetail'])->name('dashboard-customers-permissions-global-detail');
    Route::get('/customers-permissions-module-detail', [DashboardController::class, 'dashboardCustomersPermissionsModuleDetail'])->name('dashboard-customers-permissions-module-detail');
    Route::get('/customers-permissions-add-1', [DashboardController::class, 'dashboardCustomersPermissionsAdd1'])->name('dashboard-customers-permissions-add-1');
    Route::get('/customers-permissions-add-2', [DashboardController::class, 'dashboardCustomersPermissionsAdd2'])->name('dashboard-customers-permissions-add-2');
    Route::get('/customers-objects-list', [DashboardController::class, 'dashboardCustomersObjectsList'])->name('dashboard-customers-objects-list');
    Route::get('/customers-object-add', [DashboardController::class, 'dashboardCustomersObjectAdd'])->name('dashboard-customers-object-add');
    Route::get('/customers-object-detail', [DashboardController::class, 'dashboardCustomersObjectDetail'])->name('dashboard-customers-object-detail');
    Route::get('/customers-object-detail-edit', [DashboardController::class, 'dashboardCustomersObjectDetailEdit'])->name('dashboard-customers-object-detail-edit');
    Route::get('/customers-object-region', [DashboardController::class, 'dashboardCustomersObjectRegion'])->name('dashboard-customers-object-region');
    Route::get('/customers-object-region-edit', [DashboardController::class, 'dashboardCustomersObjectRegionEdit'])->name('dashboard-customers-object-region-edit');
    Route::get('/customers-object-products', [DashboardController::class, 'dashboardCustomersObjectProducts'])->name('dashboard-customers-object-products');
    Route::get('/customers-objects-role-list', [DashboardController::class, 'dashboardCustomersObjectsRoleList'])->name('dashboard-customers-objects-role-list');
    Route::get('/customers-role-detail', [DashboardController::class, 'dashboardCustomersRoleDetail'])->name('dashboard-customers-role-detail');
    Route::get('/customers-role-add', [DashboardController::class, 'dashboardCustomersRoleAdd'])->name('dashboard-customers-role-add');
    Route::get('/customers-role-edit', [DashboardController::class, 'dashboardCustomersRoleEdit'])->name('dashboard-customers-role-edit');
    Route::get('/customers-login-history', [DashboardController::class, 'dashboardCustomersLoginHistory'])->name('dashboard-customers-login-history');
    Route::get('/customers-object-tabs', [DashboardController::class, 'dashboardCustomersObjectTabs'])->name('dashboard-customers-object-tabs');
    Route::get('/users-tabs', [DashboardController::class, 'dashboardUsersTabs'])->name('dashboard-users-tabs');
    Route::get('/user-create-tabs', [DashboardController::class, 'dashboardUserCreateTabs'])->name('dashboard-user-create-tabs');
    Route::get('/user-profile-tabs', [DashboardController::class, 'dashboardUserProfileTabs'])->name('dashboard-user-profile-tabs');
    Route::get('/shopping-list', [DashboardController::class, 'dashboardShoppingList'])->name('dashboard-shopping-list');
    Route::get('/shopping-shop', [DashboardController::class, 'dashboardShoppingShop'])->name('dashboard-shopping-shop');

    Route::get('/store-categories', [DashboardController::class, 'dashboardStoreCategories'])->name('dashboard-store-categories');
    Route::get('/store-category-new', [DashboardController::class, 'dashboardStoreCategoryNew'])->name('dashboard-store-category-new');
    Route::get('/store-category-detail', [DashboardController::class, 'dashboardStoreCategoryDetail'])->name('dashboard-store-category-detail');
    Route::get('/store-category-edit', [DashboardController::class, 'dashboardStoreCategoryEdit'])->name('dashboard-store-category-edit');
    Route::get('/store-nomenclature', [DashboardController::class, 'dashboardStoreNomenclature'])->name('dashboard-store-nomenclature');
    Route::get('/store-nomenclature-detail', [DashboardController::class, 'dashboardStoreNomenclatureDetail'])->name('dashboard-store-nomenclature-detail');
    Route::get('/store-nomenclature-edit', [DashboardController::class, 'dashboardStoreNomenclatureEdit'])->name('dashboard-store-nomenclature-edit');
    Route::get('/store-nomenclature-add', [DashboardController::class, 'dashboardStoreNomenclatureAdd'])->name('dashboard-store-nomenclature-add');

    Route::get('/store-products-in-objects-list', [DashboardController::class, 'dashboardStoreProductsInObjectsList'])->name('dashboard-store-products-in-objects-list');
    Route::get('/store-lots-list', [DashboardController::class, 'dashboardStoreLotsList'])->name('dashboard-store-lots-list');
    Route::get('/store-products-in-objects-detail', [DashboardController::class, 'dashboardStoreProductsInObjectsDetail'])->name('dashboard-store-products-in-objects-detail');
    Route::get('/store-products-in-objects-edit', [DashboardController::class, 'dashboardStoreProductsInObjectsEdit'])->name('dashboard-store-products-in-objects-edit');
    Route::get('/settings-company-data-detail', [DashboardController::class, 'dashboardSettingsCompanyDataDetail'])->name('dashboard-settings-company-data-detail');
    Route::get('/settings-company-data-edit', [DashboardController::class, 'dashboardSettingsCompanyDataEdit'])->name('dashboard-settings-company-data-edit');
    Route::get('/settings-others-detail', [DashboardController::class, 'dashboardSettingsOthersDetail'])->name('dashboard-settings-others-detail');
    Route::get('/settings-others-edit', [DashboardController::class, 'dashboardSettingsOthersEdit'])->name('dashboard-settings-others-edit');
    Route::get('/settings-allergens-list', [DashboardController::class, 'dashboardSettingsAllergensList'])->name('dashboard-settings-allergens-list');
    Route::get('/settings-allergen-detail', [DashboardController::class, 'dashboardSettingsAllergenDetail'])->name('dashboard-settings-allergen-detail');
    Route::get('/settings-allergen-edit', [DashboardController::class, 'dashboardSettingsAllergenEdit'])->name('dashboard-settings-allergen-edit');
    Route::get('/settings-allergen-add', [DashboardController::class, 'dashboardSettingsAllergenAdd'])->name('dashboard-settings-allergen-add');
    Route::get('/settings-breeds-list', [DashboardController::class, 'dashboardSettingsBreedsList'])->name('dashboard-settings-breeds-list');
    Route::get('/settings-breed-detail', [DashboardController::class, 'dashboardSettingsBreedDetail'])->name('dashboard-settings-breed-detail');
    Route::get('/settings-breed-edit', [DashboardController::class, 'dashboardSettingsBreedEdit'])->name('dashboard-settings-breed-edit');
    Route::get('/settings-breed-add', [DashboardController::class, 'dashboardSettingsBreedAdd'])->name('dashboard-settings-breed-add');
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

    Route::get('/recipes-list', [DashboardController::class, 'dashboardRecipesList'])->name('dashboard-recipes-list');
    Route::get('/recipes-recipes-products', [DashboardController::class, 'dashboardRecipesRecipesProducts'])->name('dashboard-recipes-recipes-products');
    Route::get('/recipes-add-recipe', [DashboardController::class, 'dashboardRecipesAddRecipe'])->name('dashboard-recipes-add-recipe');
    Route::get('/recipes-parameter', [DashboardController::class, 'dashboardRecipesParameter'])->name('dashboard-recipes-parameter');
    Route::get('/recipes-calculated-list', [DashboardController::class, 'dashboardRecipesCalculatedList'])->name('dashboard-recipes-calculated-list');
    Route::get('/recipe-calculated', [DashboardController::class, 'dashboardRecipeCalculated'])->name('dashboard-recipe-calculated');
    Route::get('/invoice-1', [DashboardController::class, 'dashboardInvoice1'])->name('dashboard-invoice-1');
    Route::get('/mail-invoice', [DashboardController::class, 'dashboardMailInvoice'])->name('invoice-mail');
    Route::get('/mail-invoice-u', [DashboardController::class, 'dashboardMailInvoiceU'])->name('invoice-mail-u');
    Route::get('/mail-order-admin', [DashboardController::class, 'dashboardMailOrderAdmin'])->name('order-admin-mail');
    Route::get('/mail-order-admin-u', [DashboardController::class, 'dashboardMailOrderAdminU'])->name('order-admin-mail-u');
    Route::get('/mail-order-cancelled-admin', [DashboardController::class, 'dashboardMailOrderCancelledAdmin'])->name('order-cancelled-admin-mail');
    Route::get('/mail-order-cancelled-admin-u', [DashboardController::class, 'dashboardMailOrderCancelledAdminU'])->name('order-cancelled-admin-mail-u');
    Route::get('/mail-order-client', [DashboardController::class, 'dashboardMailOrderClient'])->name('order-client-mail');
    Route::get('/mail-order-client-u', [DashboardController::class, 'dashboardMailOrderClientU'])->name('order-client-mail-u');
    Route::get('/mail-question', [DashboardController::class, 'dashboardMailQuestion'])->name('question-mail');
    Route::get('/mail-question-u', [DashboardController::class, 'dashboardMailQuestionU'])->name('question-mail-u');

    //3.04 last added From Svetoslav
});

