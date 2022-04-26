@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.fees')}}
@stop
@endsection
{{
    $title = trans('main_trans.fees_invoices'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
@section('title')     {{ $title }} @stop
@section('content')
 <!-- row -->
 <div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post"  action="{{ route('feesInovice.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="repeater">

                        <div data-repeater-list="List_Fees">
                            <div data-repeater-item>

                                <div class="row">
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{trans('fees_trans.title')}} :</label>
                                            <select class="custom-select mr-sm-2" name="student_id" required>
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Name_en" class="mr-sm-2"> {{ trans('fees_trans.fees_type') }}</label>
                                            <select class="custom-select mr-sm-2" name="fee_id" required>
                                                <option value="">-- {{ trans('fees_trans.choose') }} --</option>
                                                @foreach($fees as $fee)
                                                    <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Name_en" class="mr-sm-2"> {{ trans('fees_trans.amount') }}</label>
                                            <select class="custom-select mr-sm-2" name="amount" required>
                                                <option value="">-- {{ trans('fees_trans.choose') }} --</option>
                                                @foreach($fees as $fee)
                                                    <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                
                                    </div>

                                    <div class="col">
                                        <label for="description" class="mr-sm-2">{{ trans('fees_trans.description') }}</label>
                                        <div class="box">
                                            <input type="text" class="form-control" name="description" required>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">{{ trans('main_trans.processes') }}:</label>
                                        <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('classrooms_trans.delete_row') }}" />
                                    </div>
                                </div>
                                <br>
                                
                            </div>
                        </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('classrooms_trans.add_row') }}"/>
                                    </div>
                                </div><br>
                                <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                                <input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">
                           
                    


                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.submit')}}</button>
                    </div>
                </form>

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
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
               
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('/admin/Get_classrooms') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');
                            $.each(data, function (key, value) {
                               
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
   
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/Get_sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');

                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection