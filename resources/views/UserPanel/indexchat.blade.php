{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Index Chat</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="chat-leftsidebar minimal-border">
            <div class="px-4 pt-4 mb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="mb-4">Chats</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom"
                            aria-label="Add Contact" data-bs-original-title="Add Contact">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-soft-success btn-sm material-shadow-none">
                                <i class="ri-add-line align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                    <i class="ri-search-2-line search-icon"></i>
                </div>
            </div> <!-- .p-4 -->

            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#chats" role="tab" aria-selected="true">
                        Chats
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#contacts" role="tab" aria-selected="false"
                        tabindex="-1">
                        Groups
                    </a>
                </li>
            </ul>

            <div class="tab-content text-muted">
                <div class="tab-pane active show" id="chats" role="tabpanel">
                    <div class="chat-room-list pt-3 simplebar-scrollable-y" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -16px 0px 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 16px 0px 0px;">
                                            <div class="d-flex align-items-center px-4 mb-2">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages
                                                    </h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="bottom" aria-label="New Message"
                                                        data-bs-original-title="New Message">

                                                        <!-- Button trigger modal -->
                                                        <button type="button"
                                                            class="btn btn-soft-success btn-sm shadow-none material-shadow">
                                                            <i class="ri-add-line align-bottom"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chat-message-list">

                                                <ul class="list-unstyled chat-list chat-user-list" id="userList">

                                                    <li id="contact-id-1" data-name="direct-message" class="active"> <a
                                                            href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-2.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Lisa Parker</p>
                                                                </div>
                                                            </div>
                                                        </a> </li>
                                                    <li id="contact-id-2" data-name="direct-message" class=""> <a
                                                            href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-3.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Frank Thomas</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">8</span>
                                                                </div>
                                                            </div>
                                                        </a> </li>
                                                    <li id="contact-id-3" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            CT</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Clifford Taylor</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-4" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-4.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Janette Caster</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-5" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-5.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Sarah Beattie</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-6" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-6.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Nellie Cornett</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">2</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-7" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            CK</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Chris Kiernan</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-8" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            EE</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Edith Evans</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-9" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-7.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Joseph Siegel</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 300px; height: 650px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 581px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="contacts" role="tabpanel">
                    <div class="chat-room-list pt-3 simplebar-scrollable-y" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -16px 0px 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 16px 0px 0px;">
                                            <div class="d-flex align-items-center px-4 mb-2">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages
                                                    </h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="bottom" aria-label="New Message"
                                                        data-bs-original-title="New Message">

                                                        <!-- Button trigger modal -->
                                                        <button type="button"
                                                            class="btn btn-soft-success btn-sm shadow-none material-shadow">
                                                            <i class="ri-add-line align-bottom"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chat-message-list">

                                                <ul class="list-unstyled chat-list chat-user-list" id="userList">

                                                    <li id="contact-id-1" data-name="direct-message" class="active">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-2.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Lisa Parker</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-2" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-3.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Frank Thomas</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">8</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-3" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            CT</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Clifford Taylor</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-4" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-4.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Janette Caster</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-5" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-5.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Sarah Beattie</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-6" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);" class="unread-msg-user">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-6.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Nellie Cornett</p>
                                                                </div>
                                                                <div class="ms-auto"><span
                                                                        class="badge bg-dark-subtle text-body rounded p-1">2</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-7" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            CK</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Chris Kiernan</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-8" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary text-white fs-10">
                                                                            EE</div><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Edith Evans</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li id="contact-id-9" data-name="direct-message" class="">
                                                        <a href="javascript: void(0);">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="flex-shrink-0 chat-user-img away align-self-center me-2 ms-0">
                                                                    <div class="avatar-xxs"> <img
                                                                            src="assets/images/users/avatar-7.jpg"
                                                                            class="rounded-circle img-fluid userprofile"
                                                                            alt=""><span class="user-status"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-truncate mb-0">Joseph Siegel</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 300px; height: 650px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 581px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab contact -->
        </div>
        <!-- end chat leftsidebar -->
        <!-- Start User chat -->
        <div class="user-chat w-100 overflow-hidden minimal-border">

            <div class="chat-content d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">
                    <!-- conversation user -->
                    <div class="position-relative">


                        <div class="position-relative" id="users-chat" style="display: block;">
                            <div class="p-3 user-chat-topbar">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i
                                                        class="ri-arrow-left-s-line align-bottom"></i></a>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                        <img src="assets/images/users/avatar-2.jpg"
                                                            class="rounded-circle avatar-xs" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate mb-0 fs-16"><a
                                                                class="text-reset username" data-bs-toggle="offcanvas"
                                                                href="#userProfileCanvasExample"
                                                                aria-controls="userProfileCanvasExample">Lisa
                                                                Parker</a>
                                                        </h5>
                                                        <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                            <small>Online</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-4">
                                        <ul class="list-inline user-chat-nav text-end mb-0">
                                            {{-- <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-ghost-secondary btn-icon material-shadow-none"
                                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-search icon-sm">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                        <div class="p-2">
                                                            <div class="search-box">
                                                                <input type="text"
                                                                    class="form-control bg-light border-light"
                                                                    placeholder="Search here..."
                                                                    onkeyup="searchMessages()" id="searchMessage">
                                                                <i class="ri-search-2-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> --}}

                                            <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                                    <button class="btn btn-outline-success btn-border"
                                                        id="resolvebtn">Resolve</button>
                                                    <button class="btn btn-outline-success btn-border"
                                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                        aria-controls="offcanvasRight">Contact
                                                        Info</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- end chat user head -->
                            <div class="chat-conversation p-3 p-lg-4 simplebar-scrollable-y" id="chat-conversation"
                                data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -24px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: 100%; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 24px;">
                                                    <div id="elmLoader"></div>
                                                    <ul class="list-unstyled chat-conversation-list"
                                                        id="users-conversation">
                                                        <li class="chat-list left" id="1">
                                                            <div class="conversation-list">
                                                                <div class="chat-avatar"><img
                                                                        src="assets/images/users/avatar-2.jpg" alt="">
                                                                </div>
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content" id="1">
                                                                            <p class="mb-0 ctext-content">Good morning
                                                                                😊</p>
                                                                        </div>
                                                                        <div
                                                                            class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> <i
                                                                                    class="ri-more-2-fill"></i> </a>
                                                                            <div class="dropdown-menu"> <a
                                                                                    class="dropdown-item reply-message"
                                                                                    href="#"><i
                                                                                        class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item copy-message"
                                                                                    href="#"><i
                                                                                        class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item"
                                                                                    href="#"><i
                                                                                        class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><span
                                                                            class="d-none name">Lisa
                                                                            Parker</span><small
                                                                            class="text-muted time">09:07 am</small>
                                                                        <span class="text-success check-message-icon"><i
                                                                                class="bx bx-check-double"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="chat-list right" id="2">
                                                            <div class="conversation-list">
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content" id="2">
                                                                            <p class="mb-0 ctext-content">Good morning,
                                                                                How are you? What about our next
                                                                                meeting?</p>
                                                                        </div>
                                                                        <div
                                                                            class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> <i
                                                                                    class="ri-more-2-fill"></i> </a>
                                                                            <div class="dropdown-menu"> <a
                                                                                    class="dropdown-item reply-message"
                                                                                    href="#"><i
                                                                                        class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item copy-message"
                                                                                    href="#"><i
                                                                                        class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item"
                                                                                    href="#"><i
                                                                                        class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><span
                                                                            class="d-none name">Frank
                                                                            Thomas</span><small
                                                                            class="text-muted time">09:08 am</small>
                                                                        <span class="text-success check-message-icon"><i
                                                                                class="bx bx-check-double"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="chat-list left" id="3">
                                                            <div class="conversation-list">
                                                                <div class="chat-avatar"><img
                                                                        src="assets/images/users/avatar-2.jpg" alt="">
                                                                </div>
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content" id="3">
                                                                            <p class="mb-0 ctext-content">Yeah
                                                                                everything is fine. Our next meeting
                                                                                tomorrow at 10.00 AM</p>
                                                                        </div>
                                                                        <div
                                                                            class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> <i
                                                                                    class="ri-more-2-fill"></i> </a>
                                                                            <div class="dropdown-menu"> <a
                                                                                    class="dropdown-item reply-message"
                                                                                    href="#"><i
                                                                                        class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item copy-message"
                                                                                    href="#"><i
                                                                                        class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item"
                                                                                    href="#"><i
                                                                                        class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content" id="4">
                                                                            <p class="mb-0 ctext-content">Hey, I'm
                                                                                going
                                                                                to meet a friend of mine at the
                                                                                department store. I have to buy some
                                                                                presents for my parents 🎁.</p>
                                                                        </div>
                                                                        <div
                                                                            class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> <i
                                                                                    class="ri-more-2-fill"></i> </a>
                                                                            <div class="dropdown-menu"> <a
                                                                                    class="dropdown-item reply-message"
                                                                                    href="#"><i
                                                                                        class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item copy-message"
                                                                                    href="#"><i
                                                                                        class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item"
                                                                                    href="#"><i
                                                                                        class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><span
                                                                            class="d-none name">Lisa
                                                                            Parker</span><small
                                                                            class="text-muted time">09:10 am</small>
                                                                        <span class="text-success check-message-icon"><i
                                                                                class="bx bx-check-double"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="chat-list right" id="5">
                                                            <div class="conversation-list">
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content" id="5">
                                                                            <p class="mb-0 ctext-content">Wow that's
                                                                                great</p>
                                                                        </div>
                                                                        <div
                                                                            class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> <i
                                                                                    class="ri-more-2-fill"></i> </a>
                                                                            <div class="dropdown-menu"> <a
                                                                                    class="dropdown-item reply-message"
                                                                                    href="#"><i
                                                                                        class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item copy-message"
                                                                                    href="#"><i
                                                                                        class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item"
                                                                                    href="#"><i
                                                                                        class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><span
                                                                            class="d-none name">Frank
                                                                            Thomas</span><small
                                                                            class="text-muted time">09:30 am</small>
                                                                        <span class="text-success check-message-icon"><i
                                                                                class="bx bx-check-double"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!-- end chat-conversation-list -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 573px; height: 700px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar"
                                        style="height: 535px; display: block; transform: translate3d(0px, 0px, 0px);">
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                                id="copyClipBoard" role="alert">
                                Message copied
                            </div>
                        </div>

                        <div class="position-relative" id="channel-chat" style="display: none;">
                            <div class="p-3 user-chat-topbar">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i
                                                        class="ri-arrow-left-s-line align-bottom"></i></a>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                        <img src="assets/images/users/avatar-2.jpg"
                                                            class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate mb-0 fs-16"><a
                                                                class="text-reset username" data-bs-toggle="offcanvas"
                                                                href="#userProfileCanvasExample"
                                                                aria-controls="userProfileCanvasExample">Lisa
                                                                Parker</a>
                                                        </h5>
                                                        <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                            <small>24 Members</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-4">
                                        <ul class="list-inline user-chat-nav text-end mb-0">
                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-search icon-sm">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                        <div class="p-2">
                                                            <div class="search-box">
                                                                <input type="text"
                                                                    class="form-control bg-light border-light"
                                                                    placeholder="Search here..."
                                                                    onkeyup="searchMessages()" id="searchMessage">
                                                                <i class="ri-search-2-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                <button type="button" class="btn btn-ghost-secondary btn-icon"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#userProfileCanvasExample"
                                                    aria-controls="userProfileCanvasExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info icon-sm">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                    </svg>
                                                </button>
                                            </li>

                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-vertical icon-sm">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-block d-lg-none user-profile-show"
                                                            href="#"><i
                                                                class="ri-user-2-fill align-bottom text-muted me-2"></i>
                                                            View Profile</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-inbox-archive-line align-bottom text-muted me-2"></i>
                                                            Archive</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-mic-off-line align-bottom text-muted me-2"></i>
                                                            Muted</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-delete-bin-5-line align-bottom text-muted me-2"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- end chat user head -->
                            <div class="chat-conversation p-3 p-lg-4" id="chat-conversation" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -24px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 24px;">
                                                    <ul class="list-unstyled chat-conversation-list"
                                                        id="channel-conversation">
                                                    </ul>
                                                    <!-- end chat-conversation-list -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </div>
                            <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                                id="copyClipBoardChannel" role="alert">
                                Message copied
                            </div>
                        </div>



                        <div class="chat-input-section p-3 p-lg-4 d-none" id="chatinputsection">
                            <form id="chatinput-form" enctype="multipart/form-data">
                                <div class="row g-0 align-items-center">

                                    <div class="col">
                                        <div class="chat-input-feedback">
                                            Please Enter a Message
                                        </div>
                                        <input type="text" class="form-control chat-input bg-light border-light"
                                            id="chat-input" placeholder="Type your message..." autocomplete="off">
                                    </div>
                                    <div class="col-auto">
                                        <div class="chat-input-links ms-2">
                                            <div class="links-list-item">
                                                <button type="submit" class="btn chat-send waves-effect waves-light"
                                                    style="background-color: #1a4848">
                                                    <i class="ri-send-plane-2-fill align-bottom text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="replyCard">
                            <div class="card mb-0">
                                <div class="card-body py-3">
                                    <div class="replymessage-block mb-0 d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="conversation-name"></h5>
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button type="button" id="close_toggle"
                                                class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                <i class="bx bx-x align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Contact Details</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="card" id="contact-view-detail">
            <div class="card-body text-center">
                <div class="position-relative d-inline-block">
                    <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-lg rounded-circle img-thumbnail">
                    <span class="contact-active position-absolute rounded-circle bg-success"><span
                            class="visually-hidden"></span>
                </div>
                <h5 class="mt-4 mb-1">Tonya Noble</h5>
                <p class="text-muted">Nesta Technologies</p>

                <ul class="list-inline mb-0">
                    <li class="list-inline-item avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-success-subtle text-success fs-15 rounded">
                            <i class="ri-phone-line"></i>
                        </a>
                    </li>
                    <li class="list-inline-item avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                            <i class="ri-mail-line"></i>
                        </a>
                    </li>
                    <li class="list-inline-item avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-warning-subtle text-warning fs-15 rounded">
                            <i class="ri-question-answer-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
                <p class="text-muted mb-4">Hello, I'm Tonya Noble, The most effective objective is one that is tailored
                    to the job you are applying for. It states what kind of career you are seeking, and what skills and
                    experiences.</p>
                <div class="table-responsive table-card">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium" scope="row">Designation</td>
                                <td>Lead Designer / Developer</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Email ID</td>
                                <td>tonyanoble@velzon.com</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Phone No</td>
                                <td>414-453-5725</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Lead Score</td>
                                <td>154</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Tags</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Lead</span>
                                    <span class="badge bg-primary-subtle text-primary">Partner</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Last Contacted</td>
                                <td>15 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
            $('#resolvebtn').on('click', function() {
                const $section = $('#chatinputsection');
                if ($section.hasClass('d-none')) {
                    $section.removeClass('d-none').css({
                        opacity: 0,
                        maxHeight: '0px'
                    }).animate({
                        opacity: 1,
                        maxHeight: '100px'
                    }, 300);
                } else {
                    $section.animate({
                        opacity: 0,
                        maxHeight: '0px'
                    }, 300, function() {
                        $section.addClass('d-none');
                    });
                }
            });
        });
</script>
@endsection
