@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-time"></i> Time Information</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.time.index')}}">
                    <i class="icon-backward"></i> Back to Time List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.time.show',$row->ti_id))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('time', 'Time',$row->time)->readonly()}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::select('weekly', 'Weekly', \Lookup::getWeekly(),$row->weekly)
                            ->placeholder('- Select One -')
                            ->class('form-control chzn-select')
                            ->readonly()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{Former::close()}}
</div>

@stop
@section('js')
<script>
    $('#dob').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#dob').datepicker();

</script>
@stop