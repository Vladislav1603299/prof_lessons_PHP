<?php

trait Sing{
    private function __construct() {} 

    private function __clone() {}

     private function __wakeup()  {}

      public static function getInstance() {
            if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}





 class Singleton {
    private static $instance;  
    use Sing;
    public function doAction() { }
 }

?>
