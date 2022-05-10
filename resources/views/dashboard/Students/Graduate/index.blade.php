@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('graduate_trans.graduates')}}
@stop
@endsection
{{
    $title = trans('graduate_trans.graduates'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Promotion" id="btn_delete_all">
                       
                        {{ trans('promotion_trans.revers_all') }}
                    </button>
                
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>

                                <th>#</th>
                                <th  class="alert alert-warning">{{trans('students_trans.name_student')}}</th>
                               
                                <th class="alert alert-warning">{{trans('graduate_trans.grade')}}</th>
                                <th class="alert alert-warning">{{trans('graduate_trans.classrooms')}}</th>
                                <th class="alert alert-warning">{{trans('graduate_trans.section')}}</th>
                                <th class="alert alert-warning">{{trans('graduate_trans.graduate_year')}}</th>
                               
                                
                               
                               
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($students as $i=>$student)
                                <tr>
                                    <td><input type="checkbox"  value="{{ $student->id }}" class="box1" ></td>     
                                    <td>{{ $i+1 }}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->grade->name}}</td>
                                    <td>{{$student->classroom->name}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td>{{$student->academic_year}}</td>
                                </tr>

                                <div class="modal fade" id="delete_Promotion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('promotion.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('promotion_trans.promotion') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p> {{ trans('promotion_trans.revers_promotions') }}</p>
                                                <input type="hidden" name="page_id"  value="1">
                                                <input class="text" type="text" id="delete_all_id" name="delete_all_id" value=''>


                                            </div>

                                            <div class="modal-footer">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('messages.sure') }}</button>
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

    <script>
         $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type='checkbox']:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>
@endsection