@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="icon-user"></i> Student Register List</h1>
            <p>
               <a class="btn btn-primary" href="{{route('reg.home')}}">
                    <i class="icon-backward"></i> Back to Register Page
               </a>

                <a class="btn btn-primary" href="{{route('reg.student.index')}}">
                    <i class="icon-money"></i> Payment
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