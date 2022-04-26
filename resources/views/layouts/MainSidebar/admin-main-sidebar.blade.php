
{{$type = 'web'}}
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard')}}" >
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                       
                    </li>
                    <!--End menu Dashboard -->

                    
                    
                    <!-- menu item Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{trans('main_trans.grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">{{trans('main_trans.all')}}</a></li>
                           
                        </ul>
                    </li>

                    <!-- menu item ClassRooms-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('main_trans.classrooms')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('classrooms.index')}}">{{trans('main_trans.all')}} </a> </li>
                            
                        </ul>
                    </li>

                    <!-- menu item Sections-->
                    <li>
                        <a href="{{route('sections.index')}}">
                            <i class="fas fa-chalkboard"></i><span class="right-nav-text">{{trans('main_trans.sections')}}</span> 
                        </a>
                    </li>
                    
                    <!-- menu item AddParent-->
                    <li>
                        <a href="{{URL('admin/add_parent')}}"><i class="fas fa-user-tie"></i><span class="right-nav-text">
                           {{ trans('main_trans.parents') }}
                            </span></a>
                    </li>

                    <!-- menu item Teachers-->
                    <li>
                        <a href="{{route('teachers.index')}}"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">
                            {{ trans('main_trans.teachers') }}</span>
                             <span class="badge badge-pill badge-warning float-right mt-1">{{App\Models\Teacher::count()}}</span> </a>
                    </li>
                    <!-- End menu item Teachers-->
                    
                     <!-- menu item students-->
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('students_trans.student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{route('students.create')}}">{{trans('students_trans.add_student')}}</a></li>
                                    <li> <a href="{{route('students.index')}}">{{trans('main_trans.students')}}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('students_trans.promotion_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{route('promotion.create')}}">{{trans('promotion_trans.add_promotion')}}</a></li>
                                    <li> <a href="{{route('promotion.index')}}">{{trans('promotion_trans.promotion')}}</a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('graduate_trans.graduates')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{route('graduate.create')}}">{{trans('graduate_trans.add_graduate')}}</a> </li>
                                    <li> <a href="{{route('graduate.index')}}">{{trans('graduate_trans.graduates')}}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- End menu item students-->

                    <!-- menu item Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('main_trans.fees')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">{{trans('main_trans.feesGrade')}}</a> </li>
                            <li> <a href="{{route('feesInovice.index')}}">{{trans('main_trans.fees_invoices')}} </a> </li>
                            <li> <a href="{{route('processingFees.index')}}">{{trans('main_trans.processingFees')}} </a> </li>
                            <li> <a href="{{route('receipt_students.index')}}">{{trans('main_trans.receipt_students')}} </a> </li>
                            <li> <a href="{{route('payment_students.index')}}">{{trans('main_trans.payment_students')}} </a> </li>
                            
                        </ul>
                    </li>

                     <!-- menu item Attendances-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
                            <div class="pull-left"><i class="fa fa-calendar"></i><span
                                    class="right-nav-text">{{trans('main_trans.attendances')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendances.index')}}">{{trans('main_trans.students')}}</a> </li>
                            
                            
                        </ul>
                    </li>

                     <!-- menu item subjects-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subjects">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{trans('main_trans.subjects')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subjects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">{{trans('main_trans.subjects')}}</a> </li>                              
                       </ul>
                    </li>

                   
                    <!-- menu item exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{trans('main_trans.exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('exams.index')}}">{{trans('main_trans.exams')}}</a> </li>
                            <li> <a href="{{route('exams.create')}}">{{trans('exams_trans.add_exam')}}</a> </li>
                               
                        </ul>
                    </li>
                    <!-- menu item quizzes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizzes">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{trans('main_trans.quizzes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="quizzes" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('quizzes.index')}}">{{trans('main_trans.quizzes')}}</a> </li>
                            <li> <a href="{{route('quizzes.create')}}">{{trans('quizzes_trans.add_quizze')}}</a> </li>
                            
                            
                        </ul>
                    </li>

                     <!-- menu item questions-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#questions">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                    class="right-nav-text">{{trans('main_trans.questions')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="questions" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('questions.index')}}">{{trans('main_trans.questions')}}</a> </li>
                            <li> <a href="{{route('questions.create')}}">{{trans('questions_trans.add_question')}}</a> </li>
                            
                            
                        </ul>
                    </li>

                     <!-- menu item online_class-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online_class">
                            <div class="pull-left"><i class="fas fa-video"></i><span
                                    class="right-nav-text">{{trans('main_trans.online_classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online_class" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('online_class.index')}}">{{trans('online_class_trans.online_classes')}}</a> </li>
                            <li> <a href="{{route('online_class.create')}}">{{trans('online_class_trans.add_online_class')}}</a> </li>
                            
                            
                        </ul>
                    </li>

                    <!-- menu item library-->
                    
                     <li> <a href="{{route('library.index')}}"> <i class="fa fa-book"></i> <span class="right-nav-text">{{trans('main_trans.libraries')}}</span></a> </li>

                     <!-- menu item settings-->
                    
                     <li> <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.settings')}}</span></a> </li>
                        
                  
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
