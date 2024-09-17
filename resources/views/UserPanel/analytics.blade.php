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
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Sent
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="0">0</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Total Earnings
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="17">17</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Read
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="13">13</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Replied
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="2">2</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Un-Deliverable
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="0">0</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6">
                        <div class="card card-animate rounded-4 py-0" style="border: 1px solid #116464;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Failed
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="0">0</span>
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
                                    <th style="background-color:#1164641e; border-radius: 10px 0 0 10px;"> S.No</th>
                                    <th style="background-color:#1164641e;">Recipient</th>
                                    <th style="background-color:#1164641e;">Type</th>
                                    <th style="background-color:#1164641e;">Status</th>
                                    <th style="background-color:#1164641e;">Message</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
