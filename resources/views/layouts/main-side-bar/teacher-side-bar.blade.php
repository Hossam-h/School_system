<div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student">
                            <div class="pull-left"><i class="fa fa-building"></i><span class="right-nav-text">الطالب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Student" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('students.index')}}">student</a></li>
                        </ul>
                    </li>



                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attends">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">حضور الطلاب
                                    </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attends" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('studentAttend.index')}}">ِAttendes</a> </li>

                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exam">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">الامتحنات
                                    </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exam" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Exams.index')}}">قائمة الامتحانات</a> </li>
                            <li> <a href="{{route('Exams.create')}}">اضافة امتحان</a> </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">الاختبارات
                                    </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Quizzes" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Quizzes.index')}}">الاختبارات</a> </li>
                            <li> <a href="{{route('questions.index')}}">الاسئلة</a> </li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#personal">
                            <div class="pull-left"><i class="fa fa-building"></i><span class="right-nav-text">الملف الشحصي</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="personal" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('person')}}">الملف الشحصي</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#zoom">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">حصص اونلاين
                                    </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="zoom" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('online_classes.index')}}">حصة اونلاين</a> </li>

                        </ul>
                    </li>


                </ul>
            </div>
