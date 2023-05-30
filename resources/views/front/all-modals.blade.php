@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'All modals')
@section('content')
<div class="w-100 bg-white">
    <div class="container-fluid">
        <div class="row py-3r">
            <div class="col-12 container">
                <div class="row">
                    {{--
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfArchivePetProfileModal">Archive pet profile modal</button>
                        @include('panels.modals.archive-pet-profile-modal')
                    </div>
                    --}}
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfUserForgotPassword">Forgot your password</button>
                        @include('panels.modals.user-forgot-password-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfUserSignUp">Sign Up Modal</button>
                        @include('panels.modals.user-signup-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfUserAddNewAddress">Add new address</button>
                        @include('panels.modals.user-add-new-address-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfNotDeliveringArea">Sorry! We are still not delivering to this area!</button>
                        @include('panels.modals.not-delivering-area-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfCancelMenu">Cancel menu</button>
{{--                        @include('panels.modals.cancel-menu-modal')--}}
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfOrderSuccessfullyUpdated">Your order has been successfully updated!</button>
                        @include('panels.modals.order-successfully-updated-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfSuccessfullyAddedProductCart">Successfully added product to cart</button>
                        @include('panels.modals.successfully-added-product-cart-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfConsentDiseases">Consent diseases</button>
                        @include('panels.modals.consent-diseases-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfConsentUnusualBehavior">Consent unusual behavior</button>
                        @include('panels.modals.consent-unusual-behavior-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfExplanationUnusualBehaviour">Explanation unusual behaviour</button>
                        @include('panels.modals.explanation-unusual-behaviour-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfAddedMenuToFavourite">Added menu to favourite</button>
                        @include('panels.modals.added-menu-to-favourite-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfChooseDogOrAddress">Choose dog or address</button>
                        @include('panels.modals.choose-dog-or-address-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfSuccessfullyRemovedItemFromCart">Successfully removed item from cart</button>
                        @include('panels.modals.successfully-removed-item-from-cart-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfCancelOrderModal">Cancel order</button>
                        @include('panels.modals.cancel-order-modal')
                    </div>
                    <div class="col-12 my-1r">
                        <button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#dfMessageSuccessfullySent">Message successfully sent</button>
                        @include('panels.modals.message-successfully-sent-modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('panels.front-user.consent-biscuits')
</div>
@endsection
