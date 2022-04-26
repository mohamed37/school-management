@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.libraries') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.libraries'),
      
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
                <a href="{{route('library.create')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('library_trans.add_library') }}</a><br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('library_trans.title') }}</th>
                            <th scope="col">{{ trans('library_trans.file_name') }}</th>
                            <th scope="col">{{ trans('online_class_trans.grade') }}</th>
                            <th scope="col">{{ trans('online_class_trans.classroom') }}</th>
                            <th scope="col">{{ trans('online_class_trans.section') }} </th>
                            <th scope="col">{{ trans('online_class_trans.teacher') }}</th>
                          
                            <th scope="col">{{ trans('main_trans.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($libraries as $index=>$library)
                            <tr>
                                <td>{{ $index+1}}</td>
                                <td>{{$library->title}}</td>
                                <td>{{$library->file_name}}</td>
                                <td>{{$library->grade->name}}</td>
                                <td>{{$library->classroom->name}}</td>
                                <td>{{$library->section->name}}</td>
                                <td>{{$library->teacher->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete_library{{ $library->id }}" title="{{ trans('library_trans.delete_library') }}"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                    <?php $url = str_replace('students/'.$library->id,'Download_photos',request()->url()) ?>
                                    <a class="btn btn-outline-info btn-sm"
                                    href="{{route('Download_Attaches',   [$library->file_name])}}"
                                    {{-- ."/". $attachment->imageable->name ."/".$attachment->filename --}}
                                    role="button"><i class="fa fa-download"></i>&nbsp; {{trans('students_trans.download')}}</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete_library{{$library->id}}" tabindex="-1" role="dialog" aria-labelledby="librarypleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('library.destroy','test')}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="librarypleModalLabel">{{ trans('library_trans.delete_library') }} {{$library->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p> {{ trans('messages.warning_deleted') }}</p>
                                            <input type="hidden" name="id"  value="{{$library->id}}">
                                            
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