@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers object detail edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all objects</span>
    </a>
    <h4>Object 1</h4>
  </div>
</div>
<div class="row">
    <ul class="nav user-profile-nav justify-content-center justify-content-md-start nav-pills border-bottom-0 mb-0" role="tablist">
        <li class="nav-item mb-0">
            <a class="nav-link d-flex px-1 active" id="feed-tab" data-toggle="tab" href="#feed" aria-controls="feed" role="tab" aria-selected="true"><i class="bx bx-home"></i><span class="d-none d-md-block">Feed</span></a>
        </li>
        <li class="nav-item mb-0">
            <a class="nav-link d-flex px-1" id="activity-tab" data-toggle="tab" href="#activity" aria-controls="activity" role="tab" aria-selected="false"><i class="bx bx-user"></i><span class="d-none d-md-block">Activity</span></a>
        </li>
        <li class="nav-item mb-0">
            <a class="nav-link d-flex px-1" id="friends-tab" data-toggle="tab" href="#friends" aria-controls="friends" role="tab" aria-selected="false"><i class="bx bx-message-alt"></i><span class="d-none d-md-block">Friends</span></a>
        </li>
        <li class="nav-item mb-0 mr-0">
            <a class="nav-link d-flex px-1" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false"><i class="bx bx-copy-alt"></i><span class="d-none d-md-block">Profile</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="feed" aria-labelledby="feed-tab" role="tabpanel">
            <!-- user profile nav tabs feed start -->
            <div class="row">
                <!-- user profile nav tabs feed left section start -->
                <div class="col-lg-4">
                    <!-- user profile nav tabs feed left section info card start -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Info
                                <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                            </h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center mb-25">
                                    <i class="bx bx-briefcase mr-50 cursor-pointer"></i><span>UX
                            Designer at<a href="JavaScript:void(0);">&nbsp;google</a></span>
                                </li>
                                <li class="d-flex align-items-center mb-25">
                                    <i class="bx bx-briefcase mr-50 cursor-pointer"></i> <span>Former
                            UI
                            Designer at<a href="JavaScript:void(0);">&nbsp;CBI</a></span>
                                </li>
                                <li class="d-flex align-items-center mb-25">
                                    <i class="bx bx-receipt mr-50 cursor-pointer"></i> <span>Studied
                            <a href="JavaScript:void(0);">&nbsp;IT science</a> at<a href="JavaScript:void(0);">&nbsp;Torronto</a></span>
                                </li>
                                <li class="d-flex align-items-center mb-25">
                                    <i class="bx bx-receipt mr-50 cursor-pointer"></i><span>Studied at
                            <a href="JavaScript:void(0);">&nbsp;College of new Jersey</a></span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-rss mr-50 cursor-pointer"></i> <span>Followed by<a href="JavaScript:void(0);">&nbsp;338 people</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed left section info card ends -->
                    <!-- user profile nav tabs feed left section trending card start -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">What's trending<i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i></h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-25">
                                    <i class="cursor-pointer bx bx-trending-up text-primary mr-50 mt-25"></i><span>
                            <a href="JavaScript:void(0);" class="mr-50">#ManJonas:</a>Frest comes with built-in
                          </span>
                                </li>
                                <li class="d-flex mb-25">
                                    <i class="cursor-pointer bx bx-trending-up text-primary mr-50 mt-25"></i><span>
                            <a href="JavaScript:void(0);" class="mr-50">LadyJonas:</a>dark layouts, select as</span>
                                </li>
                                <li class="d-flex mb-25">
                                    <i class="cursor-pointer bx bx-trending-up text-primary mr-50 mt-25"></i><span>
                            <a href="JavaScript:void(0);" class="mr-50">#Germany:</a>Frest comes with built-in
                          </span>
                                </li>
                                <li class="d-flex mb-25">
                                    <i class="cursor-pointer bx bx-trending-up text-primary mr-50 mt-25"></i><span>
                            <a href="JavaScript:void(0);" class="mr-50">#SundayNoon:</a>dark layouts, select as</span>
                                </li>
                                <li class="d-flex">
                                    <i class="cursor-pointer bx bx-trending-up text-primary mr-50 mt-25"></i><span>
                            <a href="JavaScript:void(0);" class="mr-50">NoWorries:</a>heme navigation with you</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed left section trending card ends -->
                    <!-- user profile nav tabs feed left section like page card start -->
                    <div class="card">
                        <div class="card-body">
                            <h6><img src="../../../app-assets/images/profile/pages/pixinvent.jpg" class="mr-25 round" alt="logo" height="28">
                                Pixinvent<span class="text-muted"> (Page)</span>
                                <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i></h6>
                            <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <span class="ml-50 text-muted text-bold-500">4.6 (142 reviews)</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-light-primary d-flex mr-50"><i class="cursor-pointer bx bx-like font-small-3 mb-25 mr-sm-25"></i><span class="d-none d-sm-block">Like</span></button>
                                <button class="btn btn-sm btn-light-primary d-flex"><i class="cursor-pointer bx bx-share-alt font-small-3 mb-25 mr-sm-25"></i><span class="d-none d-sm-block">Share</span></button>
                            </div>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed left section like page card ends -->
                    <!-- user profile nav tabs feed left section today's events card start -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Today's Events<i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                            </h5>
                            <div class="user-profile-event">
                                <div class="pb-1 d-flex align-items-center">
                                    <i class="cursor-pointer bx bx-radio-circle-marked text-primary mr-25"></i>
                                    <small>10:00am</small>
                                </div>
                                <h6 class="text-bold-500 font-small-3">Breakfast at the agency</h6>
                                <p class="text-muted font-small-2">Multi language support enable you to create your
                                    personalized apps in your language.</p>
                                <i class="cursor-pointer bx bx-map text-muted align-middle"></i>
                                <span class="text-muted"><small>Monkdev Agency</small></span>
                                <!-- user profile likes avatar start -->
                                <ul class="list-unstyled users-list d-flex align-items-center mt-1">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Lilian Nenez">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-21.jpg" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-22.jpg" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-23.jpg" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="pl-50 text-muted font-small-3">
                                        +10 more
                                    </li>
                                </ul>
                                <!-- user profile likes avatar ends -->
                            </div>
                            <hr>
                            <div class="user-profile-event">
                                <div class="pb-1 d-flex align-items-center">
                                    <i class="cursor-pointer bx bx-radio-circle-marked text-primary mr-25"></i>
                                    <small>10:00pm</small>
                                </div>
                                <h6 class="text-bold-500 font-small-3">Work eith persistance and you can achive it.</h6>
                            </div>
                            <hr>
                            <div class="user-profile-event">
                                <div class="pb-1 d-flex align-items-center">
                                    <i class="cursor-pointer bx bx-radio-circle-marked text-primary mr-25"></i>
                                    <small>6:00am</small>
                                </div>
                                <div class="pb-1">
                                    <h6 class="text-bold-500 font-small-3">Take that granted hotdog</h6>
                                    <i class="cursor-pointer bx bx-map text-muted align-middle"></i>
                                    <span class="text-muted"><small>Monkdev Agency</small></span>
                                </div>
                            </div>
                            <button class="btn btn-block btn-secondary">Check all your Events</button>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed left section today's events card ends -->
                </div>
                <!-- user profile nav tabs feed left section ends -->
                <!-- user profile nav tabs feed middle section start -->
                <div class="col-lg-8">
                    <!-- user profile nav tabs feed middle section post card start -->
                    <div class="card">
                        <div class="card-body">
                            <!-- user profile middle section blogpost nav tabs card start -->
                            <ul class="nav nav-pills justify-content-center justify-content-sm-start border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active d-flex" id="user-status-tab" data-toggle="tab" href="#user-status" aria-controls="user-status" role="tab" aria-selected="true"><i class="bx bx-detail align-text-top"></i>
                                        <span class="d-none d-md-block">Status</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="multimedia-tab" data-toggle="tab" href="#user-multimedia" aria-controls="user-multimedia" role="tab" aria-selected="false"><i class="bx bx-movie align-text-top"></i>
                                        <span class="d-none d-md-block">Multimedia</span>
                                    </a>
                                </li>
                                <li class="nav-item mr-0">
                                    <a class="nav-link d-flex" id="blog-tab" data-toggle="tab" href="#user-blog" aria-controls="user-blog" role="tab" aria-selected="false"><i class="bx bx-chat align-text-top"></i>
                                        <span class="d-none d-md-block">Blog Post</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content pl-0">
                                <div class="tab-pane active" id="user-status" aria-labelledby="user-status-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-1 col-2">
                                                    <div class="avatar">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="user image" width="32" height="32">
                                                        <span class="avatar-status-online"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-11 col-10">
                                                    <textarea class="form-control border-0 shadow-none" id="user-post-textarea" rows="3" placeholder="Share what you are thinking here..."></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-footer p-0">
                                                <i class="cursor-pointer bx bx-camera font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Upload a picture"></i>
                                                <i class="cursor-pointer bx bx-face font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Tag your friend"></i>
                                                <i class="cursor-pointer bx bx-map font-medium-5 text-muted pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Share your location"></i>
                                                <span class=" float-sm-right d-flex flex-sm-row flex-column justify-content-end">
                                  <button class="btn btn-light-primary mr-0 my-1 my-sm-0 mr-sm-1">Preview</button>
                                  <button class="btn btn-primary">Post Status</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="user-multimedia" aria-labelledby="multimedia-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-1 col-2">
                                                    <div class="avatar">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="user image" width="32" height="32">
                                                        <span class="avatar-status-online"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-11 col-10">
                                                    <textarea class="form-control border-0 shadow-none" id="user-postmulti-textarea" rows="3" placeholder="Share what you are thinking here..."></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-footer p-0">
                                                <i class="cursor-pointer bx bx-camera font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Upload a picture"></i>
                                                <i class="cursor-pointer bx bx-face font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Tag your friend"></i>
                                                <i class="cursor-pointer bx bx-map font-medium-5 text-muted pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Share your location"></i>
                                                <span class=" float-sm-right d-flex flex-sm-row flex-column justify-content-end">
                                  <button class="btn btn-light-primary mr-0 my-1 my-sm-0 mr-sm-1">Preview</button>
                                  <button class="btn btn-primary">Post Status</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="user-blog" aria-labelledby="blog-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-1 col-2">
                                                    <div class="avatar">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="user image" width="32" height="32">
                                                        <span class="avatar-status-online"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-11 col-10">
                                                    <textarea class="form-control border-0 shadow-none" id="user-postblog-textarea" rows="3" placeholder="Share what you are thinking here..."></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-footer p-0">
                                                <i class="cursor-pointer bx bx-camera font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Upload a picture"></i>
                                                <i class="cursor-pointer bx bx-face font-medium-5 text-muted mr-1 pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Tag your friend"></i>
                                                <i class="cursor-pointer bx bx-map font-medium-5 text-muted pt-50" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" data-original-title="Share your location"></i>
                                                <span class=" float-sm-right d-flex flex-sm-row flex-column justify-content-end">
                                  <button class="btn btn-light-primary mr-0 my-1 my-sm-0 mr-sm-1">Preview</button>
                                  <button class="btn btn-primary">Post Status</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user profile middle section blogpost nav tabs card ends -->
                        </div>
                    </div>
                    <!-- user profile nav tabs feed middle section post card ends -->
                    <!-- user profile nav tabs feed middle section user-1 card starts -->
                    <div class="card">
                        <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="user avatar" width="32" height="32">
                                <span class="avatar-status-online"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500">Martina Ash <span class="text-bold-400">shared a
                          </span><a href="JavaScript:void(0);">link</a></h6>
                                <p class="text-muted"><small>7 hours ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>Unlimited color options allows you to set your application color as per your branding 🤩.</p>
                            <div class="d-flex border rounded">
                                <div class="user-profile-images"><img src="../../../app-assets/images/banner/banner-29.jpg" alt="post" class="img-fluid user-profile-card-image">
                                </div>
                                <div class="p-1">
                                    <h5>Algolia Integration 😎</h5>
                                    <p class="user-profile-ellipsis">Algolia helps businesses across industries quickly create
                                        relevant, scalable, and lightning fast search and discovery experiences.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between pt-1">
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                                <p class="mb-0 ml-25">18</p>
                                <!-- user profile likes avatar start -->
                                <div class="d-none d-sm-block">
                                    <ul class="list-unstyled users-list m-0 d-flex align-items-center ml-1">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Lilian Nenez">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-21.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-22.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-23.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li class="d-inline-block pl-50">
                                            <p class="text-muted mb-0 font-small-3">+10 more</p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- user profile likes avatar ends -->
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                                <span class="ml-25">52</span>
                                <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                                <span class="ml-25">22</span>
                            </div>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed middle section user-1 card ends -->
                    <!-- user profile nav tabs feed middle section story swiper start -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0">Stories</h5>
                            <div class="user-profile-stories swiper-container pt-1 swiper-container-initialized swiper-container-horizontal">
                                <div class="swiper-wrapper user-profile-images" id="swiper-wrapper-14c8021e02310a4e6" aria-live="polite" style="transition: all 0ms ease 0s; transform: translate3d(-463.5px, 0px, 0px);">
                                    <div class="swiper-slide" role="group" aria-label="1 / 5" style="margin-right: 15px;">
                                        <img src="../../../app-assets/images/profile/portraits/avatar-portrait-1.jpg" class="rounded user-profile-stories-image" alt="story image">
                                        <div class="card-img-overlay bg-overlay">
                                            <div class="user-swiper-text">ureka_23</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="2 / 5" style="margin-right: 15px;">
                                        <img src="../../../app-assets/images/profile/portraits/avatar-portrait-2.jpg" class="rounded user-profile-stories-image" alt="story image">
                                        <div class="card-img-overlay bg-overlay">
                                            <div class="user-swiper-text">devine_lena</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="3 / 5" style="margin-right: 15px;">
                                        <img src="../../../app-assets/images/profile/portraits/avatar-portrait-3.jpg" class="rounded user-profile-stories-image" alt="story image">
                                        <div class="card-img-overlay bg-overlay">
                                            <div class="user-swiper-text">venice_like852</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-prev" role="group" aria-label="4 / 5" style="margin-right: 15px;">
                                        <img src="../../../app-assets/images/profile/portraits/avatar-portrait-4.jpg" class="rounded user-profile-stories-image" alt="story image">
                                        <div class="card-img-overlay bg-overlay">
                                            <div class="user-swiper-text">june5211</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="5 / 5" style="margin-right: 15px;">
                                        <img src="../../../app-assets/images/profile/portraits/avatar-portrait-5.jpg" class="rounded user-profile-stories-image" alt="story image">
                                        <div class="card-img-overlay bg-overlay">
                                            <div class="user-swiper-text">defloya_456</div>
                                        </div>
                                    </div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed middle section story swiper ends -->
                    <!-- user profile nav tabs feed middle section user-2 card starts -->
                    <div class="card">
                        <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avtar image" width="32" height="32">
                                <span class="avatar-status-offline"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500">Jonny Richie</h6>
                                <p class="text-muted"><small>2 hours ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>Beautifully crafted, clean &amp; modern designed admin✨ theme with 3 different demos &amp; light -
                                dark versions. Lifetime updates with new demos and features is guaranteed</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between pb-0">
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                                <p class="mb-0 ml-25">49</p>
                                <!-- user profile likes avatar start -->
                                <div class="d-none d-sm-block">
                                    <ul class="list-unstyled users-list m-0 d-flex align-items-center ml-1">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Lilian Nenez">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-24.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-26.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li class="d-inline-block pl-50">
                                            <p class="text-muted mb-0 font-small-3">+10 more</p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- user profile likes avatar ends -->
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                                <span class="ml-25">45</span>
                                <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                                <span class="ml-25">1</span>
                            </div>
                        </div>
                        <hr>
                        <!-- user profile comments start -->
                        <div class="card-header user-profile-header pt-0">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avtar image" width="32" height="32">
                                <span class="avatar-status-away"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500 font-small-3">Ananbella Queen</h6>
                                <p class="text-muted"><small>24 mins ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>Easy &amp; smart fuzzy search🕵🏻 functionality which enables users to search quickly.</p>
                        </div>
                        <div class="card-footer user-comment-footer pb-0">
                            <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4 align-middle"></i>
                            <span class="ml-25">30</span>
                            <span class="ml-1">reply</span>
                        </div>
                        <hr>
                        <div class="card-header user-profile-header pt-0">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-13.jpg" alt="avtar images" width="32" height="32">
                                <span class="avatar-status-busy"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500 font-small-3">Jackey Potter</h6>
                                <p class="text-muted"><small>1 hours ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>Unlimited color🖌 options allows you to set your application color as per your branding 🤪.</p>
                        </div>
                        <div class="card-footer user-comment-footer pb-0">
                            <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4 align-middle"></i>
                            <span class="ml-25">80</span>
                            <span class="ml-1">reply</span>
                        </div>
                        <hr>
                        <div class="form-group row align-items-center px-1">
                            <div class="col-2 col-sm-1">
                                <div class="avatar">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32" height="32">
                                    <span class="avatar-status-online"></span>
                                </div>
                            </div>
                            <div class="col-sm-11 col-10">
                                <textarea class="form-control" id="user-comment-textarea" rows="1" placeholder="comment.."></textarea>
                            </div>
                        </div>
                        <!-- user profile comments ends -->
                    </div>
                    <!-- user profile nav tabs feed middle section user-2 card ends -->
                    <!-- user profile nav tabs feed middle section user-3 card starts -->
                    <div class="card">
                        <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="avtar images" width="32" height="32">
                                <span class="avatar-status-online"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500">Anna Mull</h6>
                                <p class="text-muted"><small>7 hours ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>To avoid winding up with a large bundle, it’s good to get ahead of the problem and use "Code
                                Splitting 🕹".</p>
                            <img src="../../../app-assets/images/profile/post-media/2.jpg" alt="user image" class="img-fluid">
                        </div>
                        <div class="card-footer d-flex justify-content-between pt-1">
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                                <p class="mb-0 ml-25">77</p>
                                <!-- user profile likes avatar start -->
                                <div class="d-none d-sm-block">
                                    <ul class="list-unstyled users-list m-0 d-flex align-items-center ml-1">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Lilian Nenez">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="" class="avatar pull-up" data-original-title="Alberto Glotzbach">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-13.jpg" alt="Avatar" height="30" width="30">
                                        </li>
                                        <li class="d-inline-block pl-50">
                                            <p class="text-muted mb-0 font-small-3">+10 more</p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- user profile likes avatar ends -->
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                                <span class="ml-25">12</span>
                                <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                                <span class="ml-25">12</span>
                            </div>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed middle section user-3 card ends -->
                    <!-- user profile nav tabs feed middle section user-4 card starts -->
                    <div class="card">
                        <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-18.jpg" alt="avtar images" width="32" height="32">
                                <span class="avatar-status-online"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                                <h6 class="mb-0 text-bold-500">Petey Cruiser</h6>
                                <p class="text-muted"><small>21 hours ago</small></p>
                            </div>
                            <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                        </div>
                        <div class="card-body py-0">
                            <p>It's more efficient 🙌 to split each route's components into a separate chunk, and only load
                                them when the route is visited. Frest comes with built-in light and dark layouts, select as
                                per your preference.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between pt-1">
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                                <p class="mb-0 ml-25">0</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                                <span class="ml-25">0</span>
                                <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                                <span class="ml-25">2</span>
                            </div>
                        </div>
                    </div>
                    <!-- user profile nav tabs feed middle section user-4 card ends -->
                </div>
                <!-- user profile nav tabs feed middle section ends -->
            </div>
            <!-- user profile nav tabs feed ends -->
        </div>
        <div class="tab-pane" id="activity" aria-labelledby="activity-tab" role="tabpanel">
            <!-- user profile nav tabs activity start -->
            <div class="card">
                <div class="card-body">
                    <!-- timeline start -->
                    <ul class="timeline">
                        <li class="timeline-item timeline-icon-success active">
                            <div class="timeline-time">Tue 8:17pm</div>
                            <h6 class="timeline-title">Martina Ash</h6>
                            <p class="timeline-text">on <a href="JavaScript:void(0);">Received Gift</a></p>
                            <div class="timeline-content">
                                Welcome to video game and lame is very creative
                            </div>
                        </li>
                        <li class="timeline-item timeline-icon-primary active">
                            <div class="timeline-time">5 days ago</div>
                            <h6 class="timeline-title">Jonny Richie attached file</h6>
                            <p class="timeline-text">on <a href="JavaScript:void(0);">Project name</a></p>
                            <div class="timeline-content">
                                <img src="../../../app-assets/images/icon/sketch.png" alt="document" height="36" width="27" class="mr-50">Data Folder
                            </div>
                        </li>
                        <li class="timeline-item timeline-icon-danger active">
                            <div class="timeline-time">7 hours ago</div>
                            <h6 class="timeline-title">Mathew Slick docs</h6>
                            <p class="timeline-text">on <a href="JavaScript:void(0);">Project name</a></p>
                            <div class="timeline-content">
                                <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="36" width="27" class="mr-50">Received Pdf
                            </div>
                        </li>
                        <li class="timeline-item timeline-icon-info active">
                            <div class="timeline-time">5 hour ago</div>
                            <h6 class="timeline-title">Petey Cruiser send you a message</h6>
                            <p class="timeline-text">on <a href="JavaScript:void(0);">Redited message</a></p>
                            <div class="timeline-content">
                                Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it
                                is
                                pain, but because occasionally circumstances
                            </div>
                        </li>
                        <li class="timeline-item timeline-icon-warning">
                            <div class="timeline-time">2 min ago</div>
                            <h6 class="timeline-title">Anna mull liked </h6>
                            <p class="timeline-text">on <a href="JavaScript:void(0);">Liked</a></p>
                            <div class="timeline-content">
                                The Amairates
                            </div>
                        </li>
                    </ul>
                    <!-- timeline ends -->
                    <div class="text-center">
                        <button class="btn btn-primary">View All Activity</button>
                    </div>
                </div>
            </div>
            <!-- user profile nav tabs activity start -->
        </div>
        <div class="tab-pane" id="friends" aria-labelledby="friends-tab" role="tabpanel">
            <!-- user profile nav tabs friends start -->
            <div class="card">
                <div class="card-body">
                    <h5>Friends</h5>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <ul class="list-unstyled mb-0">
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Petey Cruiser</a></h6>
                                        <small class="text-muted">Flask</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-offline"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Anna Sthesia</a></h6>
                                        <small class="text-muted">Devloper</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Paul Molive</a></h6>
                                        <small class="text-muted">Designer</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Anna Mull</a></h6>
                                        <small class="text-muted">Worker</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-away"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Gail Forcewind</a></h6>
                                        <small class="text-muted">Lawyer</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-12">
                            <ul class="list-unstyled mb-0">
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-offline"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Paige Turner</a></h6>
                                        <small class="text-muted">Student</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Bob Frapples</a></h6>
                                        <small class="text-muted">Professor</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Mario super</a></h6>
                                        <small class="text-muted">Scientist</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Petey Cruiser</a></h6>
                                        <small class="text-muted">Flask</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-offline"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Anna Sthesia</a></h6>
                                        <small class="text-muted">Devloper</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="mt-2">Mutual Friends</h5>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <ul class="list-unstyled mb-0">
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-26.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">jackeu decoy</a></h6>
                                        <small class="text-muted">Network</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-offline"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Sthesia Anna</a></h6>
                                        <small class="text-muted">Devloper</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-24.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Molive Paul</a></h6>
                                        <small class="text-muted">Designer</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-12">
                            <ul class="list-unstyled mb-0">
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-23.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Mull Anna</a></h6>
                                        <small class="text-muted">Worker</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-22.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-away"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Forcewind Gail</a></h6>
                                        <small class="text-muted">Lawyer</small>
                                    </div>
                                </li>
                                <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                        <div class="avatar mr-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-21.jpg" alt="avtar images" width="32" height="32">
                                            <span class="avatar-status-offline"></span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading mb-0"><a href="javaScript:void(0);">Paige Turner</a></h6>
                                        <small class="text-muted">Student</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile nav tabs friends ends -->
        </div>
        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
            <!-- user profile nav tabs profile start -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="rounded" alt="group image" height="120" width="120">
                                </div>
                                <div class="col-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-12 text-center text-sm-left">
                                            <h6 class="media-heading mb-0">valintini_007<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h6>
                                            <small class="text-muted align-top">Martina Ash</small>
                                        </div>
                                        <div class="col-12 text-center text-sm-left">
                                            <div class="mb-1">
                                                <span class="mr-1">122 <small>Posts</small></span>
                                                <span class="mr-1">4.7k <small>Followers</small></span>
                                                <span class="mr-1">652 <small>Following</small></span>
                                            </div>
                                            <p>Algolia helps businesses across industries quickly create relevant😎, scalable😀, and
                                                lightning😍
                                                fast search and discovery experiences.</p>
                                            <div>
                                                <div class="badge badge-light-primary badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="with 7% growth @valintini_007 is on top 5k"><i class="cursor-pointer bx bx-check-shield"></i>
                                                </div>
                                                <div class="badge badge-light-warning badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="last 55% growth @valintini_007 is on weedday"><i class="cursor-pointer bx bx-badge-check"></i>
                                                </div>
                                                <div class="badge badge-light-success badge-round mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="got premium profile here"><i class="cursor-pointer bx bx-award"></i>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                            </button>
                                            <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Basic details</h5>
                    <ul class="list-unstyled">
                        <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>California</li>
                        <li><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>(+56) 454 45654 </li>
                        <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>July 10</li>
                        <li><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>Jonnybravo@gmail.com</li>
                    </ul>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Cell Phone</small></h6>
                            <p>(+46) 456 54432</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Family Phone</small></h6>
                            <p>(+46) 454 22432</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Reporter</small></h6>
                            <p>John Doe</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Manager</small></h6>
                            <p>Richie Rich</p>
                        </div>
                        <div class="col-12">
                            <h6><small class="text-muted">Bio</small></h6>
                            <p>Built-in customizer enables users to change their admin panel look &amp; feel based on their
                                preferences Beautifully crafted, clean &amp; modern designed admin theme with 3 different demos &amp;
                                light - dark versions.</p>
                        </div>
                    </div>
                    <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                    </button>
                    <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                </div>
            </div>
            <!-- user profile nav tabs profile ends -->
        </div>
    </div>
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-detail"></i> Details</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Areas</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Products</a>
  </div>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Name *</label>
              <input type="text" class="form-control" id="id" name="name" value="Кухня 1">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Number of menus for day *</label>
              <input type="text" class="form-control" id="id" name="name" value="111">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Prefix *</label>
              <select class="form-control" id="id">
                <option selected>01</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">City *</label>
              <select class="form-control" id="id">
                <option selected>Brentwood</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="id">Description</label>
              <textarea class="form-control" id="id" rows="6"></textarea>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
            <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Created:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        14/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Created by:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Administrator
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Edited:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        22/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Edited by:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Ivan Ivanov
      </div>
    </div>
  </div>
</div>
@endsection
