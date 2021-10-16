@extends("layouts.admin")

@section("title", "Dashboard")

@section("content")

<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Dashboard</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="index.html">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
</ul>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right"> Products Available</h6>
                    <h4 class="text-right"><i
                            class="fas fa-cart-plus pull-left bg-indigo c-icon"></i><span>{{ $product }}</span>
                    </h4>

                    <p class="mb-0 mt-3 text-muted">
                        Number of products available
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right">Out of Stock Products</h6>
                    <h4 class="text-right"><i
                            class="fas fa-users pull-left bg-cyan c-icon"></i><span>{{ $pro_out_stock }}</span>
                    </h4>
                    <p class="mb-0 mt-3 text-muted">
                        Number of outsocked products
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right"> Orders</h6>
                    <h4 class="text-right"><i
                            class="fas fa-ticket-alt pull-left bg-deep-orange c-icon"></i><span>{{ $order }}</span>
                    </h4>
                    @if(orders()['arrow']== 'up')
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i>
                        <span class="text-success font-weight-bold">{{ orders()['percentage'] }}%</span>
                        in last 30 days
                    </p>
                    @else
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-down col-red m-r-5"></i>
                        <span class="text-danger font-weight-bold">{{ orders()['percentage'] }}%</span>
                        in last 30 days
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right">Total Earning(GBP)</h6>
                    <h4 class="text-right"><i
                            class="fas fa-dollar-sign pull-left bg-green c-icon"></i><span>{{ $earning }}</span>
                    </h4>
                    @if(earnings()['arrow']== 'up')
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i>
                        <span class="text-success font-weight-bold">{{ earnings()['percentage'] }}%</span>
                        in last 30 days
                    </p>
                    @else
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-down col-red m-r-5"></i>
                        <span class="text-danger font-weight-bold">{{ earnings()['percentage'] }}%</span>
                        in last 30 days
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Orders List</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Amount(GBP)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($ordersList as $list)
                            <tr>
                                <td>
                                    <b>PO{{ $list->uuid }}</b>
                                    <p class="mb-0 font-12">{{ $list->created_at->format('d-m-y') }}</p>

                                </td>
                                <td class="text-center">
                                    <h6 class="mb-0 font-13">{{ $list->user->name }}</h6>
                                </td>

                                <td class="text-center">
                                    <div class="progress-text">{{ $list->total }}</div>
                                </td>
                                <td>
                                    @if($list->status )
                                        <div class="badge-outline col-red">Pending</div>
                                    @else
                                        <div class="badge-outline col-green">Delivered</div>

                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.order.view',$list->id) }}" title="" data-original-title="Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Bookings List</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="width:20%">#</th>
                                <th width="20%">Customer Name</th>
                                <th width="20%">Product Name</th>
                                <th width="5%">Amount(GBP)</th>
                                <th width="10%">Status</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        @foreach ($booking as $list)
                        <tr>
                            <td>
                                <b>BO{{ $list->uuid }}</b>
                                <p class="mb-0 font-12">{{ $list->created_at->format('d-m-y') }}</p>
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">{{ $list->user->name }}</h6>
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">{{ $list->brandProduct->name }}</h6>
                            </td>
                            <td class="text-center">
                                <div class="progress-text">{{ $list->amount }}</div>
                            </td>
                            <td>
                                @if($list->status )
                                    <div class="badge-outline col-red">Pending</div>
                                @else
                                    <div class="badge-outline col-green">Delivered</div>

                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.booking.view',$list->id) }}" title="" data-original-title="Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Select Layout</h6>
                        <div class="selectgroup layout-color w-50">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout"
                                    checked>
                                <span class="selectgroup-button">Light</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="2"
                                    class="selectgroup-input-radio select-layout">
                                <span class="selectgroup-button">Dark</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1"
                                    class="selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar"
                                    checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Color Theme</h6>
                        <div class="theme-setting-options">
                            <ul class="choose-theme list-unstyled mb-0">
                                <li title="white" class="active">
                                    <div class="white"></div>
                                </li>
                                <li title="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li title="black">
                                    <div class="black"></div>
                                </li>
                                <li title="purple">
                                    <div class="purple"></div>
                                </li>
                                <li title="orange">
                                    <div class="orange"></div>
                                </li>
                                <li title="green">
                                    <div class="green"></div>
                                </li>
                                <li title="red">
                                    <div class="red"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="mini_sidebar_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Mini Sidebar</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="sticky_header_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Sticky Header</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                            <i class="fas fa-undo"></i> Restore Default
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
