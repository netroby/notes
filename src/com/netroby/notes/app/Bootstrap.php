<?php
namespace com\netroby\notes\app;

class Bootstrap
{
    public static function run()
    {
        $req_info = parse_url($_SERVER['REQUEST_URI']);
        $path = $req_info['path'];
        $action = "index";
        if ($path === "/" || $path === null) {
            $controller = "home";
        } else {
            $paths = explode(" ", trim(str_replace("/", " ", $path)));
            $controller = array_shift($paths);
            if (count($paths)>1) {
                $action = implode("_", $paths);                
            } else if (count($paths) > 0) {
                $action = $paths[0];                
            }
        }
        $action = static::filterVars($action);
        $controller = static::filterVars($controller);
        static::execute($action, $controller);
    }
    
    public static function filterVars($var) {
        return preg_replace("/[^a-zA-Z0-9_]/", "", $var);
    }

    public static function execute($action, $controller)
    {
        $real_controller = "com\\netroby\\notes\\controller\\".ucfirst($controller)."Controller";
        if (class_exists($real_controller)) {
            $c  = new \ReflectionClass($real_controller);
            $instance = $c->newInstance();
            $a = $c->getMethod($action);
            $a->invoke($instance);
        } else {
            echo "page not found";
        }
    }
}