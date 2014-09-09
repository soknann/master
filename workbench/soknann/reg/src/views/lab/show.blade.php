@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-desktop"></i> Lab Information</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.lab.index')}}">
                    <i class="icon-backward"></i> Back to Lab List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.lab.show',$row->lab_id))}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('lab', 'Lab Name',$row->lab_name)->readonly()}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::textarea('memo', 'Note',$row->lab_memo)->readonly()}}
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

@stop