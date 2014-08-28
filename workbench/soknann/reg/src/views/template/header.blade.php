
<div id="top">
<nav class="navbar navbar-fixed-top " style="padding-top: 10px; background-color: #008AB8; color: #ffffff;">
<a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
    <i class="icon-align-justify"></i>
</a>
<!-- LOGO SECTION -->
<header class="navbar-header">
    <div class="navbar-brand">
        <div class="container">
            <h4>{{ $logo }}</h4>
        </div>
    </div>
</header>

<!-- END LOGO SECTION -->
<ul class="nav navbar-top-links navbar-right">

<!--ADMIN SETTINGS SECTIONS -->
@if(Auth::check())
    @include('soknann/reg::template.setting')
@endif
<!--END ADMIN SETTINGS -->
</ul>

</nav>

</div>