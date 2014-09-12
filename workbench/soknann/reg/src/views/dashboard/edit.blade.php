@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="icon-pencil"></i> Edit Register Page
            </h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.dashboard.index')}}">
                    <i class="icon-backward"></i> Back to Register page
                </a>
            </P>
        </div>
    </div>
    {{Former::open(route('reg.dashboard.update',$row->reg_id))->method('PUT')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registration here..!!!
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::select('student', 'Student Name')
                            ->options(\Lookup::getStudentList(),$row->stu_id)
                            ->placeholder("Select Student")
                            ->class("form-control")
                            ->required()}}
                            {{ Former::select('teacher', 'Teacher Name')
                            ->options(\Lookup::getTeacherList(),$row->tea_id)
                            ->placeholder("Select Teacher")
                            ->class("form-control")
                            ->required()}}
                            {{ Former::select('time', 'Time For Study')
                            ->options(\Lookup::getTime(),$row->ti_id)
                            ->placeholder("Select Time")
                            ->class("form-control")
                            ->required()}}
                            {{ Former::select('lab', 'Lab')
                            ->options(\Lookup::getLab(),$row->lab_id)
                            ->placeholder("Select Lab")
                            ->class("form-control")
                            ->required()}}

                        </div>
                        <div class="col-lg-6">
                            {{ Former::select('course[]', 'Course')
                            ->options(\Lookup::getCourseType(),json_decode($row->cou_de_id, true))
                            ->class("form-control")
                            ->multiple()
                            ->required()}}

                            {{Former::text('date', 'Date',$row->reg_date)
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ Former::lg_primary_submit('Submit') . '&nbsp;' . Former::lg_inverse_reset('Reset') }}
    </div>
    {{Former::close()}}
</div>
@stop

@section('js')
<script>
    $('#date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#date').datepicker();

    $('[name="student"]').chosen();
    $('[name="teacher"]').chosen();
    $('[name="time"]').chosen();
    $('[name="lab"]').chosen();
    $('[name="course[]"]').chosen();

</script>
@stop