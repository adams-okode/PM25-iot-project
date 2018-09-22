<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <title>Draw a line</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css')}}">
    <style>
        .navbar{
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        .card{
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info text-light">
        <a class="navbar-brand text-light" href="#">AirQ analyzer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
                </li>



            </ul>

        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card" style="width:auto;">

                    <div class="card-body">
                        <canvas id="DemoCanvas" width="1000" height="600">

                        </canvas>

                    </div>
                </div>

            </div>

        </div>
    </div>


    <script src="{{asset('css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css')}}"></script>
    @include('scripts')
    <script>
        var canvas = document.getElementById('DemoCanvas');

        function initilialize(canvas) {

            if (canvas.getContext) {
                var ctx = canvas.getContext("2d");

                //horizontal line
                ctx.lineWidth = 1;
                ctx.moveTo(0, 575);
                ctx.lineTo(canvas.width, 575);
                ctx.stroke();

                //vertical line
                ctx.lineWidth = 1;
                ctx.moveTo(50, 0);
                ctx.lineTo(50, canvas.width);
                ctx.stroke();


                /**for (i = 0; i < 600; i += 50) {
                    ctx.lineWidth = 1;
                    ctx.moveTo(0, i);
                    ctx.lineTo(canvas.width, i);
                    ctx.strokeStyle = "#F1F1F1";
                    ctx.stroke();
                }
                for (i = 0; i < 1000; i += 50) {
                    ctx.lineWidth = 1;
                    ctx.moveTo(i, 0);
                    ctx.lineTo(i, canvas.width / 2);
                    ctx.strokeStyle = "#F1F1F1";
                    ctx.stroke();
                }**/

            }
            generate_labelling(canvas);
        }



        function draw_line(x1, y1, x2, y2) {
            //horizontal line
            var ctx = canvas.getContext("2d");
            ctx.lineWidth = 2;
            ctx.moveTo(x1 + 25, 570 - y1);
            ctx.lineTo(x2 + 25, 570 - y2);
            ctx.stroke();

        }


        function generate_labelling(canvas) {
            if (canvas.getContext) {
                var ctx = canvas.getContext("2d");

                /***
                 *vertical scales
                 */
                for (i = 0; i < 600; i += 50) {
                    if (i == 0) {
                        ctx.fill();
                        ctx.fillText("", i, 600);
                        continue;
                    }
                    z = 600 - (i + 0);
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
                    ctx.fillText("" + i + "", i + 25, 600);
                }
            }
        }


        function plot_points(x, y) {
            var context = canvas.getContext("2d");
            context.beginPath();

            if (y <= 25) {
                y += 25;
            }

            //(x,y)
            context.arc((x + 50), (550 - y) + 50, 10, 0, Math.PI * 2);
            context.closePath();
            context.fill();
            context.fillText("(" + x + "," + y + ")", (x + 50) + 0, (550 - y) + 50 + 0);
        }


        var heatmap = h337.create({
            container: canvas
        });

        heatmap.setData({
            max: 5,
            data: [{ x: 10, y: 15, value: 5},]
        });

        draw_line(100, 250, 300, 250);
        draw_line(100, 50, 300, 50);

        draw_line(100, 250, 100, 50);
        draw_line(300, 250, 300, 50);
        

        plot_points(200, 170);
        initilialize(canvas);

    </script>
</body>

</html>






