@if(auth()->user()->hasPermission($routeName.'_delete'))
<button type="button" value="{{$row->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$row->id}}">
    <i class="la la-trash-o" style="font-size:15px"></i>
    {{__('global.delete')}}
</button>
<!-- Modal -->
<div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger border-0 no-border-top-radius">
                <h5 class="modal-title white" id="{{$row->id}}">{{__('global.delete_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('global.delete_message')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('global.close')}}</button>
                <form action="{{route($routeName.'.destroy', $row->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">{{__('global.ok_delete')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
    <button type="button" class="btn btn-danger btn-sm disabled"><i class="la la-trash-o" style="font-size:15px"></i>{{__('global.delete')}}</button>
@endif
