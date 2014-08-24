@extends('soknann/reg::template.master')

@section('content')

<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-user-md"></i> Teacher</h1>
        </div>

    </div>
    {{Former::open(route('reg.teacher.store'))->method('POST')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('tea_kh_fname', 'KH First Name')->required()}}
                            {{ Former::text('tea_kh_lname', 'KH Last Name')->required()}}
                            {{ Former::text('tea_en_fname', 'EN First Name')->required()}}
                            {{ Former::text('tea_en_lname', 'EN Last Name')->required()}}
                            {{ Former::select('tea_gender', 'Gender', \Lookup::getStudentGender())
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->required()}}
                            {{Former::text('tea_dob', 'DOB')
                            ->placeholder('yyyy-mm-dd')
                            ->required()->readonly()}}
                            {{ Former::text('tea_pob', 'POB')}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('tea_address', 'Address')->required() }}
                            {{ Former::text('tea_phone', 'Phone')->required()}}
                            {{ Former::text('tea_email', 'E-mail')}}
                            {{ Former::file('attach_photo', 'Photo')}}
                            {{ Former::textarea('tea_memo', 'Other')}}
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
    $('#tea_dob').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#tea_dob').datepicker();

</script>
@stop