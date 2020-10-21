@extends('dashboard.layout.app')
@section('title', (__('dashboard.attributes.title')))

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.attributes.title')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__('dashboard.attributes.title')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section id="dom">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">
                            <i class="ft-user"></i>
                            {{__('dashboard.attributes.title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                        <div class="card-body card-dashboard">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered dom-jQuery-events dataTable"
                                               id="DataTables_Table_0" role="grid"
                                               aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 126px;">{{__('dashboard.attributes.name')}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Age: activate to sort column ascending"
                                                    style="width: 202px;">{{__('dashboard.attributes.actions')}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @forelse($attributes as $attribute)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$attribute->name}}</td>
                                                <td>
                                                    <a href="{{route('attributes.edit', $attribute->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('dashboard.edit')}}<i class="ft-edit"></i></a>
                                                    <button type="button" value="{{$attribute->id}}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#{{$attribute->id}}">
                                                        <i class="la la-trash-o" style="font-size:15px"></i>
                                                        {{__('dashboard.delete.name')}}
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="{{$attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger border-0 no-border-top-radius">
                                                                    <h5 class="modal-title white" id="{{$attribute->id}}">{{__('dashboard.delete.delete_data')}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{__('dashboard.delete.you_sure_delete')}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.delete.close')}}</button>
                                                                    <form action="{{route('attributes.destroy', $attribute->id)}}" method="POST" class="d-inline-block">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-danger">{{__('dashboard.delete.ok_delete')}}</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                                <h2 class="text-center">No Data Found</h2>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
@endsection

@section('script')
    <script src="{{asset('dashboard/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/js/scripts/tables/datatables/datatable-advanced.js')}}" type="text/javascript"></script>
@endsection
