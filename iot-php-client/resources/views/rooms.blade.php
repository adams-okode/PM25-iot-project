@extends('layout.master')
@section('content')
<div class="alert alert-info" role="alert">
    Please Select A room To begin
</div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" id="v-pills-profile-tab" data-toggle="modal" data-target="#room-modal">New Room</a>
    </div>
</div>
<br>
<div class="row" id="display-rooms">
        

</div>
@stop

@section('scripts')
<script>
    function getRooms() {
        $.get("{{ url('/room/getRoom') }}", function (data) {
            console.log(data);
            var rooms = JSON.parse(data);
            var display = document.getElementById('display-rooms');

            display.innerHTML = '';
            //console.log();
            var serialized = JSON.parse(rooms.data)['data'];
            //console.log(serialized['data']);

            for (var index = 0; index < serialized.length; index++) {
                var element = serialized[index];

                var info = '<a style="padding-top:5px; padding-bottom:5px;" class="col-md-3" href="{{ url("view/room") }}?id=' +
                    element['id'] +
                    '">' +
                    '<div class="card" style="width:auto;">' +
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



    function create_room() {
        var name = document.getElementById('room-name').value;

        $.post("{{ url('/room/createRoom') }}", {
            name: name,

        }, function (data, status) {
            console.log(data);
            $('#room-modal').modal('hide');
            status_message('Room created', 'success')
            getRooms();
        });

    }

    function status_message(message, type) {

        var success = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
            '<strong>Success</strong>' +
            message +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';

        var error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
            '<strong>Holy guacamole!</strong>' +
            message +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';

        switch (type) {
            case 'success':
                var active = success;
                break;

            case 'error':
                var active = error;

                break;

            default:
                break;
        }

        var container = document.getElementById('success-message');

        container.innerHTML = active;

        setInterval(function (container) {
            container.innerHTML = '';
        }, 5000)

    }


    getRooms();
</script>
@stop