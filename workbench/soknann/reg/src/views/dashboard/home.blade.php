@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="icon-pencil"></i> Registration Application For Master Center
            </h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.student.index')}}">
                    <i class="icon-money"></i> Payment
                </a>
            </P>
        </div>
    </div>
    {{Former::open(route('reg.student.store'))->method('POST')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registration here..!!!
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::select('kh_fname[]', 'Student Name')
                            ->options(\Lookup::getStudentList())
                            ->placeholder(" -Select Student- ")
                            ->class("form-control")
                            ->required()}}
                            {{ Former::text('kh_lname', 'Teacher Name')->required()}}
                            {{ Former::text('en_fname', 'Time')->required()}}
                            {{ Former::text('en_lname', 'Lab')->required()}}

                        </div>
                        <div class="col-lg-6">
                            {{ Former::select('course[]', 'Course', \Lookup::getStudentList())
                            ->placeholder('- Select One -')
                            ->class("form-control")
                            ->style("margin-bottom: 10px")
                            ->required()}}

                            {{Former::text('dob', 'Date')
                            ->placeholder('yyyy-mm-dd')
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

    $('[name="kh_fname[]"]').chosen();

    $('[name="course[]"]').chosen();

</script>
@stop