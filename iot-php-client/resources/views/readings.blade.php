@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                @include('layout.menu')
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div id="display-rooms" class="card-body">

            </div>
        </div>

    </div>

</div>
@stop

@section('scripts')
<script>

    


    function getReadings() {
        $.get("{{ url('/room/getRoom') }}", function (data) {
            console.log(data);
            var rooms = JSON.parse(data);
            var display = document.getElementById('display-rooms');
            //console.log();
            var serialized = JSON.parse(rooms.data)['data'];
            //console.log(serialized['data']);

            for (var index = 0; index < serialized.length; index++) {
                var element = serialized[index];

                var info = '<a href="{{ url("view/room") }}?id=' +
                    element['id'] +
                    '">' +
                    '<div class="card col-md-3" style="width:auto;">' +
                    '<div class="card-body">' +
                    element['name'] +
                    '</div>' +
                    '</div>'
                '</a>';

                console.log(info);

                display.innerHTML += info;
            }
        });

    }
</script>
@stop