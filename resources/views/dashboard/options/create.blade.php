@extends('dashboard.layout.app')
@section('title', (__('dashboard.attributes.create')))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.attributes.create')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('attributes.index')}}">{{__('dashboard.attributes.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.attributes.create')}}</li>
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
                                {{__('dashboard.attributes.attribute_data')}}</h4>
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
                                <form class="form"
                                      action="{{route('options.store')}}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">

                                        <h4 class="form-section"><i class="ft-home"></i> options data </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> الاسم
                                                    </label>
                                                    <input type="text" id="name"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{old('name')}}"
                                                           name="name">
                                                    @error("name")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> ألسعر
                                                    </label>
                                                    <input type="text" id="price"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{old('price')}}"
                                                           name="price">
                                                    @error("price")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> اختر ألمنتج
                                                    </label>
                                                    <select name="product_id" class="select2 form-control" >
                                                        <optgroup label="من فضلك أختر المنتج ">
                                                            @if($products && $products -> count() > 0)
                                                                @foreach($products as $product)
                                                                    <option value="{{$product -> id }}">{{$product -> name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </optgroup>
                                                    </select>
                                                    @error('product_id')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> اختر خاصيه
                                                    </label>
                                                    <select name="attribute_id" class="select2 form-control" >
                                                        <optgroup label="من فضلك أختر قيمه">
                                                            @if($attributes && $attributes -> count() > 0)
                                                                @foreach($attributes as $attribute)
                                                                    <option
                                                                        value="{{$attribute -> id }}">{{$attribute -> name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </optgroup>
                                                    </select>
                                                    @error('attribute_id')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="ft-x"></i> تراجع
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> تحديث
                                        </button>
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
