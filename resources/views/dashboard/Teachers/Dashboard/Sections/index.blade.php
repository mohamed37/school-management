@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('sections_trans.title_page') }}
@stop
@endsection

{{
    $title = trans('sections_trans.title_page'),

    $dashboard =  trans('main_trans.dashboard'),

    }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
      
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>{{ trans('sections_trans.name_section') }}</th>
                                    <th>{{ trans('sections_trans.name_grade') }}</th>
                                    <th>{{ trans('sections_trans.name_class') }}</th>
                                    <th>{{ trans('sections_trans.status') }}</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $index=> $section)
                            <tr>

                                <td>{{ $index +1 }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->grade->name }} </td>
                                <td>{{ $section->classroom->name }} </td>
                                <td>
                                    @if ($section->status == 1)
                                        <label
                                            class="badge badge-success">{{ trans('sections_trans.status_section_AC') }}</label>
                                    @else
                                        <label
                                            class="badge badge-danger">{{ trans('sections_trans.status_section_No') }}</label>
                                    @endif

                                </td>

                               
                            </tr>

                             
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
