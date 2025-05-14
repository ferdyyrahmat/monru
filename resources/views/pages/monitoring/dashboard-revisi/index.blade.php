@extends('layout.master')
@section('main-content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Monitoring
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">employee</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">monitoring</li>
                    <!--end::Item-->
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-sm d-flex flex-column flex-column-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Pilih Department</h6>
                    </div>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row row-cols-2 row-cols-md-3">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($department as $item)
                                    <div class="col">
                                        <!--begin::Option-->
                                        <input type="radio" class="btn-check sub-dept" name="department" value="{{ $item->id }}"
                                            id="kt_radio_buttons_2_option_{{ $no }}" />
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-primary btn-active-color-white p-7 d-flex mb-5"
                                            for="kt_radio_buttons_2_option_{{ $no++ }}">
                                            <span
                                                class="text-center d-flex align-items-center justify-content-center fw-semibold">
                                                <span class="fw-bold fs-3"> {{ $item->name }}</span>
                                            </span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" id="btn_show" onclick="showData()">Open</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    <script>
        function showData() {
            var id = $('input[name="department"]:checked').val(); // This gets the selected department ID
            
            // Check if no department is selected
            if (!id) {
                alert('Please select a department before proceeding.');
                return; // Exit the function if no department is selected
            }
            const URL = "{{ route('v1.monitoring.revisi.show', ':id') }}"; // Construct the URL with the ID
            window.location.href = URL.replace(':id', id);
        }
    </script>
@endsection