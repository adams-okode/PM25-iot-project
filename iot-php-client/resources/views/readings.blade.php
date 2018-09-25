@extends('layout.master')
@section('content')
<style>
    body,
    html {
        margin: 0;
        padding: 0;
    }

    #heatmapContainerWrapper {
        width: 1000px;
        height: 400px;
        margin: auto;
        background: rgba(0, 0, 0, .1);
    }

    #heatmapContainer {
        width: 100%;
        height: 100%;
    }

</style>
<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-2">
        <a data-toggle="modal" data-target="#reading-modal" class="btn btn-info">Dummy Readings</a>
    </div>
    <div class="col-md-2">
        <a href="{{ url('/reading/deleteAll') }}?id={{ @$id }}" class="btn btn-danger">Clear Readings</a>
    </div>

</div>
<br>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="heatmapContainerWrapper">
                <div id="heatmapContainer">

                </div>
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



    window.onload = function () {
        var heatmap = h337.create({
            container: document.getElementById('heatmapContainer'),
            opacity: .7,
            blur: .75,
            gradient: {
                '.5': 'blue',
                '.8': 'red',
                '.95': 'white'
            }
        });

        var h = heatmap;


        var d = [];

        var readings = {!!json_encode($readings) !!}

        var loath = JSON.parse(JSON.stringify(readings));
        loath.forEach(element => {
            element['readings'].forEach(read => {
                d.push({
                    x: read['x'],
                    y: read['y'],
                    value: read['value'],
                });
            });
        });

        console.log(d)
        h.setData({
            min: 1,
            max: 1000000,
            data: d
        });

        getWalls();


    }


    function createLineElement(x, y, length, angle) {
        var line = document.createElement("div");
        var styles = 'border: 1px solid black; ' +
            'width: ' + length + 'px; ' +
            'height: 0px; ' +
            '-moz-transform: rotate(' + angle + 'rad); ' +
            '-webkit-transform: rotate(' + angle + 'rad); ' +
            '-o-transform: rotate(' + angle + 'rad); ' +
            '-ms-transform: rotate(' + angle + 'rad); ' +
            'position: absolute; ' +
            'top: ' + y + 'px; ' +
            'left: ' + x + 'px; ';
        line.setAttribute('style', styles);
        return line;
    }


    function createLine(x1, y1, x2, y2) {
        var a = x1 - x2,
            b = y1 - y2,
            c = Math.sqrt(a * a + b * b);

        var sx = (x1 + x2) / 2,
            sy = (y1 + y2) / 2;

        var x = sx - c / 2,
            y = sy;

        var alpha = Math.PI - Math.atan2(-b, a);

        return createLineElement(x, y, c, alpha);
    }


    function getWalls() {

        $.get("{{ url('/wall/getClassified') }}?id={{ @$id }}", function (data) {
            console.log("wall data");
            console.log(data);
            var dat = document.getElementById('heatmapContainer')
            var walls = JSON.parse(data);
            var serialized = JSON.parse(walls.data)['data'];

            for (var index = 0; index < serialized.length; index++) {
                var element = serialized[index];

                dat.appendChild(createLine(parseInt(element['x1']), parseInt(element['y1']), parseInt(element[
                    'x2']), parseInt(
                    element['y2'])));

            }
        });

    }


    function create_reading() {
        var x = document.getElementById('reading-x').value;
        var y = document.getElementById('reading-y').value;
        var value = document.getElementById('reading-value').value;
        var sensor_id = document.getElementById('reading-sensor').value;

        $.post("{{ url('/reading/postReading') }}", {
            x: x,
            y: y,
            value:value,
            sensor_id: parseInt(sensor_id),
        }, function (data, status) {

            console.log(data);

            $('#reading-modal').modal('hide');
            status_message('Line created', 'success')
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
    //dat.appendChild(createLine(100, 100, 200, 200));

</script>
@stop
