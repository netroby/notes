<?php
namespace com\netroby\app;
class Bootstrap
{
    public static function run() {
        var_dump($_SERVER['REQUEST_URI']);
    }
}