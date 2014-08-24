@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-user"></i> Student Information</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.student.index')}}">
                    <i class="icon-backward"></i> Back to Student List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.student.show',$row->st_id))->method('PUT')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('st_id', 'ID',$row->st_id)->readonly()}}
                            {{ Former::text('kh_fname', 'KH First Name',$row->kh_fname)->readonly()}}
                            {{ Former::text('kh_lname', 'KH Last Name',$row->kh_lname)->readonly()}}
                            {{ Former::text('en_fname', 'EN First Name',$row->en_fname)->readonly()}}
                            {{ Former::text('en_lname', 'EN Last Name',$row->en_lname)->readonly()}}
                            {{ Former::select('gender', 'Gender', \Lookup::getStudentGender(),$row->gender)
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->readonly()}}
                            {{Former::text('dob', 'DOB',$row->dob)
                            ->placeholder(' yyyy-mm-dd')
                            ->readonly()}}
                            {{ Former::text('pob', 'POB',$row->pob)->readonly()}}

                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('address', 'Address',$row->address)->readonly()}}
                            {{ Former::text('phone', 'Phone',$row->phone)->readonly()}}
                            {{ Former::text('email', 'E-mail',$row->email)->readonly()}}
                            <div class="text-center">
                                <img style="margin-left: 60px;" src="<?php echo $row->photo;?>" width="120px" height="150px"/>
                            </div>
                            {{ Former::textarea('memo', 'Other',$row->memo)->readonly()}}
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
    $('#dob1').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#dob1').datepicker();

</script>
@stop