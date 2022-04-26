
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

                     <!-- menu item students-->
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                           
                            <li> <a href="{{route('students.create')}}">{{trans('students_trans.add_student')}}</a></li>
                            <li> <a href="{{route('yourStudents')}}">{{trans('main_trans.students')}}</a></li>
                               
                        </ul>
                    </li>
                    <!-- End menu item students-->

                   
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

                   
                  
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
