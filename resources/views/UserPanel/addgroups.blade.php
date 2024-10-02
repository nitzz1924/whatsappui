{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>All Groups</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2">
                            <h4 class="mb-sm-0">Groups</h4>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <div class="px-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                    class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #116464"><i class="mdi mdi-plus me-2"></i>New Group</a>
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
                                    <th style="background-color:#1164642b;">Type</th>
                                    <th style="background-color:#1164642b;">Status</th>
                                    <th style="background-color:#1164642b;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($groupsdata as $index => $data)
                                <tr class="border-bottom-1">
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->label }}</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModaledit"
                                                data-value="{{ json_encode($data) }}"
                                                class="editbtnmodal btn btn-light btn-sm"><i class="ri-edit-2-line"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"></i>
                                            </a>
                                            <a href="#" onclick="confirmDelete('{{ $data->id }}')"
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
<div id="myModal" class="modal flip" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="{{ route('insertgroups') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4" style="border: 0.1rem solid #116464;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Add New Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="placeholderInput" class="form-label  fs-5">Select Type</label>
                                <div class="mb-3"> <select class="form-select  rounded-4 py-2"
                                        aria-label="Default select example" name="type">
                                        <option value="">--select type--</option>
                                        <option value="Group">Group</option>
                                        <option value="Status">Status</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="placeholderInput" class="form-label fs-5">Label</label>
                                    <input type="text" name="label" class="form-control rounded-4 py-2"
                                        id="placeholderInput" placeholder="Enter Label">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  text-white rounded-4 waves-effect waves-light"
                        style="background-color: #116464">Create Group</button>
                </div>
            </div>

        </div>
    </form>
</div>
<div id="myModaledit" class="modal flip" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="{{ route ('updategroups') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4" style="border: 0.1rem solid #116464;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body" id="modalbodyedit">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  text-white rounded-4 waves-effect waves-light"
                        style="background-color: #116464">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this group?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#116464",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/deletegroup/" + id;
                }
            });
    }
</script>
<script>
    // Edit Functionality
    const groups = @json($groupsdata);
    $('#table-body').on('click', '.editbtnmodal', function() {
        console.log("clicked");
        const groupdata = $(this).data('value');
        console.log(groupdata);
        $('#modalbodyedit').empty();

        let selects = `<option value="">--select groups--</option>`;
        groups.forEach(function(row) {
            selects +=
                `<option value="${row.type}" ${groupdata.type === row.type ? 'selected' : ''}>${row.type}</option>`;
        });
        const modalbody = `
             <div>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="placeholderInput" class="form-label  fs-5">Select Type</label>
                        <div class="mb-3">
                            <select class="form-select  rounded-4 py-2" aria-label="Default select example" name="type">
                                 ${selects}
                            </select>
                        </div>
                        <input type="hidden" name="groupid" value="${groupdata.id}" id="">
                        <div>
                            <label for="placeholderInput" class="form-label fs-5">Label</label>
                            <input type="text" name="label"
                                class="form-control rounded-4 py-2"
                                id="placeholderInput" placeholder="Enter Label" value="${groupdata.label}">
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Append the modal body content
        $('#modalbodyedit').append(modalbody);
    });
</script>
@endsection
