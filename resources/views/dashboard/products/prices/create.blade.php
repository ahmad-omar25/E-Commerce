@extends('dashboard.layout.app')
@section('title', (__('dashboard.products.price')))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.products.price')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{__('dashboard.products.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.products.price')}}</li>
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
                                <i class="ft-user"></i>
                                {{__('dashboard.products.price')}}</h4>
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
                                <form class="form" action="{{route('admin.product.price.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "price" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.price')}}</label>
                                                <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                                       value="{{$product->price ?? (old($input))}}">
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "special_price" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.special_price')}}</label>
                                                <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                                       value="{{$product->special_price ?? (old($input))}}">
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label style="display: block" for="{{$input}}">{{__('dashboard.products.special_price_type')}}</label>
                                                @php $input = "special_price_type" @endphp
                                                <select name="special_price_type" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر النوع ">
                                                        <option value="percent">percent</option>
                                                        <option value="fixed">fixed</option>
                                                    </optgroup>
                                                </select>
                                                @error('brand_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">{{__('dashboard.products.special_price_start')}}
                                                    </label>

                                                    <input type="date" id="price"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{$product->special_price_start ?? old('special_price_start')}}"
                                                           name="special_price_start">

                                                    @error('special_price_start')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">{{__('dashboard.products.special_price_end')}}
                                                    </label>
                                                    <input type="date" id="price"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{old('special_price_end')}}"
                                                           name="special_price_end">

                                                    @error('special_price_end')
                                                    <span class="text-danger"> {{$message}}</span>
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

