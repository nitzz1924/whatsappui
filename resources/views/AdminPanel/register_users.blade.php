
{{--#“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
@section('title', 'User Registration')
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
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route('insertregisterusers') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">User ID</label>
                                            <input type="number" name="userid" class="form-control"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" name="mobilenumber" class="form-control"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">Expire Date</label>
                                            <input type="date" name="expiredate" class="form-control"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label class="form-label">Created Date</label>
                                            <input type="date" name="createddate" class="form-control"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6 d-flex align-items-end">
                                        <div class="">
                                            <button type="submit"
                                                class="btn btn-success waves-effect waves-light">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@if (session('success'))
<script>
    // Display SweetAlert for success message
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        buttonsStyling: true,
        showCancelButton: true,
        showCloseButton: true,
    });
</script>
@endif

@if (session('error'))
<script>
    // Display SweetAlert for error message
    Swal.fire({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error",
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        buttonsStyling: true,
        showCloseButton: true,
    });
</script>
@endif
