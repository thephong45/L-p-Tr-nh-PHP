<html>

<head>
    <title>Trang đăng ký</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="wp-form-login">
    <h1 class="page-title">ĐĂNG KÍ TÀI KHOẢNG</h1>

    <form id="form-login" action="" method="POST">
        <input type="text" name="fullname" value="<?=set_value('fullname')?>" placeholder="Fullname" id="fullname">
        <?=form_error("fullname")?>
        <input type="text" name="email" value="<?=set_value('email')?>" placeholder="Email" id="email">
        <?=form_error("email")?>
        <input type="text" name="username" value="<?=set_value('username')?>" autocomplete="false" placeholder="Username" id="username">
        <?=form_error("username")?>
        <input type="password" name="password" value="<?=set_value('password')?>" autocomplete="false" placeholder="Password" id="password" >
        <?=form_error("password")?>
        <input type="submit" name="btn_reg" value="Đăng Kí" id="btn-login">
        <?=form_error("account")?>
    </form>
    <a href="<?= base_url("?mod=users&action=login")?>" id="lost-pass">Đăng nhập</a>

</div>

</body>
</html>

