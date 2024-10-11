{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Add New Automation</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Add New Automation</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #054c44">Cancel</a>
                            </div>
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #054c44"><i class=" bx bxs-save me-2"></i>Save & Close</a>
                            </div>
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #054c44"><i class="bx bx-play me-2"></i>Save & Start</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card rounded-4 py-3" style="border: 1px solid #054c44;">
                <div class="card-body form-steps">
                    <form class="vertical-navs-step">
                        <div class="row gy-5">
                            <div class="col-lg-3">
                                <div class="nav flex-column  custom-nav nav-pills" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link" id="v-pills-bill-info-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-bill-info" type="button" role="tab"
                                        aria-controls="v-pills-bill-info" aria-selected="true">
                                        <span class="step-title me-2">
                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 1
                                        </span>
                                        Name your Automation
                                    </button>
                                    <button class="nav-link active" id="v-pills-bill-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-bill-address" type="button" role="tab"
                                        aria-controls="v-pills-bill-address" aria-selected="false">
                                        <span class="step-title me-2">
                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 2
                                        </span>
                                        Provide Start Condition
                                    </button>
                                    <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-payment" type="button" role="tab"
                                        aria-controls="v-pills-payment" aria-selected="false">
                                        <span class="step-title me-2">
                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 3
                                        </span>
                                        Add your Messages
                                    </button>
                                    <button class="nav-link" id="v-pills-finish-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-finish" type="button" role="tab"
                                        aria-controls="v-pills-finish" aria-selected="false">
                                        <span class="step-title me-2">
                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 4
                                        </span>
                                        Provide Stop Condition
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="px-lg-4">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="v-pills-bill-info" role="tabpanel"
                                            aria-labelledby="v-pills-bill-info-tab">
                                            <div>
                                                <h5>Name your Automation</h5>
                                                <p class="text-muted">Fill all information below</p>
                                            </div>

                                            <div>
                                                <div class="row g-3">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Automation
                                                            Name</label>
                                                        <input type="password" class="form-control"
                                                            id="placeholderInput" placeholder="Automation Name">
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea5"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea5"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="v-pills-bill-address" role="tabpanel"
                                            aria-labelledby="v-pills-bill-address-tab">
                                            <div>
                                                <h5> Provide Start Condition</h5>
                                                <p class="text-muted">Fill all information below</p>
                                            </div>

                                            <div>
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <div>
                                                            <label for="autoCompleteFruit"
                                                                class="form-label fs-5">Choose a Module</label>
                                                            <input class="form-control rounded-4 py-2 mb-0"
                                                                id="autoCompleteFruit" type="text" dir="ltr"
                                                                spellcheck="false" autocomplete="off"
                                                                autocapitalize="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-2 mt-0">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input immeditate" type="radio"
                                                                    name="inlineRadioOptions2" id="inlineRadio1"
                                                                    value="option1">
                                                                <label class="form-check-label" for="inlineRadio1">All
                                                                    New</label>
                                                            </div>
                                                            <div class="form-check form-check-inline mb-3">
                                                                <input class="form-check-input scheduledatetimebtn"
                                                                    type="radio" name="inlineRadioOptions2"
                                                                    id="inlineRadio2" value="option2">
                                                                <label class="form-check-label" for="inlineRadio2">Based
                                                                    on a Segment</label>
                                                            </div>
                                                            <div class="">
                                                                <label for="autoCompleteFruit"
                                                                    class="form-label fs-5">Runs</label>
                                                                <select class="form-select accountstatus"
                                                                    aria-label="Default select example">
                                                                    <option>--select-account-status</option>
                                                                    <option selected>Once</option>
                                                                    <option>B</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                            aria-labelledby="v-pills-payment-tab">
                                            <div>
                                                <h5>Add your Messages</h5>
                                                <p class="text-muted">Fill all information below</p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Message Title</th>
                                                            <th>Send Conditions</th>
                                                            <th>Actions
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-body">
                                                        <tr class="border-bottom-1">
                                                            <th>-</th>
                                                            <td>
                                                                <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                                    aria-controls="offcanvasRight"
                                                                    class="btn text-white rounded-4 waves-effect waves-light"
                                                                    style="background-color: #116464"><i
                                                                        class="mdi mdi-plus me-2"></i>Create Message</a>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal" data-record=""
                                                                        class="link-success editbtnmodal fs-15"><i
                                                                            class="ri-edit-2-line"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-title="Edit"></i></a>
                                                                    <a href="#" onclick="" class="link-danger fs-15"><i
                                                                            class="ri-delete-bin-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-finish" role="tabpanel"
                                            aria-labelledby="v-pills-finish-tab">
                                            <div>
                                                <h5>Provide Stop Condition</h5>
                                                <p class="text-muted">Fill all information below</p>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div>
                                                        <label for="autoCompleteFruit"
                                                            class="form-label fs-5">Choose a Segment</label>
                                                            <select class="form-select accountstatus"
                                                            aria-label="Default select example">
                                                            <option>--choose one--</option>
                                                            <option selected>Once</option>
                                                            <option>B</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end mt-4">
                                                    <button style="background-color: #054c44"
                                                        class="btn py-2  fs-5 rounded-4 text-white" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end mycustomcanvas" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header"  style="background-color: #1164641e">
        <h5 id="offcanvasRightLabel">Enter Details</h5>
        <div class="d-flex justify-content-end align-items-center">
            <a href="#" class="btn btn-sm text-white rounded-4 waves-effect waves-light" style="background-color: #054c44">Create Message</a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="" id="contact-view-detail">
            <div class="card-body">
                <div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div>
                                <label for="placeholderInput" class="form-label fs-5">Message
                                    Name</label>
                                <input type="password" class="form-control rounded-4 py-2 mb-3"
                                    id="placeholderInput" placeholder="Automation Name">
                            </div>
                            <div class="mb-2 mt-0">
                                    <label for="autoCompleteFruit" class="form-label fs-5">Choose a Module</label>
                                    <input class="form-control rounded-4 py-2 mb-3" id="autoCompleteFruit" type="text" dir="ltr"
                                        spellcheck="false" autocomplete="off" autocapitalize="off" placeholder="Choose Module">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
