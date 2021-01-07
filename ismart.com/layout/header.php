
<html>

<head>
    <title>Hệ thống điều hướng cơ bản</title>

    <base href="<?=base_url();?>">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
    <script src="public/js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="public/js/app.js" type="text/javascript"></script>

</head>

<body>
<div id="wrapper">
    <div id="header">
        <a href="" id="logo">Phan Trung</a>
            <div id="user-login">
<!--                <p>Xin chao <strong>--><?php //echo $_SESSION['user_login']?><!--</strong><a href="?mod=users&action=logout">(Thoat)</a></p>-->
            </div>
        <ul id="main-menu">
            <li><a href="">Trang chủ</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Bai Viet</a></li>
            <li><a href="">Thành Viên</a></li>
            <li><a href="">Don hang</a></li>
        </ul>
    </div>
