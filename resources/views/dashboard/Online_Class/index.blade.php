@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.online_classes') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.online_classes'),
      
        $dashboard =  trans('main_trans.dashboard'


),
         
     }}
    @section('title')     {{ $title }}  @stop
    

@section('content')
    <!-- row -->
  <div class="row">


    @if ($errors->any())
        <div class="error">{{ $errors->first('name') }}</div>
    @endif


    <!-- Index -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{route('online_class.create')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('online_class_trans.add_online_class') }}</a>

                    <a href="{{route('offline_create')}}" class="btn btn-primary btn-sm" role="button"
                    aria-pressed="true">{{ trans('online_class_trans.add_offline_class') }}</a><br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('online_class_trans.grade') }}</th>
                            <th scope="col">{{ trans('online_class_trans.classroom') }}</th>
                            <th scope="col">{{ trans('online_class_trans.section') }} </th>
                            <th scope="col">{{ trans('online_class_trans.teacher') }}</th>
                            <th scope="col">{{ trans('online_class_trans.topic') }}</th>
                            <th scope="col">{{ trans('online_class_trans.start_at') }}</th>
                            <th scope="col">{{ trans('online_class_trans.duration') }}</th>
                            <th scope="col">{{ trans('online_class_trans.start_url') }}</th>

                            <th scope="col">{{ trans('main_trans.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($online_classes as $index=>$online_class)
                            <tr>
                                <td>{{ $index+1}}</td>
                                <td>{{$online_class->grade->name}}</td>
                                <td>{{$online_class->classroom->name}}</td>
                                <td>{{$online_class->section->name}}</td>
                                <td>{{$online_class->teacher->name}}</td>
                                <td>{{$online_class->topic}}</td>
                                <td>{{$online_class->start_at}}</td>
                                <td>{{$online_class->duration}} {{ trans('online_class_trans.minutes') }}</td>
                                <td><a href="{{$online_class->start_url}}" 
                                       style="color: cornflowerblue; font-size: 20;">{{ trans('online_class_trans.join_now') }}</a></td>
                                <td>
                                   
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete_online_class{{ $online_class->meeting_id }}" title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete_online_class{{$online_class->meeting_id}}" tabindex="-1" role="dialog" aria-labelledby="online_classpleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('online_class.destroy','test')}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="online_classpleModalLabel">{{ trans('online_class_trans.delete_online_class') }} {{$online_class->topic}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p> {{ trans('messages.warning_deleted') }}</p>
                                            <input type="hidden" name="id"  value="{{$online_class->id}}">
                                            <input type="hidden" name="meeting_id"  value="{{$online_class->meeting_id}}">
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
                                        </div>
                                        
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                        
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
            
</div>

    <!-- End of Index -->
    
   
 
<!-- row closed -->
    @endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection

