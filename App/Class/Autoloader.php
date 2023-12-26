<?php

/**
 * When included, this class will automatically require_once 
 * all the classes that we'll use.
 */

 class Autoloader {

    /**
     * Interface that uses the spl_auto_load_register and the "autoload" 
     * static method of this class.
     *
     * @return void
     */
    static function register() {
        spl_autoload_register([
            __CLASS__, "autoload"
        ]);
    }


    /**
     * Method that takes the used class as a parameter and include it in the
     * file using a require_once.
     *
     * @param string $class_name
     * @return void
     */
    static function autoload($class_name) {
        require_once __DIR__ . "/" . $class_name . ".php";
    }

}