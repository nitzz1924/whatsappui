{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>All Contacts</title>
@endpush
@section('content')
<div class="container-fluid">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <style>
        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left !important;
        }

        .color-picker-container {
            display: flex;
            gap: 10px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Contacts</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            {{-- <div class="px-2"> <select class="form-select accountstatus"
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
                                </select></div> --}}
                            <div class="px-2">
                                <a href="{{ route('addnewautomation') }}"
                                    class="btn text-white rounded-4 waves-effect waves-light" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                    style="background-color: #054c44"><i class="mdi mdi-plus me-2"></i>New Contact</a>

                                {{-- <a href="{{ route('getscheduledcam') }}"
                                    class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464"><i class="mdi mdi-plus me-2"></i>Testing
                                    Schedule</a> --}}
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
                        <table id="example" class="table table-hover table-borderless table-nowrap">
                            <thead>
                                <tr>
                                    <th style="background-color:#1164642b; border-radius: 10px 0 0 10px;">S.No</th>
                                    <th style="background-color:#1164642b;">Name</th>
                                    <th style="background-color:#1164642b;">Type</th>
                                    <th style="background-color:#1164642b;">Email</th>
                                    <th style="background-color:#1164642b;">Phone Number</th>
                                    <th style="background-color:#1164642b; border-radius: 0px 10px 10px 0px;">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($contactsdata as $index => $data)
                                <tr class="border-bottom-1">
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $data->fullname }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phonenumber }}</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                data-value="{{ json_encode($data) }}"
                                                class="editbtnmodal btn btn-light btn-sm"><i class="ri-edit-2-line"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"></i></a>
                                            <a href="#" onclick="confirmDelete('{{ $data->id }}', '{{ $data->fullname }}')"
                                                class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></a>
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
    <div class="offcanvas-header" style="background-color: #054c44">
        <h5 id="offcanvasRightLabel" class="text-white">Contact Creation</h5>
        <div class="d-flex justify-content-end align-items-center">
            <a href="#" class="text-light fs-4" data-bs-dismiss="offcanvas" aria-label="Close"><i class=" ri-close-fill"></i></a>
        </div>
    </div>
    <div class="p-3">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-black text-start fs-5">Bulk upload of Contacts</p>
                <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-cols-lg-auto g-3 align-items-center">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="file" name="file" id="file" class="form-control" placeholder="Username"
                                    required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn text-white rounded-4 waves-effect waves-light"
                                style="background-color: #054c44">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-2">
                <a href="{{asset('assets/images/demos/contactsdemo.xlsx')}}" download="Sample Data of Contacts">
                    <button class="btn btn-outline-dark btn-sm rounded-4">
                        <i class="ri-download-2-fill"></i>&nbsp;Download Sample Excel of Contacts
                    </button>
                </a>
            </div>

        </div>
    </div>
    <form action="{{ route('insertcontacts') }}" method="POST">
        @csrf
        <div class="offcanvas-body">
            <div class="" id="contact-view-detail">
                <div class="card-body">
                    <div class="mt-0">
                        <p class="text-black text-start fs-5">Enter details to create Contact</p>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="">
                                    <label for="autoCompleteFruit" class="form-label">Select Type</label>
                                    <select class="form-select rounded-4" aria-label="Default select example"
                                        name="type">
                                        <option selected>--Select Type--</option>
                                        @foreach ($groupsdata as $row)
                                        <option value="{{ $row->label }}">{{ $row->label }}</option>
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
                                <label for="placeholderInput" class="form-label">Mobile Number</label>
                                <div class="input-group rounded-4">
                                    <span class="input-group-text" id="basic-addon1">+91</span>
                                    <input type="text" name="phonenumber" class="form-control"
                                        placeholder="Enter Phone Number" aria-label="Enter Phone Number"
                                        aria-describedby="basic-addon1">
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
                                    <option value="en-US">English</option>
                                    <option value="es">Spanish</option>
                                    <option value="pt-BR">Portuguese</option>
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
                                    <option value="ur">Urdu</option>
                                    <option value="gu">Gujarati</option>
                                    <option value="fa">Persian</option>
                                    <option value="nl">Dutch</option>
                                    <option value="pl">Polish</option>
                                    <option value="ro">Romanian</option>
                                    <option value="zh-TW">Chinese</option>
                                    <option value="ms">Malay</option>
                                    <option value="he">Hebrew</option>
                                    <option value="cs">Czech</option>
                                    <option value="sw">Swahili</option>
                                    <option value="uk">Ukrainian</option>
                                    <option value="th">Thai</option>
                                    <option value="hu">Hungarian</option>
                                    <option value="sk">Slovak</option>
                                    <option value="pa">Punjabi</option>
                                    <option value="ta">Tamil</option>
                                    <option value="te">Telugu</option>
                                    <option value="ml">Malayalam</option>
                                    <option value="kn">Kannada</option>
                                    <option value="af">Afrikaans</option>
                                    <option value="sq">Albanian</option>
                                    <option value="az">Azerbaijani</option>
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
                                    <option value="sr">Serbian</option>
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
                <div class="d-flex justify-content-start align-items-center mt-3">
                    <button type="submit" class="btn text-white rounded-4 waves-effect waves-light"
                        style="background-color: #054c44">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="myModal" class="modal flip" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="{{ route('updatecontact') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4" style="border: 0.1rem solid #054c44;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body" id="modalbodyedit">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  text-white rounded-4 waves-effect waves-light"
                        style="background-color: #054c44">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },

        });
    });
