@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.subjects') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.subjects'),
      
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <a href="{{route('subjects.create')}}" class="button x-small">
                    {{ trans('subjects_trans.add_subject') }}
                </a>
                <br><br>

                <div class="table-responsive">

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th class="alert-success">#</th>
                                <th class="alert-success">{{ trans('students_trans.name') }}</th>
                                <th class="alert-success">{{ trans('students_trans.grade') }}</th>
                                <th class="alert-success">{{ trans('students_trans.classrooms') }}</th>
                                <th class="alert-success">{{ trans('subjects_trans.teachers') }}</th>
                                <th class="alert-success">{{ trans('main_trans.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($subjects as $index=>$subject)
                                <tr>
                                    
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->grade->name }}</td>
                                    <td>{{ $subject->classroom->name }}</td>
                                    <td>{{ $subject->teacher->name }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('subjects.edit',$subject->id) }}"
                                            title="{{ trans('main_trans.edit') }}"><i class="fa fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_subject{{ $subject->id }}"
                                            title="{{ trans('main_trans.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>


                                    <div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('subjects.destroy','test')}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                             <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('subjects_trans.delete_subject') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <p> {{ trans('messages.warning_deleted') }}</p>
                                                    <input type="hidden" name="id"  value="{{$subject->id}}">
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
                                </tr>
                          
                               

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