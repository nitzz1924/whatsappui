{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>All Contacts</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Contacts</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2"> <select class="form-select accountstatus"
                                    aria-label="Default select example">
                                    <option selected>--Filter by Groups--</option>
                                    <option>A</option>
                                    <option>B</option>
                                </select></div>
                            <div class="px-2"> <select class="form-select accountstatus"
                                    aria-label="Default select example">
                                    <option selected>--Filter by Status--</option>
                                    <option>A</option>
                                    <option>B</option>
                                </select></div>
                            <div class="px-2">
                                <a href="{{ route('addnewautomation') }}"
                                    class="btn text-white rounded-4 waves-effect waves-light" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                    style="background-color: #116464"><i class="mdi mdi-plus me-2"></i>New Contact</a>
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
                                    <th style="background-color:#1164642b;">Email</th>
                                    <th style="background-color:#1164642b;">Phone Number</th>
                                    <th style="background-color:#1164642b;">Status</th>
                                    <th style="background-color:#1164642b; border-radius: 0px 10px 10px 0px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($contactsdata as $index => $data)
                                <tr class="border-bottom-1">
                                    <th>{{$index + 1}}</th>
                                    <td>{{$data->fullname}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phonenumber}}</td>
                                    @if($data->status=='Active')
                                    <td>
                                        <span class="badge bg-success-subtle text-success badge-border">Active</span>
                                    </td>
                                    @endif
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-record="" class="link-success editbtnmodal fs-15"><i
                                                    class="ri-edit-2-line" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Edit"></i></a>
                                            <a href="#" onclick="" class="link-danger fs-15"><i
                                                    class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
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
<div class="offcanvas offcanvas-end mycustomcanvascontacts" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <form action="{{ route('insertcontacts') }}" method="POST">
        @csrf
        <div class="offcanvas-header" style="background-color: #1164641e">
            <h5 id="offcanvasRightLabel">Contact Creation</h5>
            <divl class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-sm text-white rounded-4 waves-effect waves-light"
                    style="background-color: #116464">Create Contact</>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </divl>
        </div>
        <div class="offcanvas-body">
            <div class="" id="contact-view-detail">
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-black text-start fs-5">Bulk upload of Contacts</p>
                                <form action="javascript:void(0);">
                                    <div class="row row-cols-lg-auto g-3 align-items-center">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="file" class="form-control"
                                                    id="inlineFormInputGroupUsername" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn text-white rounded-4 waves-effect waves-light"
                                                style="background-color: #116464">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-black text-start fs-5">Manually fill up details</p>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="">
                                    <label for="autoCompleteFruit" class="form-label">Select Type</label>
                                    <select class="form-select rounded-4" aria-label="Default select example"
                                        name="type">
                                        <option selected>--Select Type--</option>
                                        @foreach ($groupsdata as $row)
                                        <option value="{{$row->label}}">{{$row->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">Name</label>
                                    <input type="text" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter Name" name="fullname">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">Email</label>
                                    <input type="email" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter Phone Number" name="phonenumber">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">City</label>
                                    <input type="text" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter City" name="city">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">State</label>
                                    <input type="text" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter State" name="state">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <label for="placeholderInput" class="form-label">Country</label>
                                    <input type="text" class="form-control rounded-4" id="placeholderInput"
                                        placeholder="Enter Country" name="country">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="autoCompleteFruit" class="form-label">Select Language</label>
                                <select class="form-select rounded-4" name="language"
                                    aria-label="Default select example" name="type">
                                    <option selected>--Select Language--</option>
                                    <option value="en-US">English (US)</option>
                                    <option value="es">Spanish</option>
                                    <option value="pt-BR">Portuguese - Brazil</option>
                                    <option value="ru">Russian</option>
                                    <option value="id">Indonesian</option>
                                    <option value="ar">Arabic</option>
                                    <option value="fr">French</option>
                                    <option value="de">German</option>
                                    <option value="tr">Turkish</option>
                                    <option value="it">Italian</option>
                                    <option value="hi">Hindi</option>
                                    <option value="bn">Bengali</option>
                                    <option value="mr">Marathi</option>
                                    <option value="ur">Urdu - Pakistan</option>
                                    <option value="gu">Gujarati</option>
                                    <option value="fa">Persian</option>
                                    <option value="nl">Dutch</option>
                                    <option value="pl">Polish</option>
                                    <option value="ro">Romanian</option>
                                    <option value="zh-TW">Chinese (Traditional) - Taiwan</option>
                                    <option value="zh-HK">Chinese (Traditional) - Hong Kong</option>
                                    <option value="ms">Malay</option>
                                    <option value="he">Hebrew</option>
                                    <option value="cs">Czech</option>
                                    <option value="sw">Swahili</option>
                                    <option value="uk">Ukrainian</option>
                                    <option value="th">Thai</option>
                                    <option value="zh-CN">Chinese (Simplified) - China</option>
                                    <option value="hu">Hungarian</option>
                                    <option value="sk">Slovak</option>
                                    <option value="pt-PT">Portuguese - Portugal</option>
                                    <option value="pa">Punjabi</option>
                                    <option value="ta">Tamil</option>
                                    <option value="te">Telugu</option>
                                    <option value="ml">Malayalam</option>
                                    <option value="kn">Kannada</option>
                                    <option value="af">Afrikaans</option>
                                    <option value="sq">Albanian</option>
                                    <option value="az">Azerbaijani - latn</option>
                                    <option value="bg">Bulgarian</option>
                                    <option value="ca">Catalan</option>
                                    <option value="hr">Croatian</option>
                                    <option value="da">Danish</option>
                                    <option value="et">Estonian</option>
                                    <option value="fil">Filipino</option>
                                    <option value="fi">Finnish</option>
                                    <option value="el">Greek</option>
                                    <option value="ja">Japanese</option>
                                    <option value="kk">Kazakh</option>
                                    <option value="ko">Korean</option>
                                    <option value="lo">Lao</option>
                                    <option value="lv">Latvian</option>
                                    <option value="lt">Lithuanian</option>
                                    <option value="mk">Macedonian</option>
                                    <option value="no">Norwegian</option>
                                    <option value="sr">Serbian - Cyrillic/Latin</option>
                                    <option value="sl">Slovenian</option>
                                    <option value="sv">Swedish</option>
                                    <option value="uz">Uzbek</option>
                                    <option value="vi">Vietnamese</option>
                                    <option value="ga">Irish</option>
                                </select>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="exampleFormControlTextarea5"
                                            class="form-label rounded-4">Address</label>
                                        <textarea class="form-control" name="address" placeholder="Your Full Address"
                                            id="exampleFormControlTextarea5" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
