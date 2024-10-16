{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Templates Settings</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3 w-25" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            Message Templates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            Quick Reply
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-end align-items-center">
                        {{-- <div class="px-2">
                            <h4 class="mb-sm-0">Templates Settings</h4>
                        </div> --}}
                        <div class="d-flex justify-content-end ">
                            {{-- <div class="px-2"> <select class="form-select accountstatus"
                                    aria-label="Default select example">
                                    <option selected>--select-account-status</option>
                                    <option selected>A</option>
                                    <option selected>B</option>
                                </select></div>
                            <div class="px-2"> <select class="form-select accountstatus"
                                    aria-label="Default select example">
                                    <option selected>--select-account-status</option>
                                    <option selected>A</option>
                                    <option selected>B</option>
                                </select>
                            </div> --}}
                            <div class="px-2">
                                <a href="https://business.facebook.com/wa/manage/message-templates/"
                                    class="btn text-white rounded-4 waves-effect waves-light" target="_blank"
                                    style="background-color: #116464"><i class="ri-add-circle-fill me-2"></i>Create Template</a>
                                    <a href="{{ url('refreshtemplates')}}" id="updateTemplatesBtn" class="btn text-white rounded-4 waves-effect waves-light ms-2" style="background-color: #116464">
                                        <i class="ri-refresh-line me-2"></i>Refresh Templates
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="home1" role="tabpanel">
                    <div class="card rounded-4">
                        <div class="card-body rounded-4">
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#1164642b; border-radius: 10px 0 0 10px;">S.No</th>
                                            <th style="background-color:#1164642b;">Name</th>
                                            <th style="background-color:#1164642b;">Category</th>
                                            <th style="background-color:#1164642b;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        @foreach ($alltemplates as $index => $row)
                                        <tr class="border-bottom-1">
                                            <th>{{$index + 1}}</th>
                                            <td><button class="btn btn-white fs-5" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="{{ $row['name'] }}" data-bs-content="{{$row['components'][1]['text']}}">{{ $row['name'] }}</button></td>

                                            <td>{{ $row['category'] }}</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success badge-border">{{ $row['status'] }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile1" role="tabpanel">
                    <div class="card rounded-4">
                        <div class="card-body rounded-4">
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#1164642b; border-radius: 10px 0 0 10px;">S.No</th>
                                            <th style="background-color:#1164642b;">Name</th>
                                            <th style="background-color:#1164642b;">Status</th>
                                            <th style="background-color:#1164642b;">Last Updated On</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        <tr class="border-bottom-1">
                                            <th>1</th>
                                            <td>A</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success badge-border">Active</span>
                                            </td>
                                            <td>A</td>
                                        </tr>
                                        <tr class="border-bottom-1">
                                            <th>1</th>
                                            <td>A</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success badge-border">Active</span>
                                            </td>
                                            <td>A</td>
                                        </tr>
                                        <tr class="border-bottom-1">
                                            <th>1</th>
                                            <td>A</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success badge-border">Active</span>
                                            </td>
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
    </div>
</div>
@endsection
