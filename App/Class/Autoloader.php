<?php

class Autoloader {

    static function register() {
        // We pass the class name (Autoloader) 
        // and the method to call to spl autoload register 
        spl_autoload_register([
            __CLASS__, "autoload"
        ]);

    }

    // Our autoloader function to call
    static function autoload($class_name) {
        require_once __DIR__ . "/" . $class_name . ".php";
    }

}