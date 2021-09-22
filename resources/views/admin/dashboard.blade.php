@extends("layouts.admin")

@section("title", "Dashboard")

@section("nav-title", "Dashboard")

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
                    <h6 class="m-b-20 text-right">Orders Received</h6>
                    <h4 class="text-right"><i class="fas fa-cart-plus pull-left bg-indigo c-icon"></i><span>7.12K</span>
                    </h4>
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i><span
                            class="text-success font-weight-bold">23%</span> then previous month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right">Registered Users</h6>
                    <h4 class="text-right"><i class="fas fa-users pull-left bg-cyan c-icon"></i><span>22.3K</span>
                    </h4>
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-red m-r-5"></i><span
                            class="col-red font-weight-bold">3%</span> then previous month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right">Support Tickets</h6>
                    <h4 class="text-right"><i
                            class="fas fa-ticket-alt pull-left bg-deep-orange c-icon"></i><span>725</span>
                    </h4>
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-up col-green m-r-5"></i><span
                            class="text-success font-weight-bold">21%</span> then previous month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-statistic-4">
                <div class="info-box7-block">
                    <h6 class="m-b-20 text-right">Total Earning</h6>
                    <h4 class="text-right"><i
                            class="fas fa-dollar-sign pull-left bg-green c-icon"></i><span>$3.58M</span>
                    </h4>
                    <p class="mb-0 mt-3 text-muted"><i class="fas fa-arrow-circle-down col-red m-r-5"></i><span
                            class="col-red font-weight-bold">05%</span> then previous month</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Revenue Chart</h4>
            </div>
            <div class="card-body">
                <ul class="list-inline text-center m-b-0">
                    <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                        <h5 class="m-b-0">$675</h5>
                        <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                    </li>
                    <li class="list-inline-item p-r-30"><i data-feather="arrow-down-circle" class="col-orange"></i>
                        <h5 class="m-b-0">$1,587</h5>
                        <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                    </li>
                    <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                        <h5 class="mb-0 m-b-0">$45,965</h5>
                        <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                    </li>
                </ul>
                <div id="revenue"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-4">
        <div class="card l-bg-purple">
            <div class="card-body">
                <div class="text-white">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <h4 class="mb-0 font-26 text-white">$1,235</h4>
                            <p class="mb-2 text-white">Avg Sales Per Month</p>
                            <p class="mb-0 text-white">
                                <span class="font-20">+11.25% </span>Increase
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <div class="sparkline-bar p-t-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card l-bg-cyan-dark">
            <div class="card-body">
                <div class="text-white">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <h4 class="mb-0 font-26 text-white">758</h4>
                            <p class="mb-2 text-white">Avg new Cust Per Month</p>
                            <p class="mb-0 text-white">
                                <span class="font-20">+25.11%</span> Increase
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <div class="sparkline-inline p-t-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Activity</h4>
            </div>
            <div class="card-body">
                <div id="activity-scroll">
                    <ul class="activity-list">
                        <li> <i class="activity-icon bg-success"></i>
                            <h6>Order Placed<small class="float-right text-muted">11 March 2019</small></h6>
                            <span class="font-12">Order ID: #8547</span>
                        </li>
                        <li> <i class="activity-icon bg-info"></i>
                            <h6>Order Accept<small class="float-right text-muted tx-11">11 March 2019</small>
                            </h6> <span class="font-12">Order ID: #8547</span>
                        </li>
                        <li> <i class="activity-icon bg-red"></i>
                            <h6>Ready For Dispatched<small class="float-right text-muted tx-11">12 March
                                    2019</small></h6>
                            <span class="font-12">Order ID: #8547</span>
                        </li>
                        <li> <i class="activity-icon bg-primary"></i>
                            <h6>Order Shipped<small class="float-right text-muted tx-11">14 March 2019</small>
                            </h6>
                            <span class="font-12">Tracking ID: ED8597587</span>
                        </li>
                        <li> <i class="activity-icon bg-orange"></i>
                            <h6>Product Delivered<small class="float-right text-muted tx-11">16 March
                                    2019</small></h6>
                            <span class="font-12">Receiver Name: John</span>
                        </li>
                        <li> <i class="activity-icon bg-green"></i>
                            <h6>Product Return<small class="float-right text-muted tx-11">18 March 2019</small>
                            </h6>
                            <span class="font-12">Receiver Name: Sarah</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    < <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Assign Project List</h4>
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
                                    <th>Cust.</th>
                                    <th>Project</th>
                                    <th>Assign Date</th>
                                    <th>Team</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-8.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Wordpress Website</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Airi Satou</span>
                                    </p>
                                </td>
                                <td>20-02-2018</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-8.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-9.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-10.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-red">High</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">50%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-success" data-width="50%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-1.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Android Game App</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Sarah Smith</span>
                                    </p>
                                </td>
                                <td>22-05-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-4.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-7.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-2.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-green">Low</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">55%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-purple" data-width="55%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-5.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Java Web Service</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Cara Stevens</span>
                                    </p>
                                </td>
                                <td>11-04-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-3.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-7.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-8.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-blue">Medium</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">70%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar" data-width="70%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-9.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Wedding IOS App</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> John Doe</span>
                                    </p>
                                </td>
                                <td>19-05-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-2.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-10.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-4.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-red">High</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">45%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-cyan" data-width="45%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-10.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Blize Admin Template</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Ashton Cox</span>
                                    </p>
                                </td>
                                <td>25-07-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-1.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-5.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-7.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-blue">Medium</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">67%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-red" data-width="67%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-4.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">React js website</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Sarah Smith </span>
                                    </p>
                                </td>
                                <td>11-08-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-5.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-8.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-3.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-green">Low</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">41%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-orange" data-width="41%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-10.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">SEO improvement</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Janak Gandhi</span>
                                    </p>
                                </td>
                                <td>22-02-2018</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-3.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-9.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-1.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-red">High</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">70%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-success" data-width="70%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-img"><img src="{{asset('admin/img/users/user-6.png')}}" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0 font-13">Laravel Website</h6>
                                    <p class="m-0 font-12">
                                        Assigned to<span class="col-green font-weight-bold"> Mili Rain</span>
                                    </p>
                                </td>
                                <td>31-03-2019</td>
                                <td class="text-truncate">
                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-4.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-7.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="John Deo">
                                        </li>
                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                src="{{asset('admin/img/users/user-2.png')}}" alt="user"
                                                data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                        <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="badge-outline col-green">Low</div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-text">55%</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-purple" data-width="55%"></div>
                                    </div>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
