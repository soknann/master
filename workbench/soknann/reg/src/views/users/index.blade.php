@extends('soknann/reg::template.master')

@section('content')
<div class="inner col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
            <p><a class="btn btn-primary" href="{{route('reg.user.add')}}">Add New</a></P>
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
    <script>
/*        *//**
         * Create a confirm modal
         * We want to send an HTTP DELETE request
         *
         * @usage  <a href="posts/2" data-method="delete"
         *         	data-modal-text="Are you sure you want to delete"
         *         >
         *
         *
         * @author Steve Montambeault
         * @link   http://stevemo.ca
         *
         *//*
        $(function() {
            $(document).on("click", "a[data-method]", function(e) {
                var link = $(this);

                var httpMethod = link.data('method').toUpperCase();
                var allowedMethods = ['PUT', 'DELETE'];
                var extraMsg = link.data('modal-text');
//alert("hello"); return;

                var msg  = '<div class="input-group"><i class="icon-warning-sign modal-icon"></i>&nbsp;Are you sure you want to&nbsp;' + extraMsg;
                //var codeRandom = encode64(randomString());
                //var txt = '<input autofocus type="text" id="txt" name="txt" class="col-md-12 form-control" value='+codeRandom+' /></div>';
                //txt.val('hello');
                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.

                if ( $.inArray(httpMethod, allowedMethods) == - 1 )
                {
                    return;
                }
                bootbox.dialog({
                    message: msg,
                    title: "Please Confirm",
                    buttons: {
                        success: {
                            label: "OK",
                            className: "btn-success",
                            callback: function() {
                                //if($('#txt').val() != decode64(codeRandom)){  return false;}
                                var form =
                                    $('<form>', {
                                        'method': 'POST',
                                        'action': link.attr('href')
                                    });
                                var hiddenInput =
                                    $('<input>', {
                                        'name': '_method',
                                        'type': 'hidden',
                                        'value': link.data('method')
                                    });

                                form.append(hiddenInput).appendTo('body').submit();
                            }
                        },
                        danger: {
                            label: "Close",
                            className: "btn-default"
                        }

                    }
                });
                return false;
            });
        });*/
    </script>
@stop