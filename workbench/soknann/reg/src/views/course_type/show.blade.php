@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-archive"></i> Show Information</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.course_type.index')}}">
                    <i class="icon-backward"></i> Back to Course Type List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.course_type.show',$row->cou_de_id))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('cou_name', 'Course',$row->cou_de_name)->readonly()}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::select('sub_id[]', 'Subject')
                            ->options(\Lookup::getSubjectList(),json_decode($row->sub_id, true))
                            ->class("form-control chzn-select")
                            ->multiple()
                            ->required()}}
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

    $('[name="sub_id[]"]').chosen();

</script>
@stop