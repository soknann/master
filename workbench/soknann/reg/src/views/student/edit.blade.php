@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-edit"></i> Student Update Page</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.student.index')}}">
                    <i class="icon-backward"></i> Back to Student List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.student.update',$row->st_id))->method('PUT')->enctype('multipart/form-data')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('st_id', 'ID',$row->st_id)->readonly()}}
                            {{ Former::text('kh_fname', 'KH First Name',$row->kh_fname)->required()}}
                            {{ Former::text('kh_lname', 'KH Last Name',$row->kh_lname)->required()}}
                            {{ Former::text('en_fname', 'EN First Name',$row->en_fname)->required()}}
                            {{ Former::text('en_lname', 'EN Last Name',$row->en_lname)->required()}}
                            {{ Former::select('gender', 'Gender', \Lookup::getStudentGender(),$row->gender)
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->required()}}
                            {{Former::text('dob', 'DOB',$row->dob)
                            ->placeholder(' yyyy-mm-dd')
                            ->required()->readonly()}}
                            {{ Former::text('pob', 'POB',$row->pob)}}

                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('address', 'Address',$row->address)->required() }}
                            {{ Former::text('phone', 'Phone',$row->phone)->required()}}
                            {{ Former::text('email', 'E-mail',$row->email)}}
                            {{ Former::file('attach_photo', 'Photo')}}
                            <div class="text-center">
                                <img style="margin-left: 60px;" src="<?php echo $row->photo;?>" width="120px" height="150px"/>
                            </div>
                            {{ Former::textarea('memo', 'Other',$row->memo)}}
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
    $('#dob').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#dob').datepicker();

</script>
@stop