@extends('dashboard.layout.app')
@section('title', (__('dashboard.products.create')))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.products.create')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{__('dashboard.products.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.products.create')}}</li>
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
                                {{__('dashboard.products.brand_data')}}</h4>
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
                                <form class="form" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "name" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.name')}}</label>
                                                <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                                       value="{{(old($input))}}">
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "slug" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.slug')}}</label>
                                                <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                                       value="{{(old($input))}}">
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "description" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.description')}}</label>
                                                <textarea type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">{{(old($input))}}</textarea>
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6 mb-2">
                                                @php $input = "short_description" @endphp
                                                <label for="{{$input}}">{{__('dashboard.products.short_description')}}</label>
                                                <textarea type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">{{(old($input))}}</textarea>
                                                @error($input)
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4 mb-2">
                                                @php $input = "categories[]" @endphp
                                                <label style="display: block" for="{{$input}}">{{__('dashboard.products.categories')}}</label>
                                                <select class="select2 form-control block select2-hidden-accessible @error($input) is-invalid @enderror" name="{{$input}}" multiple="" id="responsive_multi" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        @forelse($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @empty
                                                            --
                                                        @endforelse
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-4 mb-2">
                                                @php $input = "tags[]" @endphp
                                                <label style="display: block" for="{{$input}}">{{__('dashboard.products.tag')}}</label>
                                                <select class="select2 form-control block select2-hidden-accessible @error($input) is-invalid @enderror" name="{{$input}}" multiple="" id="responsive_multi" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="من فضلك أختر العلامة التجارية">
                                                        @forelse($tags as $tag)
                                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                        @empty
                                                            --
                                                        @endforelse
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                            <div class="form-group col-4 mb-2">
                                                <label style="display: block" for="{{$input}}">{{__('dashboard.products.brand')}}</label>
                                                @php $input = "brand_id" @endphp
                                                <select name="brand_id" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر الماركة">
                                                        @if($brands && $brands -> count() > 0)
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand -> id }}">{{$brand -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('brand_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox" value="1" name="is_active" id="" class="" data-color="success"/>
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

