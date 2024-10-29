{{-- #---------------------------------------------------ЁЯЩПЁЯФ▒рджреЗрд╡рд╛ рд╢реНрд░реА рдЧрдгреЗрд╢рд╛
ЁЯФ▒ЁЯЩП---------------------------тАЭ --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Index Chat</title>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="chat-wrapper d-lg-flex gap-1 mx-n4 my-n4 p-1">
            <div class="chat-leftsidebar minimal-border">
                <div class="px-4 pt-4 mb-3">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="mb-4">Chats</h5>
                        </div>
                    </div>
                    <div class="search-box shadow-sm">
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
                                                    {{-- <div class="flex-shrink-0">
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="bottom" aria-label="New Message"
                                                        data-bs-original-title="New Message">

                                                        <!-- Button trigger modal -->
                                                        <button type="button"
                                                            class="btn btn-soft-success btn-sm shadow-none material-shadow">
                                                            <i class="ri-add-line align-bottom"></i>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                                </div>

                                                <div class="chat-message-list">
                                                    <ul class="list-unstyled chat-list chat-user-list" id="userList">
                                                        @foreach ($contactsdata as $data)
                                                            <li id="contact-id-{{ $data->id }}"
                                                                data-name="direct-message"
                                                                class="{{ $data->is_active ? 'active' : '' }}">
                                                                <a href="#" class="contact-tab"
                                                                    data-value="{{ json_encode($data) }}">
                                                                    <div class="d-flex align-items-center py-2">
                                                                        <div
                                                                            class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                            <div class="avatar-xxs d-flex justify-content-center align-items-center rounded-circle text-white"
                                                                                style="width: 30px; height: 30px; background-color:#1a4848;">
                                                                                <span
                                                                                    class="user-initial">{{ strtoupper(substr($data->fullname, 0, 1)) }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                            <p class="text-truncate mb-0">
                                                                                {{ $data->fullname }}
                                                                            </p>
                                                                            <small class="text-muted fs-6 fw-normal mb-0">
                                                                                Yes!.Ok
                                                                            </small>
                                                                        </div>
                                                                        <div class="flex-grow-1 overflow-hidden text-end">
                                                                            <small class="text-muted fs-6 fw-normal mb-0">
                                                                                12:05
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
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
                                                        <h4 class="mb-0 fs-11 text-muted text-uppercase">All Groups
                                                        </h4>
                                                    </div>
                                                </div>

                                                <div class="chat-message-list">
                                                    <ul class="list-unstyled chat-list chat-user-list" id="userList">
                                                        @foreach ($groupsdata as $row)
                                                            <li data-name="direct-message">
                                                                <a href="javascript: void(0);">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                            <p class="text-truncate mb-0">
                                                                                {{ $row->label }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
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
            <div class="user-chat w-100 overflow-hidden minimal-border">
                <div class="chat-content d-lg-flex">
                    <div class="w-100 overflow-hidden position-relative" style="height:87vh;">
                        <div id="defaultimage">
                            <div class="bg-white d-flex justify-content-center align-items-center" style="height:100%;">
                                <img class="img-fluid" src="{{ asset('assets/images/svgviewer-png-output (1).png') }}"
                                    alt="" />
                            </div>
                        </div>
                        <div class="position-relative" id="chatrow" style="display: none;">
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

                                                    @foreach ($contactsdata->take(1) as $data)
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div class="avatar-xxs d-flex justify-content-center align-items-center rounded-circle  text-white"
                                                                    style="width: 40px; height: 40px; background-color:#1a4848;">
                                                                    <span class="user-initial fs-5 fw-bold"
                                                                        id="alphabet">{{ strtoupper(substr($data->fullname, 0, 1)) }}
                                                                        </spanclass=>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="text-truncate mb-0 fs-16 fw-bold"><a
                                                                        class="text-reset username"
                                                                        data-bs-toggle="offcanvas"
                                                                        data-bs-target="#offcanvasRight"
                                                                        aria-controls="offcanvasRight"
                                                                        href="#userProfileCanvasExample"
                                                                        aria-controls="userProfileCanvasExample">{{ $data->fullname }}</a>
                                                                </h5>
                                                                <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                                    <small>Online</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-4">
                                            <ul class="list-inline user-chat-nav text-end mb-0">
                                                <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                    <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                                        <a href="#" id="resolvebtn"
                                                            class="btn text-white rounded-3 waves-effect waves-light"
                                                            style="background-color: #054c44">Resolve</a>
                                                        <a href="#" id="resolvebtn" data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasRight"
                                                            aria-controls="offcanvasRight"
                                                            class="btn text-white rounded-3 waves-effect waves-light"
                                                            style="background-color: #054c44">Contact Info</a>
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
                                                        <div class="list-unstyled chat-conversation-list"
                                                            id="users-conversation">


                                                        </div>
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-search icon-sm">
                                                                <circle cx="11" cy="11" r="8"></circle>
                                                                <line x1="21" y1="21" x2="16.65"
                                                                    y2="16.65"></line>
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-info icon-sm">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="16" x2="12"
                                                                y2="12"></line>
                                                            <line x1="12" y1="8" x2="12.01"
                                                                y2="8"></line>
                                                        </svg>
                                                    </button>
                                                </li>

                                                <li class="list-inline-item m-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
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
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 24px;">
                                                        <ul class="list-unstyled chat-conversation-list"
                                                            id="channel-conversation">

                                                        </ul>
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
                            <div class="chat-input-section py-4" id="templatedivsec">
                                <div class="row g-0 align-items-center">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-center">
                                            <p class="text-muted fs-6">WhatsApp allows open chat for 24hrs after a user
                                                initiated response, beyond which you can only send approved templates or
                                                wait till the user initiates a message.</p>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="" class="text-decoration-underline" style="color: #1a4848"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                                aria-controls="offcanvasTop">Choose a template</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input-section p-3 p-lg-4 d-none" id="chatinputsection">
                                <form id="chatinput-form" enctype="multipart/form-data">
                                    <div class="row g-0 align-items-center">

                                        <div class="col">
                                            <div class="chat-input-feedback">
                                                Please Enter a Message
                                            </div>
                                            <input type="text"
                                                class="form-control chat-input bg-light border-light shadow"
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Contact Details</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="contactdetailsoff">
            @foreach ($contactsdata->take(1) as $data)
                <div class="card" id="contact-view-detail">
                    <div class="card-body text-center">
                        <div class="d-inline-block">
                            <div class="avatar-xxs d-flex justify-content-center align-items-center rounded-circle bg-success text-white"
                                style="width: 80px; height: 80px;">
                                <span class="user-initial fs-3">{{ strtoupper(substr($data->fullname, 0, 1)) }}</span>
                            </div>
                        </div>
                        <h5 class="mt-4 mb-1">{{ $data->fullname }}</h5>
                        <p class="text-muted">{{ $data->status }}</p>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-success-subtle text-success fs-15 rounded">
                                    <i class="ri-phone-line"></i>
                                </a>
                            </li>
                            <li class="list-inline-item avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                    <i class="ri-mail-line"></i>
                                </a>
                            </li>
                            <li class="list-inline-item avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-warning-subtle text-warning fs-15 rounded">
                                    <i class="ri-question-answer-line"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
                        <p class="text-muted mb-4">Hello, {{ $data->fullname }}, The most effective objective is one that
                            is
                            tailored
                            to the job you are applying for. It states what kind of career you are seeking, and what skills
                            and
                            experiences.</p>
                        <div class="table-responsive table-card">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium" scope="row">Email ID</td>
                                        <td>{{ $data->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Phone No</td>
                                        <td>{{ $data->phonenumber }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Address</td>
                                        <td>{{ $data->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Contact Created</td>
                                        <td><small class="text-muted">{{ $data->created_at->format('d/m/y') }}</small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <form action="{{ route('sendsinglemessage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="offcanvas offcanvas-end mycustomcanvascontacts" tabindex="-1" id="offcanvasTop"
            aria-labelledby="offcanvasRightLabel" style="background-image: url('/assets/images/chat-bg-pattern.png');">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Contact Details</h5>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-sm text-white rounded-4 waves-effect waves-light"
                        style="background-color: #116464"><i class="bx bx-send me-2"></i>Send Message</button>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="offcanvas-body">
                <div class="" id="contact-view-detail">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label for="template" class="form-label fs-5">Choose Template</label>
                                    <select class="form-select rounded-pill mb-3 onchangedrop" name="template"
                                        aria-label="Select template">
                                        <option disabled selected>--choose template--</option>
                                        @foreach ($alltemplates as $data)
                                            <option value="{{ $data['name'] }}"
                                                data-value="{{ htmlspecialchars(json_encode($data['components']), ENT_QUOTES, 'UTF-8') }}"
                                                data-language="{{ htmlspecialchars(json_encode($data['language']), ENT_QUOTES, 'UTF-8') }}"
                                                {{ old('template') == $data['name'] ? 'selected' : '' }}>
                                                {{ $data['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-4" id="previewdivtemplate">
                                    {{-- Template Div Appends Here --}}
                                </div>
                                <input type="hidden" name="phonenumber" value="" id="contactnumberofperson">
                                <input type="hidden" name="wholeme" value="" id="contactnumberofperson">
                            </div>
                            <div class="col-lg-6">
                                <div class="whatsapp-container" id="messagediv">
                                    {{-- Message Div Appends Here --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //Hiding Default on keypress of Escape Key
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                $('#defaultimage').show();
                $('#chatrow').hide();
            }
        });


        $(document).ready(function() {
            $('#resolvebtn').on('click', function() {
                const $section = $('#chatinputsection');
                $('#templatedivsec').hide();
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
                        $('#templatedivsec').show();
                    });
                }
            });
        });


        $(document).ready(function() {
            $('.contact-tab').on('click', function() {
                $('#users-conversation').empty();
                $('#chatrow').show();
                $('#defaultimage').hide();
                const contacttab = $(this).data('value');
                console.log(contacttab);
                var formattedDate = new Date(contacttab.created_at)
                    .toLocaleDateString('en-GB', {
                        day: 'numeric',
                        month: 'short',
                        year: 'numeric'
                    });
                $('#contactdetailsoff').empty();
                $('#alphabet').empty();


                //Contact Details Functionality
                const contactbody = `
                            <div class="card" id="contact-view-detail">
                                <div class="card-body text-center">
                                    <div class="d-inline-block">
                                        <div class="avatar-xxs d-flex justify-content-center align-items-center rounded-circle bg-success text-white"
                                            style="width: 80px; height: 80px;">
                                        <span class="user-initial fs-3">${contacttab.fullname.charAt(0).toUpperCase()}</span>
                                        </div>
                                </div>
                            <h5 class="mt-4 mb-1">${contacttab.fullname}</h5>
                            <p class="text-muted">${contacttab.status}</p>
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
                            <p class="text-muted mb-4">Hello, ${contacttab.fullname}, The most effective objective is one that is tailored
                                to the job you are applying for. It states what kind of career you are seeking, and what skills and
                                experiences.</p>
                            <div class="table-responsive table-card">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium" scope="row">Email ID</td>
                                            <td>${contacttab.email}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Phone No</td>
                                            <td>${contacttab.phonenumber}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Address</td>
                                            <td>${contacttab.address}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Contact Created</td>
                                            <td><small class="text-muted">${formattedDate}</small></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    `;
                $('#contactdetailsoff').append(contactbody);
                $('#contactnumberofperson').val(contacttab.phonenumber);
                $('#alphabet').html(contacttab.fullname.charAt(0).toUpperCase());


                //Sent Message show Functionality
                //---------------------------------------------------------------------------------

                $.ajax({
                    url: "/showsentmessage/" + contacttab.phonenumber,
                    method: "GET",
                    success: function(data) {
                        console.log(data);
                        const messageArray = data;
                        console.log("Converted Array : " + messageArray);

                        let messagediv = '';


                        messageArray.forEach((element) => {
                            if (element.type === 'Sent') {
                                const messageContent = JSON.parse(element.message);
                                console.log("Msg Content : " +
                                messageContent);
                                let messageHTML = '';

                                // Iterate over each part of the message
                                messageContent.forEach(part => {
                                    if (part.type === 'HEADER') {
                                        if (part.format === 'TEXT') {
                                            messageHTML +=
                                                `<p class="message-header">${part.text}</p>`;
                                        } else if (part.format === 'IMAGE') {
                                            const imageUrl = element
                                            .imageurl;
                                            console.log("Image URL : " +
                                                imageUrl);
                                            messageHTML +=
                                                `<img src='${imageUrl}' alt="Header Image" height="200px" width="100%">`;
                                        }
                                         else if (part.format === 'VIDEO') {
                                            const imageUrl = element
                                            .imageurl;
                                            console.log("Video URL : " + imageUrl);
                                            messageHTML +=
                                                `<video controls width="100%" height="200px">
                                                    <source id="videomain" src="${imageUrl}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>`;
                                        }
                                    } else if (part.type === 'BODY') {
                                        // Apply link formatting only to the body text
                                        let bodyText = part.text;
                                        bodyText = bodyText.replace(
                                            /\*(.*?)\*/g,
                                            '<strong>$1</strong>'
                                            ); // Bold formatting
                                        bodyText = bodyText.replace(
                                            /(https?:\/\/[^\s]+)/g,
                                            '<a href="$1" target="_blank">$1</a>'
                                            ); // Link formatting
                                        messageHTML +=
                                            `<p class="message-body fs-5">${bodyText}</p>`;
                                    } else if (part.type === 'BUTTONS') {
                                        part.buttons.forEach(button => {
                                            if(button.type == 'URL'){
                                                messageHTML +=
                                                    `<a class="" href="${button.url}"><button class="message-button w-100 text-white btn btn-success btn-block">${button.text}</button></a>`;
                                            }else{
                                                messageHTML +=
                                                    `<a class="" href="tel:${button.phone_number}"><button class="message-button w-100 text-white btn btn-success btn-block">${button.text}</button></a>`;
                                            }
                                        });
                                    }
                                });


                                messagediv += `
                                    <li class="w-100 mb-3 justify-content-end">
                                        <div class="message-preview">
                                            ${messageHTML}
                                        </div>
                                    </li>
                                `;
                            }

                            if (element.type === 'Recieved') {
                                // Parse the message
                                let messageData = JSON.parse(element.message);

                                // Extract timestamp and format it
                                let msgtime = messageData.timestamp;
                                let date = new Date(msgtime *
                                1000); // Convert to milliseconds

                                // Add IST offset (5 hours and 30 minutes)
                                let istOffset = 5.5 * 60 * 60 *
                                1000; // IST is UTC +5:30
                                let istDate = new Date(date.getTime() + istOffset);

                                // Get hours, minutes, and determine AM/PM in IST
                                let hours = istDate.getUTCHours();
                                let minutes = istDate.getUTCMinutes().toString()
                                    .padStart(2, '0');
                                let ampm = hours >= 12 ? 'PM' : 'AM';

                                // Convert hours to 12-hour format
                                hours = hours % 12;
                                hours = hours ? hours : 12; // Adjust 0 to 12

                                let formattedTime = `${hours}:${minutes} ${ampm}`;

                                // Extract the message text (assuming it's in 'text.body')
                                let reply = messageData.text ? messageData.text.body :
                                    'No message content';

                                // Create the message HTML structure and append to messagediv
                                messagediv += `
                                    <li class="chat-list left" style="width:50%;">
                                        <div class="conversation-list">
                                            <div class="user-chat-content">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content rounded-3" id="">
                                                        <p class="mb-0 ctext-content fs-5">${reply}</p>
                                                        <div class="conversation-name">
                                                            <span class="d-none name">Lisa Parker</span>
                                                            <small class="text-muted time">${formattedTime}</small>
                                                            <span class="text-success check-message-icon">
                                                                <i class="bx bx-check-double"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown align-self-start message-box-drop">
                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>`;
                            }
                        });

                        // Append all the generated message HTML after the loop finishes
                        $('#users-conversation').html(messagediv);
                    }
                });

            });

        });
    </script>
    <script>
        //Showing Message Dynamically
        $('.onchangedrop').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            const data = selectedOption.data('value');
            const language = selectedOption.data('language').replace(/&quot;/g, '').trim();
            const decodedData = $('<textarea/>').html(data).text();
            const jsonArray = JSON.parse(decodedData);
            console.log(jsonArray);
            $('#messagediv').empty();
            $('#previewdivtemplate').empty();
            let messageHTML = '';

            jsonArray.forEach((element) => {
                //Dyamic Upload Input
                if (element.format == 'IMAGE' || element.format == 'VIDEO') {
                    const input = `
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload ${element.format == 'IMAGE' ? 'Image' : 'Video'}</label>
                        <input name="mediaimage" class="form-control" accept="image/*, video/*" onchange="readURL(this);" type="file" id="formFile">
                        <input type="hidden" name="mediatype" class="form-control" value=${element.format == 'IMAGE' ? 'image' : 'video'}>
                        <input type="hidden" name="languagetype" class="form-control" value=${language}>
                    </div>
                    `;
                    $('#previewdivtemplate').append(input);
                }
                if (element.type === 'HEADER') {
                    if (element.format == 'TEXT') {
                        messageHTML += `<p class="message-title">${element.text}</p>`;
                    } else if (element.format === 'VIDEO') {
                        messageHTML += `
                        <video controls width="100%" height="200px">
                            <source id="videomain" src="${element.videoUrl}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>`;
                    } else if (element.format === 'IMAGE') {
                        messageHTML +=
                            `
                        <img id="imagemain" src="${element.imageUrl}" height="200px" alt="${element.text}" width="100%">`;
                    }
                } else if (element.type === 'BODY') {
                    messageHTML += `<p class="message-body">${element.text}</p>`;
                } else if (element.type === 'FOOTER') {
                    messageHTML += `<p class="message-footer">${element.text}</p>`;
                } else if (element.type === 'BUTTONS') {
                    element.buttons.forEach(button => {
                        console.log(button);
                        messageHTML += `<p class="message-footer">${button.text}</p>`;
                    });
                }
            });
            const messageWithStrongTags = messageHTML.replace(/\*(.*?)\*/g, '<strong>$1</strong>');
            const linkRegex = /(https?:\/\/[^\s]+)/g;
            const formattedMessage = messageWithStrongTags.replace(linkRegex,
                '<a href="$1" target="_blank">$1</a>');

            const messagediv =
                `<div class="message-preview">
                    ${formattedMessage}
                </div>`;
            $('#messagediv').html(messagediv);
        });

        //Showing Image Preview
        function readURL(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
