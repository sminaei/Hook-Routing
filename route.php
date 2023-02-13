<?php
require_once "bootstrap.php";

if(isset($_GET["q"])){
    $routes = explode("/",$_GET["q"]);
    $main_route = $routes[0];
    echo route($main_route,@$routes[1]);
}
//متغیر q از htaccess گرفته شده متغیر روت با استفاده
// از جداکننده ورودی را دریافت و نمایش می دهد. عنصر اول ارایه را نمایش میدهد .