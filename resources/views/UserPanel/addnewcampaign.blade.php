{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Add New Campaign</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Add New Campaign</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464">Cancel</a>
                            </div>
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464">Save & Close</a>
                            </div>
                            <div class="px-2"> <a href="" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464"><i class="bx bx-send me-2"></i>Send & Set Live</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card rounded-4" style="border: 1px solid #116464;">
                <div class="card-body rounded-4 p-4">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Campaign Name</label>
                            <input type="text" name="phonenumber" class="form-control rounded-4 py-2" id="username"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div>
                            <label for="autoCompleteFruit" class="form-label fs-5">Choose a Module</label>
                            <input class="form-control rounded-4 py-2 mb-3" id="autoCompleteFruit" type="text" dir="ltr"
                                spellcheck="false" autocomplete="off" autocapitalize="off">
                        </div>
                        <div>
                            <label for="rsegment" class="form-label fs-5">Recipients Segment</label>
                            <input class="form-control rounded-4 py-2 mb-3" id="rsegment" type="text" dir="ltr"
                                spellcheck="false" autocomplete="off" autocapitalize="off"
                                placeholder="Recipients Segment">
                        </div>
                        <div>
                            <label for="template" class="form-label fs-5">Choose Template</label>
                            <input class="form-control rounded-4 py-2 mb-3" id="template" type="text" dir="ltr"
                                spellcheck="false" autocomplete="off" autocapitalize="off"
                                placeholder="Choose Template">
                        </div>
                        <div class="mt-4 d-none">
                            <div class="mt-4">
                                <p class="text-muted text-start fs-5">Header</p>
                                <div>
                                    <label for="formFile" class="form-label">Default file input example</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <p class="text-muted text-start fs-5">Body</p>
                            <div>
                                <p class="text-start fs-6">Best Digital Marketing Agency</p>
                            </div>
                            <div>
                                <p class="text-start fs-6">Its time for Magic</p>
                            </div>
                            <div>
                                <p class="text-start fs-6">At YUVMEDIA we create Magic</p>
                            </div>
                            <div class="mt-4">
                                <p class="text-muted text-start fs-5">We Provide:</p>
                                <ul class="list-group list-group-flush">
                                    <li class=""><i class="ri-check-line"></i> Marketplace Expertise
                                    </li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> SEO</li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Performance Media
                                    </li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Social Media</li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Web & App Development
                                    </li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> CRM & ERP Solutions
                                    </li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Video Production</li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Designing Services
                                    </li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> GBP Management</li>
                                    <li class="list-group-item ps-0"><i class="ri-check-line"></i> Influencer Management
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p class="text-start fs-6">Reach Out Today !</p>
                            </div>
                            <div>
                                <p class="text-start fs-6">Don't Just Take our Word</p>
                            </div>
                            <div class="mt-4">
                                <p class="text-muted text-start fs-5">Footer</p>
                                <div>
                                    <p class="link text-black text-start">Click the link below to know more</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-muted text-start fs-5">Buttons</p>
                                <div>
                                    <ol class="" start="1">
                                        <li class="">Visit Our Website Now </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <label for="username" class="form-label fs-5">Schedule Your Campaign</label>
                        <div class="mb-0 mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input immeditate" type="radio" name="inlineRadioOptions2"
                                    id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Send Immediately</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input scheduledatetimebtn" type="radio"
                                    name="inlineRadioOptions2" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Schedule Date/Time</label>
                            </div>
                            <div class="d-none" id="datediv">
                                <input type="datetime-local" name="scheduledatetime" class="form-control rounded-4 py-2"
                                    id="datetimeInput" placeholder="Enter Date and Time" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="d-flex justify-content-center">
                <div class="card w-50 rounded-3" style="background-color: #d7f5c3">
                    <img class="img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p>
                            🌟 Unlock Your Business Potential with Our Digital Marketing Services! 🌟

                            At [Your Company Name], we specialize in helping businesses like yours reach a wider
                            audience and boost sales through:

                            📈 SEO Optimization
                            💻 Social Media Marketing
                            📧 Email Campaigns
                            🎯 Google & Facebook Ads
                            🛍️ E-Commerce Solutions
                            Let’s discuss how we can take your online presence to the next level! 🚀

                            👉 Get a FREE consultation today! Reply "YES" to get started or contact us at [Phone
                            Number].

                            Best regards,
                            [Your Company Name]
                        </p>
                    </div>
                    <div class="p-3">
                        <a href="javascript:void(0);" class="link text-muted text-start">Click the link below to know
                            more</a>
                    </div>
                    <div class="p-2 text-center">
                        <a href="javascript:void(0);" class="card-link link-dark">Visit Our Website Now <i
                                class="bx bx-link-external align-middle ms-1 lh-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
    $('.scheduledatetimebtn').on('click', function() {
        const $datediv = $('#datediv');
        if ($datediv.hasClass('d-none')) {
            $datediv.removeClass('d-none');
        } else {
            $datediv.addClass('d-none');
        }
    });


    $('.immeditate').on('click', function() {
        const $datediv = $('#datediv');
        if ($datediv.hasClass('d-none')) {
            $datediv.addClass('d-none');
        } else {
            $datediv.addClass('d-none');
        }
    });
});

</script>
@endsection
