<?php

/**
 * Session Class For The Login System
 */
class session {
    /* Start Session Function */

    public static function init() {
        session_start();
    }

//Set Session from the get value from the login.php
    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

//get value from the set function if isset $key or false 
    public static function get($key) {

        if (isset($_SESSION[$key])) {

            return $_SESSION[$key];
        } else {

            return false;
        }
    }

    /* Check The session Function */

    public static function checksession() {
        self::init();
        if (self::get("login") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }

    //Destroy Session 

    public static function destroy() {
        session_destroy();
        header("Location:login.php");
    }

}

?>