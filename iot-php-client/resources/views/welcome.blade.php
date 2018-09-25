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
        <div class="card" style="width:auto;">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/view/room/readings') }}?id={{ @$id }}" class="btn btn-primary">Readings</a>
                    </div>

                </div>
                <br>
                <div class="row" style="padding-left:30px;">
                    <canvas id="DemoCanvas" width="1000" height="400">

                    </canvas>
                </div>

            </div>
        </div>

    </div>

</div>
@stop


@section('scripts')
<script>
    var canvas = document.getElementById('DemoCanvas');

    function initilialize(canvas) {

        if (canvas.getContext) {
            var ctx = canvas.getContext("2d");

            //horizontal line
            ctx.lineWidth = 1;
            ctx.moveTo(0, 375);
            ctx.lineTo(canvas.width, 375);
            ctx.stroke();

            //vertical line
            ctx.lineWidth = 1;
            ctx.moveTo(50, 0);
            ctx.lineTo(50, canvas.width);
            ctx.stroke();


            for (i = 0; i < 500; i += 50) {
                ctx.lineWidth = 1;
                ctx.moveTo(0, i);
                ctx.lineTo(canvas.width, i);
                ctx.strokeStyle = "#F1F1F1";
                ctx.closePath();
                ctx.stroke();
            }
            for (i = 0; i < 1000; i += 50) {
                ctx.lineWidth = 1;
                ctx.moveTo(i, 0);
                ctx.lineTo(i, canvas.width / 2);
                ctx.strokeStyle = "#F1F1F1";
                ctx.closePath();
                ctx.stroke();
            }

        }
        generate_labelling(canvas);
    }



    function draw_line(x1, y1, x2, y2) {

        console.log(x1 + ',' + y1 + '|' + x2 + ',' + y2)
        //horizontal line
        var ctx1 = canvas.getContext("2d");
        ctx1.lineWidth = 2;
        ctx1.moveTo(x1 + 25, 370 - y1);
        ctx1.lineTo(x2 + 25, 370 - y2);
        ctx1.strokeStyle = "#000000";
        ctx1.closePath();
        ctx1.stroke();

    }


    function generate_labelling(canvas) {
        if (canvas.getContext) {
            var ctx = canvas.getContext("2d");

            /***
             *vertical scales
             */
            for (i = 0; i < 400; i += 50) {
                if (i == 0) {
                    ctx.fill();
                    ctx.fillText("", i, 400);
                    continue;
                }
                z = 400 - (i + 25);
                ctx.fill();
                ctx.fillText("" + i + "", 50, z);
            }

            /***
             * horizontal scale
             * */
            for (i = 0; i < 1000; i += 50) {
                if (i == 0) {
                    ctx.fill();
                    ctx.fillText("", i, 1000);
                    continue;
                }
                ctx.fill();
                ctx.fillText("" + i + "", i + 25, 400);
            }
        }
    }


    function plot_points(x, y) {
        var context = canvas.getContext("2d");
        context.beginPath();

        if (y <= 25) {
            y += 25;
        }

        console.log(x + ',' + y);
        context.arc((x + 50), (350 - y) + 50, 10, 0, Math.PI * 2);
        context.closePath();
        context.fill();
        context.fillText("(" + x + "," + y + ")", (x + 50) + 0, (350 - y) + 50 + 0);
    }


    function create_wall() {
        var x1 = document.getElementById('wall-x1').value;
        var y1 = document.getElementById('wall-y1').value;
        var x2 = document.getElementById('wall-x2').value;
        var y2 = document.getElementById('wall-y2').value;

        //draw_line(100, 50, 300, 50);

        $.post("{{ url('/wall/createWall') }}", {
            x1: x1,
            y1: y1,
            x2: x2,
            y2: y2,
            id: "{{ @$id }}"
        }, function (data, status) {
            console.log(data);
            draw_line(parseInt(x1), parseInt(y1), parseInt(x2), parseInt(y2));

            $('#wall-modal').modal('hide');
            status_message('Line created', 'success')
        });

    }


    function create_anchor() {
        var x1 = document.getElementById('anchor-x1').value;
        var y1 = document.getElementById('anchor-y1').value;
        var tag = document.getElementById('anchor-tag').value;

        //draw_line(100, 50, 300, 50);
        $.post("{{ url('/sensor/createSensor') }}", {
            x1: x1,
            y1: y1,
            tag:tag,
            id: "{{ @$id }}"
        }, function (data, status) {
            console.log(data);
            plot_points(parseInt(x1), parseInt(y1));
            $('#anchor-modal').modal('hide');
            status_message('Anchor created', 'success')
        });

    }


    //draw_line(100, 50, 300, 50);

    //draw_line(100, 250, 100, 50);
    //draw_line(300, 250, 300, 50);

    function getWalls() {
        $.get("{{ url('/wall/getClassified') }}?id={{ @$id }}", function (data) {
            console.log(data);
            var walls = JSON.parse(data);
            var serialized = JSON.parse(walls.data)['data'];

            for (var index = 0; index < serialized.length; index++) {
                var element = serialized[index];
                draw_line(parseInt(element['x1']), parseInt(element['y1']), parseInt(element['x2']), parseInt(
                    element['y2']));

            }
        });

    }


    function getSensors() {
        $.get("{{ url('/sensor/getClassified') }}?id={{ @$id }}", function (data) {
            console.log(data);
            var sensors = JSON.parse(data);
            var serialized = JSON.parse(sensors.data)['data'];

            for (var index = 0; index < serialized.length; index++) {
                var element = serialized[index];
                plot_points(parseInt(element['x2']), parseInt(element['y2']));

            }
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

    

    getWalls();
    getSensors();
    initilialize(canvas);
    //getRooms();

</script>
@stop
