@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-desktop"></i> Lab Update Page</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.lab.index')}}">
                    <i class="icon-backward"></i> Back to Lab List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.lab.update',$row->lab_id))->method('PUT')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('lab', 'Lab Name',$row->lab_name)->required()}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('memo', 'Note',$row->lab_memo)}}
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

@stop