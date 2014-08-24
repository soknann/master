<!-- MENU SECTION -->
<div id="left">
<div class="media user-media well-small" style="padding-left: 18px;">
    <a class="user-link" href="#">
        <img class="media-object img-thumbnail user-img" alt="User Picture" src="{{ $mslogo }}"/>
    </a>

<!--    <div class="media-body">
        <h6 class="media-heading"> Joe Romlin</h6>
    </div>
    <br />-->
</div>

<ul id="menu" class="collapse">


<li class="panel">
    <a href="{{ route('reg.home')}}" >
        <i class="icon-pencil"></i> Registation
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.user.index')}}" >
        <i class="icon-user"></i> Users
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.teacher.index' )}}" >
        <i class="icon-user-md"></i> Teacher
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.student.index' )}}" >
        <i class="icon-user"></i> Students
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.subject.index' )}}" >
        <i class="icon-book"></i> Subject
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.student.index' )}}" >
        <i class="icon-archive"></i> Course
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.student.index' )}}" >
        <i class="icon-time"></i> Time
    </a>
</li>

<li class="panel">
    <a href="{{ route('reg.student.index' )}}" >
        <i class="icon-desktop"></i> Labs
    </a>
</li>

<li class="panel ">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
        <i class="icon-tasks"> </i> Report

                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-info">2</span>&nbsp;
    </a>
    <ul class="collapse" id="component-nav">

        <li class=""><a href="{{ route('reg.rpt_student.index')}}"><i class="icon-angle-right"></i> Student </a></li>
        <li class=""><a href="{{ route('reg.rpt_student.index')}}"><i class="icon-angle-right"></i> Teacher </a></li>
    </ul>
</li>
<li class="panel ">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
        <i class="icon-pencil"></i> Forms

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-success">5</span>&nbsp;
    </a>
    <ul class="collapse" id="form-nav">
        <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
        <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
        <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> Validation </a></li>
        <li class=""><a href="forms_fileupload.html"><i class="icon-angle-right"></i> FileUpload </a></li>
        <li class=""><a href="forms_editors.html"><i class="icon-angle-right"></i> WYSIWYG / Editor </a></li>
    </ul>
</li>

<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
        <i class="icon-table"></i> Pages

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-info">6</span>&nbsp;
    </a>
    <ul class="collapse" id="pagesr-nav">
        <li><a href="pages_calendar.html"><i class="icon-angle-right"></i> Calendar </a></li>
        <li><a href="pages_timeline.html"><i class="icon-angle-right"></i> Timeline </a></li>
        <li><a href="pages_social.html"><i class="icon-angle-right"></i> Social </a></li>
        <li><a href="pages_pricing.html"><i class="icon-angle-right"></i> Pricing </a></li>
        <li><a href="pages_offline.html"><i class="icon-angle-right"></i> Offline </a></li>
        <li><a href="pages_uc.html"><i class="icon-angle-right"></i> Under Construction </a></li>
    </ul>
</li>
<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
        <i class="icon-bar-chart"></i> Charts

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-danger">4</span>&nbsp;
    </a>
    <ul class="collapse" id="chart-nav">



        <li><a href="charts_line.html"><i class="icon-angle-right"></i> Line Charts </a></li>
        <li><a href="charts_bar.html"><i class="icon-angle-right"></i> Bar Charts</a></li>
        <li><a href="charts_pie.html"><i class="icon-angle-right"></i> Pie Charts </a></li>
        <li><a href="charts_other.html"><i class="icon-angle-right"></i> other Charts </a></li>
    </ul>
</li>

<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
        <i class=" icon-sitemap"></i> 3 Level Menu

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
    </a>
    <ul class="collapse" id="DDL-nav">
        <li>
            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL1-nav">
                <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


            </a>
            <ul class="collapse" id="DDL1-nav">
                <li>
                    <a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a>

                </li>
                <li>
                    <a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                <li>
                    <a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>

            </ul>

        </li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
    </ul>
</li>
<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
        <i class=" icon-folder-open-alt"></i> 4 Level Menu

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
    </a>
    <ul class="collapse" id="DDL4-nav">
        <li>
            <a href="#" data-parent="DDL4-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_1-nav">
                <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


            </a>
            <ul class="collapse" id="DDL4_1-nav">
                <li>

                    <a href="#" data-parent="#DDL4_1-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_2-nav">
                        <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="DDL4_2-nav">



                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                    </ul>



                </li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
            </ul>

        </li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
    </ul>
</li>
<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
        <i class="icon-warning-sign"></i> Error Pages

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-warning">5</span>&nbsp;
    </a>
    <ul class="collapse" id="error-nav">
        <li><a href="errors_403.html"><i class="icon-angle-right"></i> Error 403  </a></li>
        <li><a href="errors_404.html"><i class="icon-angle-right"></i> Error 404  </a></li>
        <li><a href="errors_405.html"><i class="icon-angle-right"></i> Error 405  </a></li>
        <li><a href="errors_500.html"><i class="icon-angle-right"></i> Error 500  </a></li>
        <li><a href="errors_503.html"><i class="icon-angle-right"></i> Error 503  </a></li>
    </ul>
</li>


<li><a href="gallery.html"><i class="icon-film"></i> Image Gallery </a></li>
<li><a href="{{ route('reg.user.index')}}"><i class="icon-table"></i> Data Tables </a></li>
<li><a href="maps.html"><i class="icon-map-marker"></i> Maps </a></li>

<!--<li><a href="grid.html"><i class="icon-columns"></i> Grid </a></li>
<li class="panel">
    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
        <i class="icon-check-empty"></i> Blank Pages

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
        &nbsp; <span class="label label-success">2</span>&nbsp;
    </a>
    <ul class="collapse" id="blank-nav">

        <li><a href="blank.html"><i class="icon-angle-right"></i> Blank Page One  </a></li>
        <li><a href="blank2.html"><i class="icon-angle-right"></i> Blank Page Two  </a></li>
    </ul>
</li>
<li><a href="login.html"><i class="icon-signin"></i> Login Page </a></li>-->

</ul>

</div>
<!--END MENU SECTION -->


