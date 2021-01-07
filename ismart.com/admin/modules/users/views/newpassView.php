<html>

<head>
    <title>Mật Khẩu Mới</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="wp-form-login">
    <h1 class="page-title">MẬT KHẨU MỚI</h1>
    <form id="form-login" action="" method="POST">
        <input type="password" name="password" value="<?=set_value('password')?>" autocomplete="false" placeholder="Password" id="password">
        <?=form_error("password")?>
        <input type="submit" id="btn-login" name="btn_new_pass" value="LƯU" >
        <?=form_error("account")?>
    </form>
    <a href="<?= base_url("?mod=users&action=login")?>" id="lost-pass">Đăng nhập</a> |
    <a href="<?= base_url("?mod=users&action=reg")?>" id="lost-pass">Đăng kí</a>

</div>

</body>
</html>

