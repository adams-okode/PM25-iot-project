<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css')}}">
    <style>
        body {
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #f1f1f1;
        }
        .navbar{
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .card{
           /***
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
           */
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
                    <a class="nav-link text-light" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>

            </ul>

        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <div id="success-message">
           
        </div>

        
        @yield('content')
    </div>

    @include('layout.main-modals')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('css/bootstrap-4.0.0/bootstrap-4.0.0/dist/js/bootstrap.min.js')}}"></script>

    @yield('scripts')
</body>

</html>