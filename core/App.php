<?php

namespace Core;

class App {
    public static $container;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function container(){   // also getContainer
        return static::$container;
    }

    public static function bind($key, $resolver){   // also getContainer
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key){   // also getContainer
        return static::container()->resolve($key);
    }
}