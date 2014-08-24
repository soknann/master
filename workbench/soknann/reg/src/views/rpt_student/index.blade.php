@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            {{Former::open(route('reg.rpt_student.report'))->method('POST')->enctype('multipart/form-data')}}
            <h1 class="page-header"><i class="icon-user"></i> Report of Student</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Report here..!!!
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{Former::text('from', 'From: ')
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::text('to', 'To: ')
                            ->placeholder('YYYY-MM-DD')
                            ->required()->readonly()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ Former::lg_primary_submit('Report') . '&nbsp;' . Former::lg_inverse_reset('Reset') }}
    </div>
    {{Former::close()}}
</div>

@stop
@section('js')
<script>
    $('#from').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#from').datepicker();

    $('#to').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#to').datepicker();

</script>
@stop