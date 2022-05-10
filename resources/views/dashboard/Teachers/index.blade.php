@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.teachers')}}
@stop
@endsection
{{
    $title = trans('main_trans.teachers'),
  
    $dashboard =  trans('main_trans.dashboard'


),
     
 }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    
                    <a href="{{route('teachers.create')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('teachers_trans.add_teacher') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('teachers_trans.name_teacher')}}</th>
                                <th>{{trans('teachers_trans.gender')}}</th>
                                <th>{{trans('teachers_trans.joining_Date')}}</th>
                                <th>{{trans('teachers_trans.specialization')}}</th>
                                <th>{{trans('main_trans.processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($teachers as $i=>$teacher)
                                <tr>
                                
                                    <td>{{ $i+1 }}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->genders->name}}</td>
                                    <td>{{$teacher->joining_Date}}</td>
                                    <td>{{$teacher->specializations->name}}</td>
                                    <td>
                                        <a href="{{route('teachers.edit',encrypt($teacher->id))}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $teacher->id }}" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="delete_Teacher{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('teachers.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('teachers_trans.delete_teacher') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p> {{ trans('messages.warning_deleted') }}</p>
                                                <input type="hidden" name="id"  value="{{$teacher->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
                                                </div>
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection