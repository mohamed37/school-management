@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('Grades_trans.title_page') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.grades'),
      
        $dashboard =  trans('main_trans.dashboard'),
         
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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Grades_trans.add_Grade') }}
                </button>
                <br><br>

                <div class="table-responsive">

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Grades_trans.name') }}</th>
                                <th>{{ trans('Grades_trans.notes') }}</th>
                                <th>{{ trans('main_trans.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($grades as $index=>$grade)
                                <tr>
                                    
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}"
                                            title="{{ trans('main_trans.edit') }}"><i class="fa fa-edit"></i></button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="{{ trans('main_trans.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <!-- Store && Update -->
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('grades.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $grade->id }}">

                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name"
                                                                class="form-control"
                                                                value="{{ $grade->getTranslation('name', 'ar') }}"
                                                                required>

                                                           
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $grade->getTranslation('name', 'en') }}"
                                                                name="name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="notes"
                                                            id="exampleFormControlTextarea1"
                                                            rows="3">{{ $grade->notes }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('grades_trans.update') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('grades.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('messages.warning_deleted') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $grade->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('Grades_trans.delete_Grade') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                    </table>

                </div>
                
                <!-- End Of Store && Update -->
 
            </div>
        </div>
    </div>

    <!-- End of Index -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!-- add_modal_Grade -->
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">

                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Grades_trans.notes') }}
                                :</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                                rows="3" required></textarea>
                        </div>

                        <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('main_trans.submit') }}</button>
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
@endsection