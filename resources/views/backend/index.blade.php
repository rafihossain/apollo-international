@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row"> 
    <div class="col-md-6">
        <div class="card">
            <div class="card-body"> 

                <h4 class="header-title mt-0 mb-4">Total view</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="58"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                        <p class="text-muted mb-1">Total view</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
 

                <h4 class="header-title mt-0 mb-3">Total Booking</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1"> 8451 </h2>
                        <p class="text-muted mb-3">Booking</p>
                    </div>
                    <div class="progress progress-bar-alt-success progress-sm">
                        <div class="progress-bar bg-success" role="progressbar"
                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                style="width: 77%;">
                            <span class="visually-hidden">77% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
          

                <h4 class="header-title mt-0 mb-4">Subscription </h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                data-bgColor="#FFE6BA" value="80"
                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                data-thickness=".15"/>
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
   

                <h4 class="header-title mt-0 mb-3">Our Members</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-pink rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1"> 158 </h2>
                        <p class="text-muted mb-3">Revenue today</p>
                    </div>
                    <div class="progress progress-bar-alt-pink progress-sm">
                        <div class="progress-bar bg-pink" role="progressbar"
                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                style="width: 77%;">
                            <span class="visually-hidden">77% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- end col -->

</div>
<!-- end row -->
@endsection