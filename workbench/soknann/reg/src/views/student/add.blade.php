@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-user"></i> Student</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.student.index')}}">
                    <i class="icon-backward"></i> Back to Student List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.student.store'))->method('POST')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('kh_fname', 'KH First Name')->required()}}
                            {{ Former::text('kh_lname', 'KH Last Name')->required()}}
                            {{ Former::text('en_fname', 'EN First Name')->required()}}
                            {{ Former::text('en_lname', 'EN Last Name')->required()}}
                            {{ Former::select('gender', 'Gender', \Lookup::getStudentGender())
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->required()}}
                            {{Former::text('dob', 'DOB')
                            ->placeholder('yyyy-mm-dd')
                            ->required()->readonly()}}
                            {{ Former::text('pob', 'POB')}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('address', 'Address')->required() }}
                            {{ Former::text('phone', 'Phone')->required()}}
                            {{ Former::text('email', 'E-mail')}}
                            {{ Former::file('attach_photo', 'Photo')}}
                            {{ Former::textarea('memo', 'Other')}}
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
    $('#dob').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#dob').datepicker();

</script>
@stop