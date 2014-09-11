@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-archive"></i> Course Update Page</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.course.index')}}">
                    <i class="icon-backward"></i> Back to Subject List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.course.update',$row->cou_id))->method('PUT')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::select('cou_name[]', 'Course')
                            ->options(\Lookup::getCourseType(),json_decode($row->cou_de_id, true))
                            ->class("form-control chzn-select")
                            ->placeholder("Select Course")->required()}}
                            {{ Former::text('semester', 'Semester',$row->cou_semester)->required()}}
                            {{ Former::text('amount', 'Amount Of Student',$row->cou_amount_of_student)->required()}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::text('start', 'Start Date',$row->cou_start_date)
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                            {{Former::text('end', 'End Date',$row->cou_end_date)
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ Former::lg_primary_submit('Save') . '&nbsp;' . Former::lg_inverse_reset('Cancel') }}
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

    $('[name="cou_name[]"]').chosen();

</script>
@stop