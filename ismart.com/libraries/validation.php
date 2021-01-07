<?php



function is_username($username) {
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten, $username, $matchs)) {
        return FALSE;
    }
    return TRUE;
}


function is_password($password) {
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten, $password, $matchs)) {
        return FALSE;
    }
    return TRUE;
}

function is_email($number) {
    $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $number, $matchs)) {
        return FALSE;
    }
    return TRUE;
}
// Cách 2:
function is_emails($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}



function is_phone_number($number) {
    $partten = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($partten, $number, $matchs)) {
        return FALSE;
    }
    return TRUE;
}

//In ra lỗi
function form_error($label_field){
    global $error;
    if (!empty($error[$label_field]))
        return "<p class='error'>{$error[$label_field]}</p>";
}


//Cố định giá tri trên thẻ
function set_value($label_field){
    global $$label_field;
    if(!empty($$label_field))
        return $$label_field;
}