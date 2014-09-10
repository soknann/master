@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-book"></i> Subject</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.subject.index')}}">
                    <i class="icon-backward"></i> Back to Subject List
                </a>

                <a class="btn btn-primary" href="{{route('reg.course_type.add')}}">
                    Go to Course Type <i class="icon-forward"></i>
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.subject.store'))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('subject', 'Subject')->required()}}
                            {{ Former::text('duration', 'Duration')}}
                            {{ Former::text('price', 'Price ($)')->required()}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::text('start', 'Start Date')
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                            {{Former::text('end', 'End Date')
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
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
<script>
    $('#start').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#start').datepicker();

    $('#end').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end').datepicker();

</script>
@stop