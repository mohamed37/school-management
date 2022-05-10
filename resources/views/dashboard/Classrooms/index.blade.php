@extends('layouts.master')
    @section('css')    
    @toastr_css 


    @endsection

    {{
        $title = trans('classrooms_trans.title_page'),
      
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

                <button type="button" class="button x-small " data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classrooms_trans.add_class') }}
                </button>
               
                <button type="button" class="x-small btn btn-danger " id="btn_delete_all">
                    {{ trans('classrooms_trans.delete_checkbox') }}
                </button>
                
               
                <form id="filter_classes">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('Grades_trans.Search_By_Grade')}}</label>
                        
                        <select class="custom-select my-1 mr-sm-2"  name="grade_id" id="fillter" >
                            <option value="" selected disabled>{{ trans('Grades_trans.Search_By_Grade') }}</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  
                </form>

                <br><br>
           

                <!-- Index && Delete && Update -->
                <div class="table-responsive">

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ trans('classrooms_trans.name') }}</th>
                                <th>{{ trans('main_trans.grades') }}</th>
                                <th>{{ trans('main_trans.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($classrooms as $i=>$room)
                                <tr>

                                    <td><input type="checkbox"  value="{{ $room->id }}" class="box1" ></td>     
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->grades->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $room->id }}"
                                            title="{{ trans('classrooms_trans.edit') }}"><i class="fa fa-edit"></i></button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $room->id }}"
                                            title="{{ trans('classrooms_trans.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            
                                <!-- edit_modal_class -->
                                <div class="modal fade" id="edit{{ $room->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms_trans.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- update_form -->
                                                <form action="{{ route('classrooms.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $room->id }}">

                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('classrooms_trans.class_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name"
                                                                class="form-control"
                                                                value="{{ $room->getTranslation('name', 'ar') }}"
                                                                required>
                                                           
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('classrooms_trans.class_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $room->getTranslation('name', 'en') }}"
                                                                name="name_en" required>
                                                        </div>
                                                        
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">{{ trans('main_trans.grades') }} :</label>
                                                            <div class="box">
                                                                <select class="form-control" name="grade_id">    
                                                                @foreach($grades as $grade)
                                                                    <option value="{{$grade->id}}"
                                                                        {{$room->grade_id == $grade->id ? 'selected' : ''}}
                                                                        > {{$grade->name}}</option>
                                                                @endforeach
                                                            </select>
                                                         </div>
                                                        </div>
                    
                                                   
                                                    </div>
                                                   
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('main_trans.update') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_class -->
                                <div class="modal fade" id="delete{{ $room->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms_trans.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('classrooms.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('classrooms_trans.warning_class') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $room->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- End Of Index && Delete && Update -->
 
            </div>
        </div>
    </div>

    <!-- End of Index -->
    {{-- Model Delete All --}}
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Classrooms_trans.delete_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete_all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ trans('classrooms_trans.warning_class') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('main_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Model Delete All --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">

                        {{ trans('classrooms_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!-- add_modal_class -->
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('classrooms.store') }}" method="POST">
                        @csrf
                     <div class="card-body">

                        <div class="repeater">

                            <div data-repeater-list="List_Classes">
                              <div data-repeater-item>

                                <div class="row">

                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">{{ trans('classrooms_trans.class_name_ar') }}
                                            :</label>
                                        <input id="Name" type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">{{ trans('classrooms_trans.class_name_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="name_en" required>
                                    </div>
                                    @if($grades)
                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">{{ trans('main_trans.grades') }} :</label>
                                        <div class="box">
                                            <select class="form-control" name="grade_id">    
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}"> {{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                    </div>

                                  @else
                                   <p class="text-warning"> {{trans('messages.warning_deleted')}}</p>     
                                  @endif
                                    

                                    <div class="col">
                                        <label for="Name_en"
                                            class="mr-sm-2">{{ trans('main_trans.processes') }}
                                            :</label>
                                        <input class="btn btn-danger btn-block" data-repeater-delete
                                            type="button" value="{{ trans('classrooms_trans.delete_row') }}" />
                                    </div>

                                </div>

                                 <br><br>
                              </div>
                              
                            </div>

                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classrooms_trans.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('main_trans.submit') }}</button>
                            </div>
                        </div>

                     </div>
                    
                    </form>

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

    <script type="text/javascript">
        
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
        });

        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function(){
                var grade_val = $(this).val();
               
               if(grade_val){
                $.ajax({
                    url: "{{ URL::to('/admin/fillter_classes') }}/ "+grade_val ,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('tbody').empty().append(data.data);
                       
                    }
                    
                });
               }else{
                console.log('AJAX load did not work');
                }
            });
        });
        
        
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