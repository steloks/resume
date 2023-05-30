<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    // Home page
    public function homePage(Request $request)
    {
        return view('home');
    }

    // Home page
    public function frontHomePage(Request $request)
    {
        return view('front.home-page');
    }

    // Contact page
    public function contactPage(Request $request)
    {
        return view('front.contact');
    }

    // Blog page
    public function blogPage(Request $request)
    {
        return view('front.blog');
    }

    // News article page
    public function newsArticlePage(Request $request)
    {
        return view('front.news-article');
    }

    // Our philosophy page
    public function frontOurPhilosophy(Request $request)
    {
        return view('front.our-philosophy');
    }

    // Our beliefs page
    public function frontOurBeliefs(Request $request)
    {
        return view('front.our-beliefs');
    }

    // Our menus page
    public function frontOurMenus(Request $request)
    {
        return view('front.our-menus');
    }

    // User profile details
    public function userPagePetProfile(Request $request)
    {
        return view('front.user-pet-profile');
    }

    // User profile addresses
    public function userPageProfileAddresses(Request $request)
    {
        return view('front.user-profile-addresses');
    }

    // User profile no addresses
    public function userPageProfileNoAddresses(Request $request)
    {
        return view('front.user-profile-no-addresses');
    }

    // User profile my orders history
    public function userPageProfileMyOrdersHistory(Request $request)
    {
        return view('front.user-profile-my-orders-history');
    }

    // User profile my order history
    public function userPageProfileMyOrderHistory(Request $request)
    {
        return view('front.user-profile-my-order-history');
    }

    // User pet profile page
    public function userPageProfileDetails(Request $request)
    {
        return view('front.user-profile-details');
    }

    // User pet profile diary page
    public function userPagePetProfileDiary(Request $request)
    {
        return view('front.user-pet-profile-diary');
    }

    // User pet profiles listing
    public function userPagePetProfilesListing(Request $request)
    {
        return view('front.user-pet-profiles-listing');
    }

    // User pet profile create 1 page
    public function userPagePetProfileCreate1(Request $request)
    {
        return view('front.user-pet-profile-create-1');
    }

    // User pet profile create 2 page
    public function userPagePetProfileCreate2(Request $request)
    {
        return view('front.user-pet-profile-create-2');
    }

    // User pet profile create 3 page
    public function userPagePetProfileCreate3(Request $request)
    {
        return view('front.user-pet-profile-create-3');
    }

    // User pet profile edit 1 page
    public function userPagePetProfileEdit1(Request $request)
    {
        return view('front.user-pet-profile-edit-1');
    }

    // User pet profile edit 2 page
    public function userPagePetProfileEdit2(Request $request)
    {
        return view('front.user-pet-profile-edit-2');
    }

    // User pet profile edit 3 page
    public function userPagePetProfileEdit3(Request $request)
    {
        return view('front.user-pet-profile-edit-3');
    }

    // User pet profile no pets
    public function userPagePetProfileNoPets(Request $request)
    {
        return view('front.user-pet-profile-no-pets');
    }

    // User order steps page
    public function userOrderSteps(Request $request)
    {
        return view('front.user-order-steps');
    }

    // User order step 1 page
    public function userOrderStep1(Request $request)
    {
        return view('front.user-order-step-1');
    }

    // User order step 2 menu page
    public function userOrderStep2Menu(Request $request)
    {
        return view('front.user-order-step-2-menu');
    }

    // User order step 2 cart page
    public function userOrderStep2Cart(Request $request)
    {
        return view('front.user-order-step-2-cart');
    }

    // User order step 3 page
    public function userOrderStep3(Request $request)
    {
        return view('front.user-order-step-3');
    }

    // User order success page
    public function userOrderSuccess(Request $request)
    {
        return view('front.user-order-success');
    }

    // User user favourites
    public function userFavourites(Request $request)
    {
        return view('front.user-favourites');
    }

    // All modals
    public function allModals(Request $request)
    {
        return view('front.all-modals');
    }

    // Admin modals
    public function adminModals(Request $request)
    {
        return view('admin.admin-modals');
    }

    public function userOrderHasNotBeenProcessed(Request $request)
    {
        return view('front.user-order-has-not-been-processed');
    }
}

