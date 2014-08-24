@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-list"></i> Subject List</h1>
            <p>
               <a class="btn btn-primary" href="{{route('reg.subject.add')}}">
                    <i class="icon-folder-open"></i> Add New
               </a>
            </P>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                {{$table}}
        </div>
    </div>
</div>

@stop
@section('js')

@stop