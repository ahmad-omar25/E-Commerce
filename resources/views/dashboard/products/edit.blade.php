@extends('dashboard.layout.app')
@section('title', (__('dashboard.brands.edit')) . $brand->name)
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.brands.edit') . $brand->name}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('brands.index')}}">{{__('dashboard.brands.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.brands.edit') . $brand->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card border-top-pink border-bottom-pink border-left-pink border-right-pink">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">
                                <i class="ft-user"></i>
                                {{__('dashboard.brands.brand_data')}}</h4>
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
                                <form class="form" action="{{route('brands.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                <div class="text-center">

                                                    <img src="{{$brand->logo}}" class="rounded-circle width-150  height-150" style="border: 1px solid #E91E63;" alt="{{$brand->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                @php $input = "logo" @endphp
                                                <label>{{__('dashboard.brands.edit_image')}}</label>
                                                <label id="{{$input}}" class="file center-block">
                                                    <input type="file" value="{{$brand->logo}}" name="{{$input}}" id="file">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                @php $input = "name" @endphp
                                                <label for="{{$input}}">{{__('dashboard.brands.name')}}</label>
                                                <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                                       value="{{$brand->name}}">
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox" value="1" name="is_active" id="" class="" data-color="success" @if($brand -> is_active == 1)checked @endif/>
                                                    <label for="switcheryColor4" class="card-title ml-1">{{__('dashboard.status')}}</label>
                                                    @error("is_active")
                                                    <span class="text-danger">{{$message }}</span>
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
