@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.questions') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.questions'),
      
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
                <a href="{{route('questions.create')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('questions_trans.add_question') }}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('questions_trans.question') }}</th>
                            <th scope="col">{{ trans('questions_trans.answers') }}</th>
                            <th scope="col">{{ trans('questions_trans.right_answer') }} </th>
                            <th scope="col">{{ trans('questions_trans.score') }}</th>
                            <th scope="col">{{ trans('questions_trans.quizze') }}</th>
                            <th scope="col">{{ trans('main_trans.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $index=>$question)
                            <tr>
                                <td>{{ $index+1}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->answers}}</td>
                                <td>{{$question->right_answer}}</td>
                                <td>{{$question->score}}</td>
                                <td>{{$question->quizze->name}}</td>
                                <td>
                                    <a href="{{route('questions.edit',$question->id)}}"
                                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete_question{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="questionpleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('questions.destroy','test')}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="questionpleModalLabel">{{ trans('questions_trans.delete_question') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p> {{ trans('messages.warning_deleted') }}</p>
                                            <input type="hidden" name="id"  value="{{$question->id}}">
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