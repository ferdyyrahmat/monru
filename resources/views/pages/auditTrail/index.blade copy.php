<!DOCTYPE html>
<html lang="en">
<head>
    <base href="" />
    <title>Monitoring Ruangan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo_only.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="{{ asset('assets/css/inter_font_api.css') }}" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

</head>
<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-fixed="true"
    data-kt-app-toolbar-enabled="true" class="app-default">

    <!--begin::Page loading(append to body)-->
    <div class="page-loading">
        <div class="page-loader flex-column bg-dark bg-opacity-25">
            <span class="spinner-border text-primary" role="status"></span>
            <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
        </div>
    </div>
    <!--end::Page loading-->

    <script>
        // Theme mode setup script...
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="kt_app_header" class="app-header" data-kt-sticky="true">
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                        <a href="#">
                            <img alt="Logo" src="{{asset('assets/logo/kalbe_farma_svg.svg')}}" class="h-50px app-sidebar-logo-default theme-light-show" />
                        </a>
                    </div>
                    <div class="app-navbar flex-shrink-0">
                        <div class="app-navbar-item ms-1 ms-md-4" id="idle_time_display">
                            <span id="idle_time" class="text-muted">Idle Time: 00:00</span>
                        </div>
                        <div class="app-navbar-item ms-1 ms-md-4">
                            <button class="btn btn-light-danger btn-lg" onclick="backTo('dashboard')">
                                <i class="ki-solid ki-exit-left fs-1"></i> Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <div class="card card-flush">
                                    <div class="card-header border-0 pt-6">
                                        <div class="card-title">
                                            <h3>Audit Trail</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table_audit" class="table table-bordered align-middle table-row-dashed fs-6 gy-5" style="width:100%">
                                            <thead>
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th>#</th>
                                                    <th>Perusahaan</th>
                                                    <th>User</th>
                                                    <th>Action</th>
                                                    <th>Description</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th>#</th>
                                                    <th>Perusahaan</th>
                                                    <th>User</th>
                                                    <th>Action</th>
                                                    <th>Description</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2025&copy;</span>
                                <a href="" target="_blank" class="text-gray-800 text-hover-primary">Manufacturing Technology Development</a>
                            </div>
                            <!--end::Copyright-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    
    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const auditUrl = "{{ route('audit') }}";

        $(document).ready(function() {
            $('.page-loading').fadeIn();
            setTimeout(function() {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            $("#table_audit").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: auditUrl,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "compName" },
                    { data: "user" },
                    { data: "action" },
                    { data: "description" },
                    { data: "created_at" },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1; // Calculate the row index
                        },
                    },
                ],
            });
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        function backTo(route) {
            // Redirect to the dashboard route
            window.location.href = route;
        }
        // $('#table_audit').DataTable({
        //     layout: {
        //         topEnd: {
        //             search: {
        //                 placeholder: 'Type anything here'
        //             }
        //         },
        //         bottomEnd: {
        //             paging: {
        //                 type: 'simple'
        //             },
        //         },
        //     },
        //     initComplete: function () {
        //         var btns = $('.dt-button');
        //         btns.removeClass('dt-button');
        //         btns.removeClass('dt-button');
        //     },
        //     responsive: true,
        //     lengthMenu: [
        //         [25, 50, 100],
        //         [25, 50, 100]
        //     ],
        //     keys: true,
        // });
    </script>
</body>
</html>