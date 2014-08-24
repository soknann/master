@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>

    </div>
    {{Former::open(route('reg.user.store'))->method('POST')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('first_name', 'First Name')->required() }}
                            {{ Former::text('last_name', 'Last Name')->required()}}
                            {{ Former::text('email', 'Email')->required()}}

                            {{ Former::text('username', 'User Name')->required() }}
                            {{ Former::password('password', 'Password')->required()}}
                            {{ Former::password('password_confirmation', 'Confirm Password')->required()}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::text('expire_day', 'Expire Day')->required() }}
                            {{Former::select('activated', 'Activated', \Lookup::getUserActiveList())
                            ->placeholder('- Select One -')
                            ->class("form-control chzn-select")
                            ->required()}}
                            {{Former::text('activated_at', 'Activated Date')
                            ->placeholder(' dd-mm-yyyy')
                            }}

                            {{Former::select('group[]', 'Group')
                            ->options(\Lookup::getGroupList())
                            ->multiple()
                            ->required()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ Former::lg_primary_submit('Save') . '&nbsp;' . Former::lg_inverse_reset('Reset') }}
    </div>
    {{Former::close()}}
</div>

@stop

@section('js')
    <script>
        $('#activated_at').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#activated_at').datepicker();

    </script>
@stop