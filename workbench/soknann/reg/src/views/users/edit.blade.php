@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>

    </div>
    {{Former::open(route('reg.user.update',$row->id))->method('PUT')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Former::text('first_name', 'First Name',$row->first_name)->required() }}
                            {{ Former::text('last_name', 'Last Name',$row->last_name)->required()}}
                            {{ Former::text('email', 'Email',$row->email)->required()}}

                            {{ Former::text('username', 'User Name',$row->username)->required() }}
                            {{ Former::password('password', 'Password')}}
                            {{ Former::password('password_confirmation', 'Confirm Password')}}
                        </div>
                        <div class="col-lg-6">
                            {{ Former::text('expire_day', 'Expire Day',$row->expire_day)->required() }}
                            {{Former::select('activated', 'Activated', \Lookup::getUserActiveList(),$row->activated)
                            ->placeholder('- Select One -')
                            ->required()}}
                            {{Former::text('activated_at', 'Activated Date',$row->activated_at)
                            ->placeholder(' dd-mm-yyyy')
                            }}

                            {{Former::select('group[]', 'Group')
                            ->options(\Lookup::getGroupList(),json_decode($row->group_id, true))
                            ->multiple()
                            ->required()}}
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
    $('#activated_at').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#activated_at').datepicker();

</script>
@stop