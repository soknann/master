@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-edit"></i> Teacher Update</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.teacher.index')}}">
                    <i class="icon-backward"></i> Back to Teacher List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.teacher.update',$row->tea_id))->method('PUT')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('tea_id', 'ID',$row->tea_id)->readonly()}}
                            {{ Former::text('tea_kh_fname', 'KH First Name',$row->tea_kh_fname)->required()}}
                            {{ Former::text('tea_kh_lname', 'KH Last Name',$row->tea_kh_lname)->required()}}
                            {{ Former::text('tea_en_fname', 'EN First Name',$row->tea_en_fname)->required()}}
                            {{ Former::text('tea_en_lname', 'EN Last Name',$row->tea_en_lname)->required()}}
                            {{ Former::select('tea_gender', 'Gender', \Lookup::getStudentGender(),$row->tea_gender)
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->required()}}
                            {{Former::text('tea_dob', 'DOB',$row->tea_dob)
                            ->placeholder(' yyyy-mm-dd')
                            ->required()->readonly()}}
                            {{ Former::text('tea_pob', 'POB',$row->tea_pob)}}

                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('tea_address', 'Address',$row->tea_address)->required() }}
                            {{ Former::text('tea_phone', 'Phone',$row->tea_phone)->required()}}
                            {{ Former::text('tea_email', 'E-mail',$row->tea_email)}}
                            {{ Former::file('attach_photo', 'Photo')}}
                            <div class="text-center">
                                <img style="margin-left: 60px;" src="<?php echo $row->tea_photo;?>" width="120px" height="150px"/>
                            </div>
                            {{ Former::textarea('tea_memo', 'Other'),$row->tea_memo}}
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
    $('#tea_dob').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#tea_dob').datepicker();

</script>
@stop