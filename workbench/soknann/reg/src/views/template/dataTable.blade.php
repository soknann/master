<table class="table table-striped table-bordered {{ $class = str_random(8) }}">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach

    </tr>
    </thead>
    <tbody>

    @foreach($data as $j=>$d)
    <tr>
        @foreach($d as $dd)
        <td>{{ $dd }}</td>
        @endforeach

    </tr>
    @endforeach
    </tbody>
</table>
<div style="padding-bottom: 20px"></div>
<script type="text/javascript">
    $(document).ready(function(){
        // dynamic table
        jQuery('.{{ $class }}').dataTable({
            "sPaginationType": "full_numbers",
            "bProcessing": true,
            "aaSorting": [[ 1, "desc" ]],
            /*"bJQueryUI": true,*/

        @foreach ($options as $k => $o)
        {{ json_encode($k) }}: {{ json_encode($o) }},
        @endforeach
            @foreach ($callbacks as $k => $o)
        {{ json_encode($k) }}: {{ $o }},
        @endforeach

        /*"fnDrawCallback": function(oSettings) {
            jQuery.uniform.update();
        }*/


    });
    /*@if (isset($values['table-url']))
        $('.{{$class}}').hover(function() {
            $(this).css('cursor', 'pointer');

        });
    $('.{{$class}}').on('click', 'tbody tr', function(e) {
        $id = e.currentTarget.children[0].innerHTML;
        $url = e.currentTarget.baseURI;
        document.location.href = "{{ $values['table-url'] }}/" + $id;
    });
    @endif*/
    // custom values are available via $values array
    });
</script>
<style>
    #DataTables_Table_0 tr.odd:hover td {
        background-color: #bae6ff;
    }

    #DataTables_Table_0 tr.even:hover td{
        background-color: #bae6ff;
    }
</style>
