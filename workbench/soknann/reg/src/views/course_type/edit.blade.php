@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-edit"></i> Subject Update Page</h1>
            <p>
                <a class="btn btn-primary" href="{{route('reg.subject.index')}}">
                    <i class="icon-backward"></i> Back to Subject List
                </a>
            </P>
        </div>

    </div>
    {{Former::open(route('reg.subject.update',$row->sub_id))->method('PUT')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('subject', 'Subject',$row->sub_name)}}
                            {{ Former::text('duration', 'Duration',$row->sub_duration)}}
                            {{ Former::text('price', 'Price ($)',$row->sub_cost)}}
                        </div>
                        <div class="col-lg-6">
                            {{Former::text('start', 'Start Date',$row->sub_start_date)
                            ->placeholder('YYYY-MM-DD')
                            ->readonly()}}
                            {{Former::text('end', 'End Date',$row->sub_end_date)
                            ->placeholder('YYYY-MM-DD')
                            ->readonly()}}
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
    $('#start').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#start').datepicker();

    $('#end').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end').datepicker();

</script>
@stop