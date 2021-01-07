<html>

<head>
    <title>Trang Quên Mật Khẩu</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="wp-form-login">
    <h1 class="page-title">KHÔI PHỤC MẬT KHẨU</h1>
    <form id="form-login" action="" method="POST">
        <input type="text" name="email" value="<?=set_value('email')?>" autocomplete="false" placeholder="Email" id="username">
        <?=form_error("email")?>
        <input type="submit" id="btn-login" name="btn_reset" value="GỬI YÊU CẦU" >
        <?=form_error("account")?>
    </form>
    <a href="<?= base_url("?mod=users&action=login")?>" id="lost-pass">Đăng nhập</a> |
    <a href="<?= base_url("?mod=users&action=reg")?>" id="lost-pass">Đăng kí</a>

</div>

</body>
</html>

