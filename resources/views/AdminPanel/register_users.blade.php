
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
                            <form action="#" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">User ID</label>
                                            <input type="text" class="form-control" id="placeholderInput"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="placeholderInput"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="placeholderInput"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="placeholderInput"
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Expire Date</label>
                                            <input type="date" class="form-control" id="placeholderInput"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Created Date</label>
                                            <input type="date" class="form-control" id="placeholderInput"
                                                placeholder="Enter User ID">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6 d-flex align-items-end">
                                        <div class="">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
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
