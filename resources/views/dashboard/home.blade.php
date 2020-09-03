@extends('dashboard.layout.app')
@section('title', (__('dashboard.home')))
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">850</h3>
                                    <h6>Products Sold</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">$748</h3>
                                    <h6>Net Profit</h6>
                                </div>
                                <div>
                                    <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                     style="width: 65%"
                                     aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">146</h3>
                                    <h6>New Customers</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                     style="width: 75%"
                                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">99.89 %</h3>
                                    <h6>Customer Satisfaction</h6>
                                </div>
                                <div>
                                    <i class="icon-heart danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                                     aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-12 col-xl-7">
            <div class="card" style="height: 355px;">
                <div class="card-header">
                    <h4 class="card-title">{{__('dashboard.orders.latest_orders')}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                            <tr>
                                <th>{{__('dashboard.orders.order_number')}}</th>
                                <th>{{__('dashboard.orders.client_name')}}</th>
                                <th>{{__('dashboard.orders.order_status')}}</th>
                                <th>{{__('dashboard.orders.total')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-success bg-lighten-5">
                                <td>10583.4</td>
                                <td>10583.4</td>
                                <td>10583.4</td>
                                <td>10583.4</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-5">
            <div class="card" style="height: 355px;">
                <div class="card-header">
                    <h4 class="card-title">{{__('dashboard.reviews.latest_reviews')}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                            <tr>
                                <th>{{__('dashboard.reviews.client_name')}}</th>
                                <th>{{__('dashboard.reviews.product_name')}}</th>
                                <th>{{__('dashboard.reviews.review')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-danger bg-lighten-5">
                                <td>10599.5</td>
                                <td>10599.5</td>
                                <td>10599.5</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
