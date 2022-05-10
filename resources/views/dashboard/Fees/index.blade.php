@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.fees') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.feesGrade'),
      
        $dashboard =  trans('main_trans.dashboard'),
         
     }}
    @section('title')     {{ $title }}  @stop
    

@section('content')
    <!-- row -->
  <div class="row">


    @if ($errors->any())
        <div class="error">{{ $errors->first('title') }}</div>
    @endif


    <!-- Index -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <a  class="button x-small" href="{{route('fees.create')}}">
                    {{ trans('fees_trans.add_fees') }}
                </a>
                <br><br>

                <div class="table-responsive">

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('fees_trans.title') }}</th>
                                <th>{{ trans('fees_trans.amount') }}</th>
                                <th>{{ trans('fees_trans.grade') }}</th>
                                <th>{{ trans('fees_trans.classrooms') }}</th>
                                <th>{{ trans('fees_trans.year') }}</th>
                                <th>{{ trans('Grades_trans.notes') }}</th>
                                <th>{{ trans('main_trans.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($fees as $index=>$fee)
                                <tr>
                                    
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $fee->title }}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->grade->name }}</td>
                                    <td>{{ $fee->classroom->name }}</td>
                                    <td>{{ $fee->year }}</td>
                                    <td>{{ $fee->description }}</td>

                                    <td>
                                        <a  class="btn btn-info btn-sm" href="{{route('fees.edit',$fee->id) }}"
                                            title="{{ trans('main_trans.edit') }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                                data-target="#delete_fee{{$fee->id}}" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>

                                    </td>

                                    <div class="modal fade" id="delete_fee{{$fee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('fees.destroy','test')}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('fees_trans.delete_fees') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <p> {{ trans('messages.warning_deleted') }}</p>
                                                    <input type="hidden" name="id"  value="{{$fee->id}}">
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
 
                                </tr>
                            @endforeach
                    </table>

                </div>
                
                <!-- End Of Store && Update -->
 
            </div>
        </div>
    </div>

    <!-- End of Index -->
    
  </div>
 
<!-- row closed -->
    @endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection