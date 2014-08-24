@if ( Session::has('info') )
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('info') }}
</div>
@endif

@if ( Session::has('error') )
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('error') }}
</div>
@endif

@if ( Session::has('errors') )
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Change a few things up and try submitting again.
</div>
@endif

@if ( Session::has('success') )
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('success') }}
</div>
@endif

@if ( Session::has('warning') )
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('warning') }}
</div>
@endif
<div id="alert" style="display: none"></div>
