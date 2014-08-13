<?php
class Cookie
{
    static function setCookie($name, $value='', $expires=0, $path='', $domain='', $secure=false,$httponly=true){
        setcookie ($name, $value,$expires,$path,$domain,$secure,$httponly);
    } 
}
