<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     @yield('head')
    <title>Blog Home - Start Bootstrap Template</title>

    <script src="{{ asset('js/all-frontend.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


<!-- Styles -->
    <link href="{{asset('css/all-frontend.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@yield('navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
       @yield('sideBar')
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p class="small">Copyright &copy; Your Website 2019 tosinso</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

</body>

</html>
