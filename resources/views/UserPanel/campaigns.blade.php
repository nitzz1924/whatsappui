{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>All Campaigns</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Campaigns</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2">
                                <a href="{{ route('addnewcampaign') }}" class="btn text-white rounded-4 waves-effect waves-light" style="background-color: #054c44"><i class="mdi mdi-plus me-2"></i>New Campaign</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="d-flex justify-content-evenly">
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44; background-color: #f4fff4;">
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
                            <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44; background-color: #f4fff4;">
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
                            <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44;background-color: #f4fff4;">
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
                            <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44; background-color: #f4fff4;">
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
                            <div class="card card-animate rounded-4 py-0" style="border-bottom: 4px solid #054c44; background-color: #f4fff4;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card rounded-4">
                <div class="card-header rounded-4 border-0 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Message Status Graph</h4>
                    {{-- <div>
                        <select class="form-select form-select-sm campaingdrop" style="width: auto;">
                            <option value="all">All Campaigns</option>
                            @foreach ($campaigns as $campaign)
                                <option value="{{ $campaign->id }}">{{ $campaign->campaignname }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
                <div class="card-body rounded-4">
                    <div id="chart" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card rounded-4">
                <div class="card-header rounded-4 border-0">
                    <h4 class="card-title mb-0">All Campaigns</h4>
                </div>
                <div class="card-body rounded-4">
                    <div data-simplebar style="max-height: 219px">
                        <ul class="list-group list-group-flush border-dashed">
                            @foreach ($campaigns as $index => $row)
                            <li class="list-group-item ps-0">
                                <div class="row align-items-center g-3">
                                    <div class="col-auto">
                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                            <div class="text-center">
                                                <h5 class="mb-0">{{$row->created_at->format('d')}}</h5>
                                                <div class="text-muted">{{$row->created_at->format('D')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="text-muted mt-0 mb-1 fs-12 fw-semibold">{{$row->created_at->format('d M Y')}}</h5>
                                        <a href="#" class="text-reset fs-14 mb-0">{{$row->campaignname}}</a>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-success-subtle text-success badge-border">Sent ({{$row->sent_count}})</span>
                                            <span class="badge bg-danger-subtle text-danger badge-border ms-2">Not Sent ({{$row->not_sent_count}})</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    function confirmDelete(id, campaign_name) {
        Swal.fire({
                title: "Are you sure?"
                , html: "You want to delete <strong style='color: red;'>" + campaign_name + "</strong>?"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#116464"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, delete it!"
                , cancelButtonText: "Cancel"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/deletecampaign/" + id;
                }
            });
    }

</script>
<script>
    
    var campaignarray = @json($campaignsArray);
    console.log(campaignarray);
    var options = {
        series: [{
                name: 'Sent'
                , data: campaignarray.map(campaign => campaign.sent_count)
            }
            , {
                name: 'Not Sent'
                , data: campaignarray.map(campaign => campaign.not_sent_count)
            }
        ]
        , chart: {
            type: 'bar'
            , height: 430
        }
        , plotOptions: {
            bar: {
                horizontal: true
                , dataLabels: {
                    position: 'top'
                }
            }
        }
        , colors: ['#28a745', '#dc3545'], // Green for sent, red for not sent
        dataLabels: {
            enabled: true
            , offsetX: -6
            , style: {
                fontSize: '12px'
                , colors: ['#fff']
            }
        }
        , stroke: {
            show: true
            , width: 1
            , colors: ['#fff']
        }
        , tooltip: {
            shared: true
            , intersect: false
        }
        , xaxis: {
            categories: campaignarray.map(campaign => campaign.campaign_name)
        }
    };
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>
@endsection
