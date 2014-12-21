<?php
namespace com\netroby\notes\app;

use com\netroby\notes\routes\DefaultRoute as DefaultRoute;

class Bootstrap
{
    public static function run()
    {
        switch ($_SERVER['REQUEST_URI']) {
            case "/":
                static::execute(DefaultRoute::$routes["/"]);
                break;
            default:
                return false;

        }
    }

    public static function execute($route)
    {
        list($action, $controller) = explode("@", $route);
        if (class_exists($controller)) {
            $c  = new \ReflectionClass($controller);
            $instance = $c->newInstance();
            $a = $c->getMethod($action);
            $a->invoke($instance);
        }
    }
}