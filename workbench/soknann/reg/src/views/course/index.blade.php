@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-list"></i> Course List</h1>
            <p>
               <a class="btn btn-primary" href="{{route('reg.course.add')}}">
                    <i class="icon-folder-open"></i> Add New
               </a>
                <a class="btn btn-primary" href="{{route('reg.course_type.index')}}">
                    <i class="icon-archive"></i> Course Type
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