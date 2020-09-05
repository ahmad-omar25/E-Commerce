@extends('dashboard.layout.app')
@section('title', (__('dashboard.categories.title')))
@section('content')
    <style>
        .table th, .table td {
            padding: 0.75rem !important;
        }
    </style>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{__('dashboard.categories.title')}}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.home')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__('dashboard.categories.title')}}</li>
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
                                {{__('dashboard.categories.title')}}</h4>
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
                                <div class="card-content collapse show">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-success white">
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('dashboard.categories.name')}}</th>
                                                <th>{{__('dashboard.categories.name_url')}}</th>
                                                <th>{{__('dashboard.categories.is_active')}}</th>
                                                <th>{{__('dashboard.categories.image')}}</th>
                                                <th>{{__('dashboard.categories.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $index=>$category)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->slug}}</td>
                                                    <td>{{$category->getActive()}}</td>
                                                    <td>
                                                        <img src="" style="width: 100px; height: 70px" alt="">
                                                    </td>
                                                    <td>
                                                        <a href="{{route('main_categories.edit', $category->id)}}" class="btn btn-primary btn-sm">{{__('dashboard.edit')}}<i class="ft-edit"></i></a>
                                                        <button type="button" value="{{$category->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$category->id}}">
                                                            <i class="la la-trash-o" style="font-size:15px"></i>
                                                            {{__('dashboard.delete.name')}}
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger border-0 no-border-top-radius">
                                                                        <h5 class="modal-title white" id="{{$category->id}}">{{__('dashboard.delete.delete_data')}}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{__('dashboard.delete.you_sure_delete')}}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.delete.close')}}</button>
                                                                        <form action="{{route('main_categories.destroy', $category->id)}}" method="POST" class="d-inline-block">
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
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {!! $categories->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('sweetalert::alert')
@endsection
