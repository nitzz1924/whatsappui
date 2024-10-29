
{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Analytics</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/send.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Sent Messages
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$sentmsgcount}}">{{$sentmsgcount}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/receive.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Received Messages
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$recmsgcount}}">{{$recmsgcount}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0"  style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/id-card.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Contacts
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$contactscount}}">{{$contactscount}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/newsletter.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Templates
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$tempcount}}">{{$tempcount}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/campaign.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Campaigns
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$campaignscnt}}">{{$campaignscnt}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="overflow-hidden">
                                       <img src="{{asset('assets/images/people.png')}}" alt="" height="30" width="30">
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Registered Users
                                        </p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="mt-1">
                                            <span class="counter-value" data-target="{{$regisusers}}">{{$regisusers}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card rounded-4">
                <div class="card-body rounded-4">
                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap">
                            <thead>
                                <tr>
                                    <th style="background-color:#054c441e; border-radius: 10px 0 0 10px;"> S.No</th>
                                    <th style="background-color:#054c441e;">Sender ID</th>
                                    <th style="background-color:#054c441e;">Type</th>
                                    <th style="background-color:#054c441e;">Message</th>
                                    <th style="background-color:#054c441e;">Received On</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach($messages->take(10) as $key => $value)
                                    @php
                                        $msg = json_decode($value->message);
                                    @endphp
                                    <tr class="border-bottom-1">
                                        <td>{{$key + 1}}</td>
                                        <td>+{{$value->senderid}}</td>
                                        <td>{{$value->type}}</td>
                                        <td><button class="bg-white border-0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="" data-bs-content="{{ trim($msg->text->body) }}">{{ Str::limit(trim($msg->text->body), 20, '...') }}</button></td>  {{--ALTERNATE WAY TO TRIM THE TEXT STR::LIMIT--}}
                                        <td>{{ $value->created_at->format('d/m/y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











