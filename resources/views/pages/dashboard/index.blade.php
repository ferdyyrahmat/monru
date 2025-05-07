@extends('layout.master')
@section('main-content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container">
            <div class="card card-flush shadow-sm border-0">
                <div class="card-body">
                    <div class="text-center my-10">
                        <span id="kt_typedjs_example_1" class="fs-2 d-block mb-2">Dashboard</span>
                        <h1 class="fw-bold text-dark mt-2">Formulir Monitoring Ruangan</h1>
                        <p class="text-gray-700 fs-4">Pantau kondisi Suhu, RH, dan DP</p>
                    </div>

                    <div class="text-center mt-10 mb-5">
                        <h2 id="current-date" class="fw-semibold text-gray-700"></h2>
                    </div>

                    <div class="text-center my-10">
                        <div class="badge badge-light-dark p-5 fs-6 fw-semibold shadow-sm">
                            CR-443.01 / SOP-QA-G034
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
        document.addEventListener('DOMContentLoaded', function () {
            const currentDateElement = document.getElementById('current-date');
            const today = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            currentDateElement.textContent = today.toLocaleDateString('id-ID', options);
        });
    </script>
@endsection