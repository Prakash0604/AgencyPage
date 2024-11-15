@extends('Admin.index')
@section('content')
    <div class="container-fluid">
        <div class="main-panel">
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="home-tab">
                            {{-- <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                            role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences"
                                            role="tab" aria-selected="false">Audiences</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics"
                                            role="tab" aria-selected="false">Demographics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                            role="tab" aria-selected="false">More</a>
                                    </li>
                                </ul>
                                <div>
                                    <div class="btn-wrapper">
                                        <a href="#" class="btn btn-otline-dark align-items-center"><i
                                                class="icon-share"></i> Share</a>
                                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i>
                                            Print</a>
                                        <a href="#" class="btn btn-primary text-white me-0"><i
                                                class="icon-download"></i> Export</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div
                                                class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Total User</p>
                                                    <h3 class="rate-percentage">{{ $totaluser }}</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">Admin</p>
                                                    <h3 class="rate-percentage">{{ $admin }}</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">User</p>
                                                    <h3 class="rate-percentage">{{ $user }}</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <p class="statistics-title">Total Post</p>
                                                    <h3 class="rate-percentage">{{ $post }}</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <p class="statistics-title">Total Comment</p>
                                                    <h3 class="rate-percentage">68.8</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <p class="statistics-title">Avg. Time on Site</p>
                                                    <h3 class="rate-percentage">2m:35s</h3>
                                                    <p class="text-success d-flex"><i
                                                            class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                                    <div class="card card-rounded">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-sm-flex justify-content-between align-items-start">
                                                                <div>
                                                                    <h4 class="card-title card-title-dash">Performance Line
                                                                        Chart</h4>
                                                                    <h5 class="card-subtitle card-subtitle-dash">Lorem
                                                                        Ipsum is simply dummy text of the printing</h5>
                                                                </div>
                                                                <div id="performanceLine-legend"></div>
                                                            </div>
                                                            <div class="chartjs-wrapper mt-4">
                                                                <canvas id="performanceLine" width=""></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex flex-column">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Leave
                                                                            Report</h4>
                                                                    </div>
                                                                    <div>
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                                type="button"
                                                                                id="dropdownMenuButton3"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> Month Wise
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton3">
                                                                                <h6 class="dropdown-header">week Wise
                                                                                </h6>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Year Wise</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <canvas id="leaveReport"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
    </div>
@endsection
