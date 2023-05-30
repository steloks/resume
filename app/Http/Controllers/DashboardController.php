<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //ecommerce
    public function dashboardEcommerce()
    {
        return view('admin.dashboard-ecommerce');
    }

    // analystic
    public function dashboardAnalytics()
    {
        return view('admin.dashboard-analytics');
    }

    // Index
    public function dashboardIndex()
    {
        $orderNotifications = Notification::query()
            ->where('type', 'order')
            ->orWhere('type', 'order_menu')
            ->with(['order', 'orderMenu'])
            ->orderBy('id', 'DESC')
            ->get();
        $petNotifications = Notification::query()->where('type', 'pet')->with([
            'pet',
            'pet.history' => function ($q) {
                $q->where('key', 'weight_lvl');
            },
        ])->orderBy('id', 'DESC')->get();

        return view('admin.dashboard-index')->with(['orderNotifications' => $orderNotifications, 'petNotifications' => $petNotifications]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkNotification(Request $request): \Illuminate\Http\JsonResponse
    {
        Notification::query()->firstWhere('id', $request->get('id'))->update(['checked' => 1]);

        return response()->json(['success' => true]);
    }

    // Cookhouse Preparation
    public function dashboardCookhousePreparation()
    {
        return view('admin.dashboard-cookhouse-preparation');
    }

    // Cookhouse Prepare Orders 1
    public function dashboardCookhousePrepareOrders1()
    {
        return view('admin.dashboard-cookhouse-prepare-orders-1');
    }

    // Cookhouse Prepare Orders 2
    public function dashboardCookhousePrepareOrders2()
    {
        return view('admin.dashboard-cookhouse-prepare-orders-2');
    }

    // Cookhouse Order
    public function dashboardCookhouseOrder()
    {
        return view('admin.dashboard-cookhouse-order');
    }

    // Cookhouse Supply
    public function dashboardCookhouseSupply()
    {
        return view('admin.dashboard-cookhouse-supply');
    }

    // Clients List
    public function dashboardClientsList()
    {
        return view('admin.dashboard-clients-list');
    }

    // Client tabs
    public function dashboardClientTabs()
    {
        return view('admin.dashboard-client-tabs');
    }

    // Client - personal data
    public function dashboardClientPersonalData()
    {
        return view('admin.dashboard-client-personal-data');
    }

    // Client - personal data edit
    public function dashboardClientPersonalDataEdit()
    {
        return view('admin.dashboard-client-personal-data-edit');
    }

    // Client - addresses
    public function dashboardClientAddresses()
    {
        return view('admin.dashboard-client-addresses');
    }

    // Client - address edit
    public function dashboardClientAddressEdit()
    {
        return view('admin.dashboard-client-address-edit');
    }

    // Client - orders
    public function dashboardClientOrders()
    {
        return view('admin.dashboard-client-orders');
    }

    // Client - pets
    public function dashboardClientPets()
    {
        return view('admin.dashboard-client-pets');
    }

    // Client - menus favorites
    public function dashboardClientMenusFavourites()
    {
        return view('admin.dashboard-client-menus-favourites');
    }

    // Client - comments
    public function dashboardClientComments()
    {
        return view('admin.dashboard-client-comments');
    }

    // Client - dogs profiles
    public function dashboardClientDogsProfiles()
    {
        return view('admin.dashboard-client-dogs-profiles');
    }

    // Client - dog profile
    public function dashboardClientDogProfile()
    {
        return view('admin.dashboard-client-dog-profile');
    }

    // Clients orders
    public function dashboardClientsOrders()
    {
        return view('admin.dashboard-clients-orders');
    }

    // Clients order detail
    public function dashboardClientsOrderDetail()
    {
        return view('admin.dashboard-clients-order-detail');
    }

    // Clients order edit
    public function dashboardClientsOrderEdit()
    {
        return view('admin.dashboard-clients-order-edit');
    }

    // Clients favourite menu
    public function dashboardClientsFavouriteMenu()
    {
        return view('admin.dashboard-clients-favourite-menu');
    }

    // Clients invoice list
    public function dashboardClientsInvoiceList()
    {
        return view('admin.dashboard-clients-invoice-list');
    }

    // Clients invoice detail
    public function dashboardClientsInvoiceDetail()
    {
        return view('admin.dashboard-clients-invoice-detail');
    }

    // Clients orders from menu
    public function dashboardClientsOrdersFromMenu1()
    {
        return view('admin.dashboard-clients-orders-from-menu-1');
    }

    // Clients orders from menu
    public function dashboardClientsOrdersFromMenu2()
    {
        return view('admin.dashboard-clients-orders-from-menu-2');
    }

    // Clients orders from menu
    public function dashboardClientsOrdersFromMenu3()
    {
        return view('admin.dashboard-clients-orders-from-menu-3');
    }

    // Clients courier list
    public function dashboardClientsCourierList()
    {
        return view('admin.dashboard-clients-courier-list');
    }

    // Customers list
    public function dashboardCustomersList()
    {
        return view('admin.dashboard-customers-list');
    }

    // Customer data
    public function dashboardCustomerData()
    {
        return view('admin.dashboard-customer-data');
    }

    // Customer data edit
    public function dashboardCustomerDataEdit()
    {
        return view('admin.dashboard-customer-data-edit');
    }

    // Customer change password
    public function dashboardCustomerChangePassword()
    {
        return view('admin.dashboard-customer-change-password');
    }

    // Customer objects detail
    public function dashboardCustomerObjectsDetail()
    {
        return view('admin.dashboard-customer-objects-detail');
    }

    // Customer objects edit
    public function dashboardCustomerObjectsEdit()
    {
        return view('admin.dashboard-customer-objects-edit');
    }

    // Customer kind detail
    public function dashboardCustomerKindDetail()
    {
        return view('admin.dashboard-customer-kind-detail');
    }

    // Customer kind edit
    public function dashboardCustomerKindEdit()
    {
        return view('admin.dashboard-customer-kind-edit');
    }

    // Customer permissions detail
    public function dashboardCustomerPermissionsDetail()
    {
        return view('admin.dashboard-customer-permissions-detail');
    }

    // Customer create
    public function dashboardCustomerCreate()
    {
        return view('admin.dashboard-customer-create');
    }

    // Customer create objects
    public function dashboardCustomerCreateObjects()
    {
        return view('admin.dashboard-customer-create-objects');
    }

    // Customer create kind
    public function dashboardCustomerCreateKind()
    {
        return view('admin.dashboard-customer-create-kind');
    }

    // Customers permissions list
    public function dashboardCustomersPermissionsList()
    {
        return view('admin.dashboard-customers-permissions-list');
    }

    // Customers permission detail
    public function dashboardCustomersPermissionDetail()
    {
        return view('admin.dashboard-customers-permission-detail');
    }

    // Customers permission edit
    public function dashboardCustomersPermissionEdit()
    {
        return view('admin.dashboard-customers-permission-edit');
    }

    // Customers permissions global detail
    public function dashboardCustomersPermissionsGlobalDetail()
    {
        return view('admin.dashboard-customers-permissions-global-detail');
    }

    // Customers permissions module detail
    public function dashboardCustomersPermissionsModuleDetail()
    {
        return view('admin.dashboard-customers-permissions-module-detail');
    }

    // Customers permissions add 1
    public function dashboardCustomersPermissionsAdd1()
    {
        return view('admin.dashboard-customers-permissions-add-1');
    }

    // Customers permissions add 2
    public function dashboardCustomersPermissionsAdd2()
    {
        return view('admin.dashboard-customers-permissions-add-2');
    }

    // Customers objects list
    public function dashboardCustomersObjectsList()
    {
        return view('admin.dashboard-customers-objects-list');
    }

    // Customers object add
    public function dashboardCustomersObjectAdd()
    {
        return view('admin.dashboard-customers-object-add');
    }

    // Customers object detail
    public function dashboardCustomersObjectDetail()
    {
        return view('admin.dashboard-customers-object-detail');
    }

    // Customers object edit
    public function dashboardCustomersObjectDetailEdit()
    {
        return view('admin.dashboard-customers-object-detail-edit');
    }

    // Customers object region
    public function dashboardCustomersObjectRegion()
    {
        return view('admin.dashboard-customers-object-region');
    }

    // Customers object region edit
    public function dashboardCustomersObjectRegionEdit()
    {
        return view('admin.dashboard-customers-object-region-edit');
    }

    // Customers object products
    public function dashboardCustomersObjectProducts()
    {
        return view('admin.dashboard-customers-object-products');
    }

    // Customers objects role list
    public function dashboardCustomersObjectsRoleList()
    {
        return view('admin.dashboard-customers-objects-role-list');
    }

    // Customers role detail
    public function dashboardCustomersRoleDetail()
    {
        return view('admin.dashboard-customers-role-detail');
    }

    // Customers role edit
    public function dashboardCustomersRoleEdit()
    {
        return view('admin.dashboard-customers-role-edit');
    }

    // Customers role add
    public function dashboardCustomersRoleAdd()
    {
        return view('admin.dashboard-customers-role-add');
    }

    // Customers login history
    public function dashboardCustomersLoginHistory()
    {
        return view('admin.dashboard-customers-login-history');
    }

    // Customers object tabs
    public function dashboardCustomersObjectTabs()
    {
        return view('admin.dashboard-customers-object-tabs');
    }

    // Users tabs
    public function dashboardUsersTabs()
    {
        return view('admin.dashboard-users-tabs');
    }

    // User create tabs
    public function dashboardUserCreateTabs()
    {
        return view('admin.dashboard-user-create-tabs');
    }

    // User profile tabs
    public function dashboardUserProfileTabs()
    {
        return view('admin.dashboard-user-profile-tabs');
    }

    // Shopping list
    public function dashboardShoppingList()
    {
        return view('admin.dashboard-shopping-list');
    }

    // Shopping shop
    public function dashboardShoppingShop()
    {
        return view('admin.dashboard-shopping-shop');
    }

    // Orders List
    public function dashboardOrdersList()
    {
        return view('admin.dashboard-orders-list');
    }

    // Store - categories
    public function dashboardStoreCategories()
    {
        return view('admin.dashboard-store-categories');
    }

    // Store - category new
    public function dashboardStoreCategoryNew()
    {
        return view('admin.dashboard-store-category-new');
    }

    // Store - category detail
    public function dashboardStoreCategoryDetail()
    {
        return view('admin.dashboard-store-category-detail');
    }

    // Store - category edit
    public function dashboardStoreCategoryEdit()
    {
        return view('admin.dashboard-store-category-edit');
    }

    // Store - nomenclature
    public function dashboardStoreNomenclature()
    {
        return view('admin.dashboard-store-nomenclature');
    }

    // Store - nomenclature detail
    public function dashboardStoreNomenclatureDetail()
    {
        return view('admin.dashboard-store-nomenclature-detail');
    }

    // Store - nomenclature edit
    public function dashboardStoreNomenclatureEdit()
    {
        return view('admin.dashboard-store-nomenclature-edit');
    }

    // Store - nomenclature add
    public function dashboardStoreNomenclatureAdd()
    {
        return view('admin.dashboard-store-nomenclature-add');
    }

    // Store - products in objects list
    public function dashboardStoreProductsInObjectsList()
    {
        return view('admin.dashboard-store-products-in-objects-list');
    }

    // Store - products in objects detail
    public function dashboardStoreProductsInObjectsDetail()
    {
        return view('admin.dashboard-store-products-in-objects-detail');
    }

    // Store - products in objects edit
    public function dashboardStoreProductsInObjectsEdit()
    {
        return view('admin.dashboard-store-products-in-objects-edit');
    }

    // Store - lots list
    public function dashboardStoreLotsList()
    {
        return view('admin.dashboard-store-lots-list');
    }

    // Regions - cities
    public function dashboardRegionsCities()
    {
        return view('admin.dashboard-regions-cities');
    }

    // Settings company data detail
    public function dashboardSettingsCompanyDataDetail()
    {
        return view('admin.dashboard-settings-company-data-detail');
    }

    // Settings company data edit
    public function dashboardSettingsCompanyDataEdit()
    {
        return view('admin.dashboard-settings-company-data-edit');
    }

    // Settings others detail
    public function dashboardSettingsOthersDetail()
    {
        return view('admin.dashboard-settings-others-detail');
    }

    // Settings others edit
    public function dashboardSettingsOthersEdit()
    {
        return view('admin.dashboard-settings-others-edit');
    }

    // Settings allergens list
    public function dashboardSettingsAllergensList()
    {
        return view('admin.dashboard-settings-allergens-list');
    }

    // Settings allergen detail
    public function dashboardSettingsAllergenDetail()
    {
        return view('admin.dashboard-settings-allergen-detail');
    }

    // Settings allergen edit
    public function dashboardSettingsAllergenEdit()
    {
        return view('admin.dashboard-settings-allergen-edit');
    }

    // Settings allergen add
    public function dashboardSettingsAllergenAdd()
    {
        return view('admin.dashboard-settings-allergen-add');
    }

    // Settings breeds list
    public function dashboardSettingsBreedsList()
    {
        return view('admin.dashboard-settings-breeds-list');
    }

    // Settings breed detail
    public function dashboardSettingsBreedDetail()
    {
        return view('admin.dashboard-settings-breed-detail');
    }

    // Settings breed edit
    public function dashboardSettingsBreedEdit()
    {
        return view('admin.dashboard-settings-breed-edit');
    }

    // Settings breed add
    public function dashboardSettingsBreedAdd()
    {
        return view('admin.dashboard-settings-breed-add');
    }

    // Recipes list
    public function dashboardRecipesList()
    {
        return view('admin.dashboard-recipes-list');
    }

    // Recipes recipes products
    public function dashboardRecipesRecipesProducts()
    {
        return view('admin.dashboard-recipes-recipes-products');
    }

    // Recipes add recipe
    public function dashboardRecipesAddRecipe()
    {
        return view('admin.dashboard-recipes-add-recipe');
    }

    // Recipes parameter
    public function dashboardRecipesParameter()
    {
        return view('admin.dashboard-recipes-parameter');
    }

    // Recipes calculated list
    public function dashboardRecipesCalculatedList()
    {
        return view('admin.dashboard-recipes-calculated-list');
    }

    // Recipe calculated
    public function dashboardRecipeCalculated()
    {
        return view('admin.dashboard-recipe-calculated');
    }

    // Regions - cities detail
    public function dashboardRegionsCitiesDetail()
    {
        return view('admin.dashboard-regions-cities-detail');
    }

    // Regions - cities edit
    public function dashboardRegionsCitiesEdit()
    {
        return view('admin.dashboard-regions-cities-edit');
    }

    // Regions - cities add
    public function dashboardRegionsCitiesAdd()
    {
        return view('admin.dashboard-regions-cities-add');
    }

    // Regions
    public function dashboardRegions()
    {
        return view('admin.dashboard-regions');
    }

    // Regions - detail
    public function dashboardRegionsDetail()
    {
        return view('admin.dashboard-regions-detail');
    }

    // Regions - edit
    public function dashboardRegionsEdit()
    {
        return view('admin.dashboard-regions-edit');
    }

    // Regions - add
    public function dashboardRegionsAdd()
    {
        return view('admin.dashboard-regions-add');
    }

    // Regions - pc addresses
    public function dashboardRegionsPcAddresses()
    {
        return view('admin.dashboard-regions-pc-addresses');
    }

    // Regions - pc addresses detail
    public function dashboardRegionsPcAddressesDetail()
    {
        return view('admin.dashboard-regions-pc-addresses-detail');
    }

    // Regions - pc addresses edit
    public function dashboardRegionsPcAddressesEdit()
    {
        return view('admin.dashboard-regions-pc-addresses-edit');
    }

    // Regions - pc addresses add
    public function dashboardRegionsPcAddressesAdd()
    {
        return view('admin.dashboard-regions-pc-addresses-add');
    }

    // Regions - time slots
    public function dashboardRegionsTimeSlots()
    {
        return view('admin.dashboard-regions-time-slots');
    }

    // Regions - time slots detail
    public function dashboardRegionsTimeSlotsDetail()
    {
        return view('admin.dashboard-regions-time-slots-detail');
    }

    // Regions - time slots edit
    public function dashboardRegionsTimeSlotsEdit()
    {
        return view('admin.dashboard-regions-time-slots-edit');
    }

    // Regions - time slots add
    public function dashboardRegionsTimeSlotsAdd()
    {
        return view('admin.dashboard-regions-time-slots-add');
    }

    // Regions - price delivery list
    public function dashboardRegionsPriceDeliveryList()
    {
        return view('admin.dashboard-regions-price-delivery-list');
    }

    // Regions - price delivery detail
    public function dashboardRegionsPriceDeliveryDetail()
    {
        return view('admin.dashboard-regions-price-delivery-detail');
    }

    // Regions - price delivery edit
    public function dashboardRegionsPriceDeliveryEdit()
    {
        return view('admin.dashboard-regions-price-delivery-edit');
    }

    // Regions - price delivery add
    public function dashboardRegionsPriceDeliveryAdd()
    {
        return view('admin.dashboard-regions-price-delivery-add');
    }

    // Invoice 1
    public function dashboardInvoice1()
    {
        return view('admin.invoice.dashboard-invoice-1');
    }

    // Mail Invoice
    public function dashboardMailInvoice()
    {
        return view('admin.mails.invoice-mail');
    }

    // Mail Order Admin
    public function dashboardMailOrderAdmin()
    {
        return view('admin.mails.order-admin-mail');
    }

    // Mail Order Client
    public function dashboardMailOrderClient()
    {
        return view('admin.mails.order-client-mail');
    }

    // Mail Question
    public function dashboardMailQuestion()
    {
        return view('admin.mails.question-mail');
    }

    // Clients invoice pdf
    public function dashboardClientsInvoicePdf()
    {
        return view('admin.dashboard-invoice-1');
    }

    // Mail Order Admin
    public function dashboardMailOrderCancelledAdmin()
    {
        return view('admin.mails.order-cancelled-admin-mail');
    }

    public function dashboardMailOrderAdminU()
    {
        return view('admin.mails.order-admin-mail-u');
    }

    public function dashboardMailOrderCancelledAdminU()
    {
        return view('admin.mails.order-cancelled-admin-mail-u');
    }

    public function dashboardMailOrderClientU()
    {
        return view('admin.mails.order-client-mail-u');
    }

    public function dashboardMailQuestionU()
    {
        return view('admin.mails.question-mail-u');
    }
}
