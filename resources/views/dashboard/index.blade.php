@extends('dashboard.layouts.main')
@section('content.dashboard')
    <!--wrapper-->
    <div class="wrapper">

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="card radius-10">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><strong>{{ $users->count() }}</strong></h5>
                                    <div class="ms-auto">
                                        <i class='bx bxs-user fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h6 class="mb-0">Total Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><strong>{{ $barangs->count() }}</strong></h5>
                                    <div class="ms-auto">
                                        <i class='bx bxs-box fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h6 class="mb-0">Total Product</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><strong>{{ $totalGaransiAktif }}</strong></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-time fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h6 class="mb-0">Total Garansi Aktif</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><strong>{{ $totalGaransiBerakhir }}</strong></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-time-five fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h6 class="mb-0">Total Garansi Expired</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
@endsection
