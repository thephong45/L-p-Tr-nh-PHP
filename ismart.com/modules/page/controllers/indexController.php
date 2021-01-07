<?php

function construct(){
//    echo "Dùng chung, load đầu tiên";

}
function indexAction(){
//    load_view('index');

}

function detailAction(){

    echo $_GET['id'];
//    echo $_GET['slug'];
    load_view('index');

}

function addAction(){

}

function editAction(){

}