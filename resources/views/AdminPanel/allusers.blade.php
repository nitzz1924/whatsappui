
{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
@section('title', 'All Users')
<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@yield('title')</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@yield('title')</h4>
                            <div class="form-inline float-md-end">
                                <a href="{{ route('userregister') }}" class="btn btn-success waves-effect waves-light"><i
                                class="mdi mdi-plus me-2"></i> Add New User</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User ID</th>
                                        <th>Created Date</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Expire Date</th>
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($allusers as $index => $data)
                                    <tr>
                                        <th>{{$index + 1}}</th>
                                        <td>{{$data->userid}}</td>
                                        <td>{{$data->createddate}}</td>
                                        <td>{{$data->mobilenumber}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->expiredate}}</td>
                                        <td>
                                            <select class="form-select accountstatus" aria-label="Default select example">
                                                <option selected>--select-account-status</option>
                                                <option value="Enable" {{ $data->accountstatus == 'Enable' ? 'selected' : '' }}>Enable</option>
                                                <option value="Disable" {{ $data->accountstatus == 'Disable' ? 'selected' : '' }}>Disable</option>
                                            </select>
                                            <input type="hidden" name="userid" value="{{ $data->id }}"
                                            class="userid">
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                data-record="{{ json_encode($data) }}" class="link-success editbtnmodal fs-15"><i
                                                        class="ri-edit-2-line"  data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Edit"></i></a>
                                                <a href="#" onclick="confirmDelete('{{ $data->id }}')"
                                                    class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
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
    <div class="modal flip" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateuser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbody">
                        {{-- Modal Body Appends here --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        })
        .then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete route
                window.location.href = "/deleteregisteruser/" + id;
            }
            // No action on cancel
        });
    }
</script>
<!--Account Status-->
<script>
    $(document).ready(function() {
        var leadid;
        $('#table-body').on('change', '.accountstatus', function() {
            var selectedStatus = $(this).val();
            var userid = $(this).closest('tr').find('.userid').val();

            Swal.fire({
                title: "Update Account Status",
                text: "Are you sure you want to update the Account status?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/updateaccountstatus',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: selectedStatus,
                            record_id: userid
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("Success", "Account status updated successfully.", "success");
                            } else {
                                Swal.fire("Error", "Failed to update Account status.", "error");
                            }
                        },
                        error: function() {
                            Swal.fire("Error", "An error occurred.", "error");
                        }
                    });
                }
            });
        });
    });
</script>
<!--Edit Functionality-->
<script>
    $('#table-body').on('click', '.editbtnmodal', function() {
        var userdata = $(this).data('record');
        console.log(userdata);
        $('#modalbody').empty();

        var modalbody = `
            <div class="card-body">
                <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">User ID</label>
                                    <input type="number" name="userid" class="form-control"
                                        placeholder="Enter User ID" disabled value="${userdata.userid}">
                                        <input type="hidden" name="userid" value="${userdata.id}" id="">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control"
                                        placeholder="Enter New Password" autocomplete="off" value="${userdata.password}">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="mobilenumber" class="form-control"
                                        placeholder="Enter Mobile Number"  value="${userdata.mobilenumber}">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter Email" value="${userdata.email}">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">Expire Date</label>
                                    <input type="date" name="expiredate" class="form-control"
                                        placeholder="Enter User ID" value="${userdata.expiredate}">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div>
                                    <label class="form-label">Created Date</label>
                                    <input type="date" name="createddate" class="form-control"
                                        placeholder="Enter User ID" value="${userdata.createddate}">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        `;
        $('#modalbody').append(modalbody);
    });
</script>

