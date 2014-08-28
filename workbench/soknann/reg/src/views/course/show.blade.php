@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-book"></i> Subject Information</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.subject.index')}}">
                    <i class="icon-backward"></i> Back to Subject List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.subject.show',$row->sub_id))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('subject', 'Subject',$row->sub_name)->readonly()}}
                            {{ Former::text('duration', 'Duration',$row->sub_duration)->readonly()}}
                            {{ Former::text('price', 'Price',$row->sub_cost)->readonly()}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::text('start', 'Start Date',$row->sub_start_date)
                            ->placeholder('YYYY-MM-DD')
                            ->readonly()}}
                            {{Former::text('end', 'End Date',$row->sub_end_date)
                            ->placeholder('YYYY-MM-DD')
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