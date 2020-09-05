@extends('dashboard.layout.app')
@section('title', $shippingMethod -> value)
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.settings.name')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__('dashboard.edit') . $shippingMethod -> value}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">
                                <i class="ft-check-circle"></i>
                                {{__('dashboard.edit') . $shippingMethod -> value}}</h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{route('shipping.update.methods', $shippingMethod->id)}}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$shippingMethod -> id}}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="value">{{__('dashboard.settings.name_delivery')}}</label>
                                                    <input type="text" value="{{$shippingMethod -> value  }}" id="name"
                                                           class="form-control"
                                                           placeholder="  "
                                                           name="value">
                                                    @error("value")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="plain_value">{{__('dashboard.settings.price_delivery')}}</label>
                                                    <input value="{{number_format($shippingMethod -> plain_value, 2)}}"
                                                           id="plain_value"
                                                           class="form-control"
                                                           placeholder=""
                                                           name="plain_value">
                                                    @error("plain_value")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o" style="float:right;margin:-1px 9px 0px 10px;"></i>{{__('dashboard.save')}}
                                        </button>
                                        @include('dashboard.shared.buttons.back')
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('sweetalert::alert')
@endsection
