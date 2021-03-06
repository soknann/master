@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-time"></i> Time</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.time.index')}}">
                    <i class="icon-backward"></i> Back to Time List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.time.store'))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('time', 'Time')->required()}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::select('weekly', 'Weekly', \Lookup::getWeekly())
                            ->placeholder('- Select One -')
                            ->class('form-control chzn-select')
                            ->required()
                            ->readonly()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ Former::lg_primary_submit('Save') . '&nbsp;' . Former::lg_inverse_reset('Reset') }}
    </div>
    {{Former::close()}}
</div>

@stop

@section('js')

@stop