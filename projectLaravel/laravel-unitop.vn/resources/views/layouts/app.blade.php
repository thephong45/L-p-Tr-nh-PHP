<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<div id="warpper">
    <div id="header">
        <h1>Header</h1>
    </div>

    <div id="wp-content">
        <div id="content">
            @yield('content')
        </div>
        <div id="sidebar">
{{--           @section('sidebar')--}}
{{--               <p>Khối tìm kiếm</p>--}}
{{--            @show--}}
        </div>
    </div>

    <div id="footer">
        <h1>Footer</h1>
    </div>


</div>

</body>
</html>
