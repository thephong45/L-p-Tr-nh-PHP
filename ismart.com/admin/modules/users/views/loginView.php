<html>

<head>
    <title>Trang đăng nhập</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="wp-form-login">
    <h1 class="page-title">ĐĂNG NHẬP</h1>

    <form id="form-login" action="" method="POST">
        <input type="text" name="username" value="<?=set_value('username')?>" autocomplete="false" placeholder="Username" id="username">
        <?=form_error("username")?>
        <input type="password" name="password" value="" autocomplete="false" placeholder="Password" id="password" >
        <?=form_error("password")?>
        <input type="submit" name="btn_login" value="Đăng Nhập" id="btn-login">
        <?=form_error("account")?>
    </form>


</div>

</body>
</html>

