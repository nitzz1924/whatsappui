{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>All Automations</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Automations</h4>
                        </div>
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
                                </select></div> --}}
                            <div class="px-2">
                                <a href="{{ route('addnewautomation') }}"
                                    class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #054c44"><i class="mdi mdi-plus me-2"></i>New Automation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-body rounded-4">
                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap">
                            <thead>
                                <tr>
                                    <th style="background-color:#1164642b; border-radius: 10px 0 0 10px;">S.No</th>
                                    <th style="background-color:#1164642b;">Name</th>
                                    <th style="background-color:#1164642b;">No. of Messages</th>
                                    <th style="background-color:#1164642b;">People in Automation</th>
                                    <th style="background-color:#1164642b;">Status</th>
                                    <th style="background-color:#1164642b;">Analytics</th>
                                    <th style="background-color:#1164642b; border-radius: 0px 10px 10px 0px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-record="" class="btn btn-light btn-sm editbtnmodal"><i
                                                    class="ri-edit-2-line" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Edit"></i></a>
                                            <a href="#" onclick="" class="btn btn-danger btn-sm"><i
                                                    class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
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