</script>
<script>
    // Edit Functionality
        $('#table-body').on('click', '.editbtnmodal', function() {
            console.log("clicked");
            const contact = $(this).data('value');
            const finalnumber = contact.phonenumber.replace(/\+91/g, '').trim(); // removing +91 while editing
            console.log(finalnumber);
            $('#modalbodyedit').empty();
            const modalbody = `
                 <div class="mt-0">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="">
                                <label for="autoCompleteFruit" class="form-label">Select Type</label>
                                <select class="form-select rounded-4" aria-label="Default select example"
                                    name="type">
                                    <option selected>--Select Type--</option>
                                    @foreach ($groupsdata as $row)
                                    <option value="{{ $row->label }}" ${contact.type === '{{ $row->label }}' ? 'selected' : ''}>{{ $row->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="contactid" value="${contact.id}" id="">
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="placeholderInput" class="form-label">Name</label>
                                <input type="text" class="form-control rounded-4" id="placeholderInput"
                                    placeholder="Enter Name" name="fullname" value="${contact.fullname}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="placeholderInput" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-4" id="placeholderInput"
                                    placeholder="Enter Email Address" name="email" value="${contact.email}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="placeholderInput" class="form-label">Mobile Number</label>
                            <div class="input-group rounded-4">
                                <span class="input-group-text" id="basic-addon1">+91</span>
                                <input type="text" name="phonenumber" class="form-control"
                                    placeholder="Enter Phone Number" aria-label="Enter Phone Number"
                                    aria-describedby="basic-addon1"  value="${finalnumber}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <div>
                                <label for="placeholderInput" class="form-label">City</label>
                                <input type="text" class="form-control rounded-4" id="placeholderInput"
                                    placeholder="Enter City" name="city"  value="${contact.city}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="placeholderInput" class="form-label">State</label>
                                <input type="text" class="form-control rounded-4" id="placeholderInput"
                                    placeholder="Enter State" name="state"  value="${contact.state}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <label for="placeholderInput" class="form-label">Country</label>
                                <input type="text" class="form-control rounded-4" id="placeholderInput"
                                    placeholder="Enter Country" name="country" value="${contact.country}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="autoCompleteFruit" class="form-label">Select Language</label>
                            <select class="form-select rounded-4" name="language"aria-label="Default select example" name="type">
                                    <option selected>--Select Language--</option>
                                    <option value="en-US" ${contact.language == 'English' ? 'selected' : ''}>English</option>
                                    <option value="es" ${contact.language == 'Spanish' ? 'selected' : ''}>Spanish</option>
                                    <option value="pt-BR" ${contact.language == 'Portuguese' ? 'selected' : ''}>Portuguese</option>
                                    <option value="ru" ${contact.language == 'Russian' ? 'selected' : ''}>Russian</option>
                                    <option value="id" ${contact.language == 'Indonesian' ? 'selected' : ''}>Indonesian</option>
                                    <option value="ar" ${contact.language == 'Arabic' ? 'selected' : ''}>Arabic</option>
                                    <option value="fr" ${contact.language == 'French' ? 'selected' : ''}>French</option>
                                    <option value="de" ${contact.language == 'German' ? 'selected' : ''}>German</option>
                                    <option value="tr" ${contact.language == 'Turkish' ? 'selected' : ''}>Turkish</option>
                                    <option value="it" ${contact.language == 'Italian' ? 'selected' : ''}>Italian</option>
                                    <option value="hi" ${contact.language == 'Hindi' ? 'selected' : ''}>Hindi</option>
                                    <option value="bn" ${contact.language == 'Bengali' ? 'selected' : ''}>Bengali</option>
                                    <option value="mr" ${contact.language == 'Marathi' ? 'selected' : ''}>Marathi</option>
                                    <option value="ur" ${contact.language == 'Urdu' ? 'selected' : ''}>Urdu</option>
                                    <option value="gu" ${contact.language == 'Gujarati' ? 'selected' : ''}>Gujarati</option>
                                    <option value="fa" ${contact.language == 'Persian' ? 'selected' : ''}>Persian</option>
                                    <option value="nl" ${contact.language == 'Dutch' ? 'selected' : ''}>Dutch</option>
                                    <option value="pl" ${contact.language == 'Polish' ? 'selected' : ''}>Polish</option>
                                    <option value="ro" ${contact.language == 'Romanian' ? 'selected' : ''}>Romanian</option>
                                    <option value="zh-TW" ${contact.language == 'Chinese' ? 'selected' : ''}>Chinese</option>
                                    <option value="ms" ${contact.language == 'Malay' ? 'selected' : ''}>Malay</option>
                                    <option value="he" ${contact.language == 'Hebrew' ? 'selected' : ''}>Hebrew</option>
                                    <option value="cs" ${contact.language == 'Czech' ? 'selected' : ''}>Czech</option>
                                    <option value="sw" ${contact.language == 'Swahili' ? 'selected' : ''}>Swahili</option>
                                    <option value="uk" ${contact.language == 'Ukrainian' ? 'selected' : ''}>Ukrainian</option>
                                    <option value="th" ${contact.language == 'Thai' ? 'selected' : ''}>Thai</option>
                                    <option value="hu" ${contact.language == 'Hungarian' ? 'selected' : ''}>Hungarian</option>
                                    <option value="sk" ${contact.language == 'Slovak' ? 'selected' : ''}>Slovak</option>
                                    <option value="pt-PT" ${contact.language == 'Portuguese' ? 'selected' : ''}>Portuguese</option>
                                    <option value="pa" ${contact.language == 'Punjabi' ? 'selected' : ''}>Punjabi</option>
                                    <option value="ta" ${contact.language == 'Tamil' ? 'selected' : ''}>Tamil</option>
                                    <option value="te" ${contact.language == 'Telugu' ? 'selected' : ''}>Telugu</option>
                                    <option value="ml" ${contact.language == 'Malayalam' ? 'selected' : ''}>Malayalam</option>
                                    <option value="kn" ${contact.language == 'Kannada' ? 'selected' : ''}>Kannada</option>
                                    <option value="af" ${contact.language == 'Afrikaans' ? 'selected' : ''}>Afrikaans</option>
                                    <option value="sq" ${contact.language == 'Albanian' ? 'selected' : ''}>Albanian</option>
                                    <option value="az" ${contact.language == 'Azerbaijani' ? 'selected' : ''}>Azerbaijani</option>
                                    <option value="bg" ${contact.language == 'Bulgarian' ? 'selected' : ''}>Bulgarian</option>
                                    <option value="ca" ${contact.language == 'Catalan' ? 'selected' : ''}>Catalan</option>
                                    <option value="hr" ${contact.language == 'Croatian' ? 'selected' : ''}>Croatian</option>
                                    <option value="da" ${contact.language == 'Danish' ? 'selected' : ''}>Danish</option>
                                    <option value="et" ${contact.language == 'Estonian' ? 'selected' : ''}>Estonian</option>
                                    <option value="fil" ${contact.language == 'Filipino' ? 'selected' : ''}>Filipino</option>
                                    <option value="fi" ${contact.language == 'Finnish' ? 'selected' : ''}>Finnish</option>
                                    <option value="el" ${contact.language == 'Greek' ? 'selected' : ''}>Greek</option>
                                    <option value="ja" ${contact.language == 'Japanese' ? 'selected' : ''}>Japanese</option>
                                    <option value="kk" ${contact.language == 'Kazakh' ? 'selected' : ''}>Kazakh</option>
                                    <option value="ko" ${contact.language == 'Korean' ? 'selected' : ''}>Korean</option>
                                    <option value="lo" ${contact.language == 'Lao' ? 'selected' : ''}>Lao</option>
                                    <option value="lv" ${contact.language == 'Latvian' ? 'selected' : ''}>Latvian</option>
                                    <option value="lt" ${contact.language == 'Lithuanian' ? 'selected' : ''}>Lithuanian</option>
                                    <option value="mk" ${contact.language == 'Macedonian' ? 'selected' : ''}>Macedonian</option>
                                    <option value="no" ${contact.language == 'Norwegian' ? 'selected' : ''}>Norwegian</option>
                                    <option value="sr" ${contact.language == 'Serbian' ? 'selected' : ''}>Serbian</option>
                                    <option value="sl" ${contact.language == 'Slovenian' ? 'selected' : ''}>Slovenian</option>
                                    <option value="sv" ${contact.language == 'Swedish' ? 'selected' : ''}>Swedish</option>
                                    <option value="uz" ${contact.language == 'Uzbek' ? 'selected' : ''}>Uzbek</option>
                                    <option value="vi" ${contact.language == 'Vietnamese' ? 'selected' : ''}>Vietnamese</option>
                                    <option value="ga" ${contact.language == 'Irish' ? 'selected' : ''}>Irish</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="exampleFormControlTextarea5"
                                        class="form-label rounded-4">Address</label>
                                    <textarea class="form-control" name="address" placeholder="Your Full Address"
                                        id="exampleFormControlTextarea5" rows="3">${contact.address}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            $('#modalbodyedit').append(modalbody);
        });
</script>
@endsection
<script>
    function confirmDelete(id,contactname) {
        Swal.fire({
                title: "Are you sure?",
                html: "You want to delete <strong style='color: red;'>" + contactname + "'s Contact</strong>?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#116464",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/deletecontact/" + id;
                }
            });
    }
</script>
