@extends('dashboard.layout.app')
@section('title', (__('dashboard.products.stock')))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.products.stock')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('products.index')}}">{{__('dashboard.products.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.products.stock')}}</li>
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
                                {{__('dashboard.products.stock')}}</h4>
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
                                <form class="form" action="{{route('admin.product.stock.store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> كود المنتج
                                                    </label>
                                                    <input type="text" id="sku"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{old('sku')}}"
                                                           name="sku">
                                                    @error("sku")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">تتبع المستودع
                                                    </label>
                                                    <select name="manage_stock" class="select2 form-control"
                                                            id="manageStock">
                                                        <optgroup label="من فضلك أختر النوع ">
                                                            <option value="0" selected>عدم اتاحه التتبع</option>
                                                            <option value="1">اتاحة التتبع</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('manage_stock')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- QTY  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">حالة المنتج
                                                    </label>
                                                    <select name="in_stock" class="select2 form-control">
                                                        <optgroup label="من فضلك أختر  ">
                                                            <option value="1">متاح</option>
                                                            <option value="0">غير متاح</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('in_stock')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6" style="display:none" id="qtyDiv">
                                                <div class="form-group">
                                                    <label for="projectinput1">الكمية
                                                    </label>
                                                    <input type="text" id="sku"
                                                           class="form-control"
                                                           placeholder="  "
                                                           value="{{old('quantity')}}"
                                                           name="quantity">
                                                    @error("quantity")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"
                                                   style="float:right;margin:-1px 9px 0px 10px;"></i>{{__('dashboard.save')}}
                                            </button>
                                            @include('dashboard.shared.buttons.back')
                                        </div>
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

@section('script')

    <script>
        $(document).on('change', '#manageStock', function () {
            if ($(this).val() == 1) {
                $('#qtyDiv').show();
            } else {
                $('#qtyDiv').hide();
            }
        });
    </script>
@stop
