{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>WhatsApp Api Integration</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">WhatsApp Cloud API Settings</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2">
                                <a href="#" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464">Whatsapp Manager</a>
                            </div>
                            <div class="px-2">
                                <a href="#" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464">Whatsapp Payment Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4" style="border: 1px solid #116464;">
                <div class="card-body rounded-4 p-4">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Webhook URL</label>
                            <input type="text" name="phonenumber" class="form-control rounded-4 py-2" id="username"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Whatsapp Business Account ID</label>
                            <input type="text" name="phonenumber" class="form-control rounded-4 py-2" id="username"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Access Token</label>
                            <input type="password" name="phonenumber" class="form-control rounded-4 py-2" id="username"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Assign New Lead Conversation to</label>
                            <input type="text" name="phonenumber" class="form-control rounded-4 py-2" id="username"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-check form-switch form-switch-success">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked>
                            <label class="form-check-label fw-bold" for="SwitchCheck3">Auto Unsubscribe Contact if
                                message sending fails.</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="px-2">
                                <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464">Connect</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Phone Numbers</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body rounded-4">
                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap">
                            <thead>
                                <tr>
                                    <th style="background-color:#1164642b; border-radius: 10px 0 0 10px;">S.No</th>
                                    <th style="background-color:#1164642b;">Display Name</th>
                                    <th style="background-color:#1164642b;">Phone Number/ID</th>
                                    <th style="background-color:#1164642b;">MSG Limit</th>
                                    <th style="background-color:#1164642b;">Status</th>
                                    <th style="background-color:#1164642b;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr class="border-bottom-1">
                                    <th>1</th>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success badge-border">Connected</span>
                                    </td>
                                    <td>
                                        <div class="px-2">
                                            <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                                style="background-color: #116464">Set as Default</a>
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
